<?php

namespace App\Helpers;

use App\Models\Tag;

class PostHelper
{
    public static function attachRelationsTag($posts, $tagsBySourceId) {
        foreach ($posts as $post) {
            $tagIds =$post->tag_id ?? [];
            $post->tag = collect($tagIds)
                ->map(fn ($id) => $tagsBySourceId[$id] ?? null)
                ->filter()
                ->values();
        }
        return $posts;
    }

    public static function attachRelations($categories, $tags, ...$collections)
    {
        foreach ($collections as $posts) {
            $posts->each(function ($post) use ($categories, $tags) {
                $categoryIds = $post->category_id ?? [];
                $tagIds = $post->tag_id ?? [];
                $post->category = collect($categoryIds)
                    ->map(fn ($id) => $categories[$id] ?? null)
                    ->filter()
                    ->values();
                $post->tag = collect($tagIds)
                    ->map(fn ($id) => $tags[$id] ?? null)
                    ->filter()
                    ->values();
            });
        }
        return $collections;
    }
}
