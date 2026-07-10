<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail($slug)
    {
        $fetchData = Post::where('slug', $slug)->first();
        $tags = Tag::all()->keyBy('source_id');
        $tag_id = json_decode($fetchData->tag_id, true);
        $fetchData->tag = collect($tag_id)->map(fn ($id) => $tags[$id] ?? null )->filter()->values();
        $latestPosts = Post::where('id', '!=', $fetchData->id)->latest()->take(6)->get();
        return view('detail', compact('fetchData', 'latestPosts'));
    }

    public function test()
    {
        $tag = 'mods';

//        if ($request->ajax()) {
//            return view('partials.post_cards', compact('fetchData', 'getArchive'))->render();
//        }
//       dd($newPosts);
        return view('layout.sidebar_right');
    }
}
