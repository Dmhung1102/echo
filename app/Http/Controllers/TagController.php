<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function archive(Request $request ,$tag)
    {
        $getArchive = Tag::where('slug', $tag)->firstOrFail();
        $tagsBySourceId = Tag::all()->keyBy('source_id');
        $newPosts = Post::whereJsonContains('tag_id', $getArchive->source_id)->orderBy('created_at', 'desc')->limit(5)->get();
        $excludeIds = $newPosts->pluck('id');
        $fetchData = Post::whereNotIn('id',$excludeIds)->whereJsonContains('tag_id', $getArchive->source_id)->latest()->take(6)->paginate(6);
        $fetchData = PostHelper::attachRelationsTag($fetchData,$tagsBySourceId);
        $newPosts = PostHelper::attachRelationsTag($newPosts,$tagsBySourceId);
        if ($request->ajax()) {
            return view('partials.post_cards', compact('fetchData', 'getArchive'))->render();
        }
        return view('archive', compact('fetchData', 'getArchive', 'newPosts'));
    }
}
