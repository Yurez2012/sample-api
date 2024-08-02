<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ParseBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->recursive(10, 190);
    }

    public function recursive($limit, $offset)
    {
        $params = [
            'q'      => 'book',
            'limit'  => $limit,
            'offset' => $offset,
        ];

        $url = 'https://openlibrary.org/search.json';

        $response = Http::get($url, $params);

        if ($response->successful()) {
            $result = $response->json();

            foreach ($result['docs'] as $item) {
                $author = Author::firstOrCreate([
                    'full_name' => $item['author_name'][0] ?? '',
                ]);

                Book::updateOrCreate([
                    'author_id' => $author->id,
                    'title'     => $item['title'],
                    'url'       => $item['cover_i'] ? "https://covers.openlibrary.org/b/id/{$item['cover_i']}-M.jpg" : null,
                ]);
            }
        }

        $this->recursive($limit, $offset + $limit);
    }
}
