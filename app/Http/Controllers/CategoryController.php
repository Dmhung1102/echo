<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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
        $tagsBySourceId = Tag::all()->keyBy('source_id');
        $newPostQuery = Post::whereJsonContains('category_id', $getArchive->source_id)->latest('date')->take(5);
        $newPosts = $newPostQuery->get();
        $excludeIds = $newPosts->pluck('id');
        $fetchData = Post::whereJsonContains('category_id', $getArchive->source_id)
            ->whereNotIn('id', $excludeIds)
            ->latest('date')
            ->paginate(6);

        $newPosts = PostHelper::attachRelationsTag($newPosts,$tagsBySourceId);
        $fetchData = PostHelper::attachRelationsTag($fetchData,$tagsBySourceId);
        if ($request->ajax()) {
            return view('partials.post_cards', compact('fetchData', 'getArchive'))->render();
        }
        return view('archive', compact('fetchData', 'getArchive', 'newPosts'));
    }

}
