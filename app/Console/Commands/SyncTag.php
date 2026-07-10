<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncTag extends Command
{
    protected $signature = 'sync:tag';

    protected $description = 'Command description';

    public function handle(): void
    {
        $response = Http::get('https://www.dsogaming.com/wp-json/wp/v2/tags',
        [
            '_embed' => true,
            'per_page' => 50,
            'page' => 1,
        ]);
        $totalPages = (int)$response->header('X-Wp-Totalpages');
        for ($pages = 1; $pages <= $totalPages; $pages++) {
            $response = Http::get('https://www.dsogaming.com/wp-json/wp/v2/tags',
                [
                    'per_page' => 50,
                    'page' => $pages,
                ]);
            if(!$response->successful()) break;
            $posts = $response->json();
            foreach ($posts as $post) {
                Tag::updateOrCreate(
                    [
                        'source_id' => $post['id'],
                    ],
                    [
                        'source' => 'dsogaming',
                        'title' => $post['name'],
                        'slug' => $post['slug'],
                        'taxonomy' => $post['taxonomy'],
                        'count' => $post['count'],
                    ]
                );
            }
        }
        $this->info("Sync completed.");
    }
}
