<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($slug)
    {
        $fetchData = Post::where('slug', $slug)->first();
        $latestPosts = Post::where('id', '!=', $fetchData->id)->latest()->take(6)->get();
        return view('detail', compact('fetchData', 'latestPosts'));
    }

    public function categories()
    {
        return view('categories');
    }

    public function category($category)
    {
        return view('category', compact('category'));
    }

    public function test()
    {
        $fetchDataCate = Category::where('count', '>', 0)->orderBy('count', 'desc')->get();
        $fetchDataCate->map(function ($cate) {
            $cate->latest_post = Post::select('id', 'category_id', 'featured_image')
                ->whereJsonContains('category_id', ['id' => $cate->source_id])
                ->latest()
                ->first();
        });
        dd($fetchDataCate);
        return view('layout.sidebar_right', compact('fetchDataCate'));
    }
}
