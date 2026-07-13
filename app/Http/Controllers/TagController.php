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
        $columns = [ 'id', 'source_id', 'title', 'slug', 'excerpt', 'date', 'featured_image', 'category_id', 'tag_id'];
        $getArchive = Tag::where('slug', $tag)->firstOrFail();
        $tagsBySourceId = Tag::all()->keyBy('source_id');
        $newPosts = Post::whereJsonContains('tag_id', $getArchive->source_id)->latest('date')->limit(5)->get($columns);
        $excludeIds = $newPosts->pluck('id');
        $fetchData = Post::whereNotIn('id',$excludeIds)->whereJsonContains('tag_id', $getArchive->source_id)->latest('date')->take(6)->paginate(6);
        $fetchData = PostHelper::attachRelationsTag($fetchData,$tagsBySourceId);
        $newPosts = PostHelper::attachRelationsTag($newPosts,$tagsBySourceId);
        if ($request->ajax()) {
            return view('partials.post_cards', compact('fetchData', 'getArchive'))->render();
        }
        return view('archive', compact('fetchData', 'getArchive', 'newPosts'));
    }
}
