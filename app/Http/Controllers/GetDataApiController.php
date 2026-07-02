<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class GetDataApiController extends Controller
{
    public function getTest()
    {
        $response = Http::get(
            'https://www.dsogaming.com/wp-json/wp/v2/posts',
            [
                '_embed' => true,
                'per_page' => 5,
                'page' => 1,
                'after' => '2020-01-01T00:00:00',
            ]
        );
        $totalPages = (int)$response->header('X-Wp-Totalpages');
        for ($pages = 1; $pages <= $totalPages; $pages++) {
            $response = Http::get(
                'https://www.dsogaming.com/wp-json/wp/v2/posts',
                [
                    '_embed' => true,
                    'per_page' => 5,
                    'page' => $pages,
                    'after' => '2020-01-01T00:00:00',
                ]
            );
            $posts = $response->json();
            foreach ($posts as $post) {
                Post::updateOrCreate(
                    [
                        'source_id' => $post['id'],
                    ],
                    [
                    'source' => 'dsogaming',
                    'title' => $post['title']['rendered'],
                    'slug' => $post['slug'],
                    'content' => $post['content']['rendered'],
                    'date' => $post['date_gmt'],
                    'featured_image' => data_get($post, '_embedded.wp:featuredmedia.0.source_url', null),
                    'category_id' => json_encode($post['categories']),
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Get data successfully',
        ]);
    }
}
