<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class HomeController extends Controller
{
    public function home()
    {
        $columns = [ 'id', 'source_id', 'title', 'slug', 'excerpt', 'date', 'featured_image', 'category_id', 'tag_id'];

        $categories = Category::all();
        $categoriesBySlug = $categories->keyBy('slug');
        $categoriesBySourceId = $categories->keyBy('source_id');
        $tagsBySourceId = Tag::all()->keyBy('source_id');

        $postsHero = Post::latest('date')->take(5)->get($columns);
        $postsTrending = Post::whereJsonContains('category_id',$categoriesBySlug['news']->source_id)
            ->whereNotIn('id', $postsHero->pluck('id'))
            ->latest('date')
            ->take(4)
            ->get($columns);
        $postsFeature = Post::whereJsonContains('category_id',$categoriesBySlug['editorial']->source_id)
            ->latest('date')
            ->take(5)
            ->get($columns);
        $postsEditor = Post::whereJsonContains('category_id',$categoriesBySlug['articles']->source_id)
            ->latest('date')
            ->take(11)
            ->get($columns);
        $postsTip = Post::whereJsonContains('category_id',$categoriesBySlug['mods']->source_id)
            ->latest('date')
            ->take(7)
            ->get($columns);

        // Attach relations
        $this->attachRelations($postsHero, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsTrending, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsFeature, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsEditor, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsTip, $categoriesBySourceId, $tagsBySourceId);

        return view('home', compact('postsHero','postsTrending','postsFeature','postsEditor','postsTip'));
    }

    private function attachRelations($posts, $categories, $tags)
    {
        $posts->each(function ($post) use ($categories, $tags) {
            $categoryIds = json_decode($post->category_id, true) ?? [];
            $tagIds = json_decode($post->tag_id, true) ?? [];
            $post->category = collect($categoryIds)
                ->map(fn ($id) => $categories[$id] ?? null)
                ->filter()
                ->values();
            $post->tag = collect($tagIds)
                ->map(fn ($id) => $tags[$id] ?? null)
                ->filter()
                ->values();
        });

        return $posts;
    }
}
