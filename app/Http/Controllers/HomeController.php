<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function home()
    {
        $cateKeyBySrcId = Category::getBySrcId();
        $cateKeyBySlug = Category::getBySlug();
        $tagKeyBySrcId = Tag::getBySrcId();
        $posts = Post::getPosts();

        $postsHero = $posts->take(5);
        $postsTrending = Post::filterPostsByCate($posts->whereNotIn('id', $postsHero->pluck('id')), $cateKeyBySlug['news']->source_id, 4);
        $postsFeature = Post::filterPostsByCate($posts, $cateKeyBySlug['editorial']->source_id, 5);
        $postsEditor = Post::filterPostsByCate($posts, $cateKeyBySlug['articles']->source_id, 11);
        $postsTip = Post::filterPostsByCate($posts, $cateKeyBySlug['mods']->source_id, 7);
        PostHelper::attachRelations(
            $cateKeyBySrcId,
            $tagKeyBySrcId,
            $postsHero,
            $postsTrending,
            $postsFeature,
            $postsEditor,
            $postsTip
        );
        return view('home', compact('postsHero', 'postsTrending', 'postsFeature', 'postsEditor', 'postsTip'));

//        $data = Cache::remember('home_page_data', 600, function () {
//            $categories = Category::all();
//            $categoriesBySlug = $categories->keyBy('slug');
//            $categoriesBySourceId = $categories->keyBy('source_id');
//
//            $postsHero = Post::latest('date')->take(5)->get(Post::SUMMARY_COLUMNS);
//            $postsTrending = $this->getPostsByCategory($categoriesBySlug['news']->source_id, '4', $postsHero->pluck('id'));
//            $postsFeature = $this->getPostsByCategory($categoriesBySlug['editorial']->source_id, '5');
//            $postsEditor = $this->getPostsByCategory($categoriesBySlug['articles']->source_id, '11');
//            $postsTip = $this->getPostsByCategory($categoriesBySlug['mods']->source_id, '7');
//            $tagIds = collect();
//
//            foreach ([
//                         $postsHero,
//                         $postsTrending,
//                         $postsFeature,
//                         $postsEditor,
//                         $postsTip,
//                     ] as $posts) {
//
//                foreach ($posts as $post) {
//
//                    $tagIds = $tagIds->merge(
//                        json_decode($post->tag_id, true) ?? []
//                    );
//                }
//            }
//            $tagIds = $tagIds->unique();
//            $tagsBySourceId = Tag::whereIn('source_id', $tagIds)
//                ->get()
//                ->keyBy('source_id');
//
//            // Attach relations
//            $this->attachRelations($postsHero, $categoriesBySourceId, $tagsBySourceId);
//            $this->attachRelations($postsTrending, $categoriesBySourceId, $tagsBySourceId);
//            $this->attachRelations($postsFeature, $categoriesBySourceId, $tagsBySourceId);
//            $this->attachRelations($postsEditor, $categoriesBySourceId, $tagsBySourceId);
//            $this->attachRelations($postsTip, $categoriesBySourceId, $tagsBySourceId);
//            return compact('postsHero', 'postsTrending', 'postsFeature', 'postsEditor', 'postsTip');
//        });

//        return view('home', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

}
