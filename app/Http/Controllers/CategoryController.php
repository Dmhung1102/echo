<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use function Laravel\Prompts\select;

class CategoryController extends Controller
{
//    public function categories()
//    {
//        return view('category');
//    }

    public function archive(Request $request, $category)
    {
        $getArchive = Category::where('slug', $category)->first();
        if (!$getArchive) {
            abort(404);
        }
        $cateKeyBySrcId = Category::getBySrcId();
        $tagKeyBySrcId = Tag::getBySrcId();
        $newPosts = Post::whereJsonContains('category_id', $getArchive->source_id)->select(Post::SUMMARY_COLUMNS)->latest('date')->take(5)->get();
        $excludeIds = $newPosts->pluck('id');
        $fetchData = Post::whereJsonContains('category_id', $getArchive->source_id)->select(Post::SUMMARY_COLUMNS)
            ->whereNotIn('id', $excludeIds)
            ->latest('date')
            ->paginate(6);

        PostHelper::attachRelations($cateKeyBySrcId, $tagKeyBySrcId, $fetchData, $newPosts);
        if ($request->ajax()) {
            return view('partials.post_cards', compact('fetchData', 'getArchive'))->render();
        }
        return view('archive', compact('fetchData', 'getArchive', 'newPosts'));
    }

    public function explore () {
        $categories = Cache::remember('explore', 600, function () {
            $categories = Category::where('taxonomy','category')->where('count', '>', 0)->orderBy('count', 'desc')->get()->keyBy('source_id');;
            $getPost = Post::getPosts();
            $need = $categories->count();
            foreach ($getPost as $post) {
                foreach ($post->category_id ?? [] as $categoryId) {
                    if (isset($categories[$categoryId]) && empty($categories[$categoryId]->latest_post)) {
                        $categories[$categoryId]->latest_post = $post;
                        $need--;
                    }
                    if ($need === 0) {
                        break 2;
                    }
                }
            }
            return $categories;
        });

        return view('explore', compact('categories'));
    }
}
