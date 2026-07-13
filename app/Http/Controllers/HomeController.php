<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function home()
    {
        $columns = [ 'id', 'source_id', 'title', 'slug', 'excerpt', 'date', 'featured_image', 'category_id', 'tag_id'];

        $categories = Category::all();
        $categoriesBySlug = $categories->keyBy('slug');
        $categoriesBySourceId = $categories->keyBy('source_id');

        $postsHero = Post::latest('date')->take(5)->get($columns);
        $postsTrending = $this->getPostsByCategory($categoriesBySlug['news']->source_id,'4',$columns,$postsHero->pluck('id'));
        $postsFeature = $this->getPostsByCategory($categoriesBySlug['editorial']->source_id,'5',$columns);
        $postsEditor = $this->getPostsByCategory($categoriesBySlug['articles']->source_id,'11',$columns);
        $postsTip = $this->getPostsByCategory($categoriesBySlug['mods']->source_id,'7',$columns);

        $tagIds = collect();

        foreach ([
                     $postsHero,
                     $postsTrending,
                     $postsFeature,
                     $postsEditor,
                     $postsTip,
                 ] as $posts) {

            foreach ($posts as $post) {

                $tagIds = $tagIds->merge(
                    json_decode($post->tag_id, true) ?? []
                );
            }
        }
        $tagIds = $tagIds->unique();
        $tagsBySourceId = Tag::whereIn('source_id', $tagIds)
            ->get()
            ->keyBy('source_id');

        // Attach relations
        $this->attachRelations($postsHero, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsTrending, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsFeature, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsEditor, $categoriesBySourceId, $tagsBySourceId);
        $this->attachRelations($postsTip, $categoriesBySourceId, $tagsBySourceId);

        return view('home', compact('postsHero','postsTrending','postsFeature','postsEditor','postsTip'));
    }

    private function getPostsByCategory( int $categoryId, int $limit, array $columns, ?Collection $excludeIds = null ): Collection
    {
        $query = Post::WhereJsonContains('category_id', $categoryId);
        if ($excludeIds) {
            $query->whereNotIn('id', $excludeIds);
        }
        return $query->latest('date')->take($limit)->get($columns);
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

    public function about()
    {
        return view('about');
    }

    public function contact()
    {

    }

}
