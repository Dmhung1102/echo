<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
//    public function categories()
//    {
//        return view('category');
//    }

    public function category(Request $request, $category)
    {
        $getCategory = Category::where('slug', $category)->first();
        if (!$getCategory) {
            abort(404);
        }

        $newPostQuery = Post::whereJsonContains('category_id', $getCategory->source_id)->latest('date')->take(5);
        $newPost = $newPostQuery->get();
        $excludeIds = $newPost->pluck('id');
        $fetchData = Post::whereJsonContains('category_id', $getCategory->source_id)
            ->whereNotIn('id', $excludeIds)
            ->latest('date')
            ->paginate(6);

        if ($request->ajax()) {
            return view('partials.post_cards', compact('fetchData', 'getCategory'))->render();
        }

        return view('category', compact('fetchData', 'getCategory', 'newPost'));
    }

}
