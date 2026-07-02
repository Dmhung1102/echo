<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::all()->keyBy('source_id');
        $posts = Post::latest('date')->get();
        foreach ($posts as $post) {
            $category_id = json_decode($post->category_id, true);
            $post->category = collect($category_id)
                ->map(fn ($id) => $categories[$id] ?? null )
                ->filter()
                ->values();
        }
        return view('home', compact('posts'));
    }
}
