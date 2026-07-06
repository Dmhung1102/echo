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

    public function test()
    {
        $fetchData = Category::where('count', '>', 0)->orderBy('count', 'desc')->take(5)->get();
        $fetchData->map(function ($category) {
            $latestPost = Post::whereJsonContains('category_id', $category->source_id)->latest()->first();
            $category->img_latest_post = $latestPost?->featured_image;
        });
        dd($fetchData);
        return view('layout.sidebar_right', compact('fetchData'));
    }
}
