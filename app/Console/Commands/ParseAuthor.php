<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ParseAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-author';

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
        $query = 'Стівен';
        $authors = [];


        $url = "https://www.googleapis.com/books/v1/volumes?q=inauthor:" . urlencode($query) . "&key=" . env('GOOGLE_API');
        $response = Http::get($url);

        if ($response->successful()) {
            $items = $response->json()['items'] ?? [];

            foreach ($items as $item) {
                if (isset($item['volumeInfo']['authors'])) {
                    foreach ($item['volumeInfo']['authors'] as $author) {
                        $authors[] = $author;
                    }
                }
            }


        } else {
            // Якщо запит неуспішний, зупиняємо цикл
        }

        $authors = array_unique($authors); // Видаляємо дублікати
echo '<pre>';
print_r($authors);
echo '</pre>';
die;
        return response()->json([
            'status' => 'success',
            'authors' => $authors,
        ]);

    }
}
