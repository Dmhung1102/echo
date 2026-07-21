<?php

namespace App\Http\Controllers;

use App\Helpers\PostHelper;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    public function archive(Request $request ,$tag)
    {
        $getArchive = Tag::where('slug', $tag)->firstOrFail();
        $cateKeyBySrcId = Category::getBySrcId();
        $tagsBySourceId = Tag::getBySrcId();
        $data = Cache::remember('category_list','600', function () use ($tagsBySourceId, $cateKeyBySrcId, $getArchive, $request) {
            $newPosts = Post::whereJsonContains('tag_id', $getArchive->source_id)->latest('date')->limit(5)->get(Post::SUMMARY_COLUMNS);
            $excludeIds = $newPosts->pluck('id');
            $fetchData = Post::whereNotIn('id',$excludeIds)->whereJsonContains('tag_id', $getArchive->source_id)->latest('date')->simplePaginate(6);
            PostHelper::attachRelations($cateKeyBySrcId, $tagsBySourceId,$fetchData,$newPosts);
            if ($request->ajax()) {
                return view('partials.post_cards', compact('fetchData'))->render();
            }
            return compact('fetchData', 'newPosts');
        });

        return view('archive', $data, compact('getArchive'));
    }
}
