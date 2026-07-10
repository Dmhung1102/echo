<?php

namespace App\Helpers;

use App\Models\Tag;

class PostHelper
{
    public static function attachRelationsTag($posts, $tagsBySourceId) {
        foreach ($posts as $post) {
            $tagIds = json_decode($post->tag_id, true) ?? [];
            $post->tag = collect($tagIds)
                ->map(fn ($id) => $tagsBySourceId[$id] ?? null)
                ->filter()
                ->values();
        }
        return $posts;
    }
}
