<?php

namespace App\Console\Commands;

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
        $params = [
            'q' => 'book', // Пошуковий запит, ви можете змінити його на свій смак
            'limit' => 2, // Кількість книг для отримання
            'offset' => 0, // Кількість книг для отримання
        ];

        // URL Open Library API для отримання всіх книг
        $url = 'https://openlibrary.org/search.json';

        // Виконання GET-запиту до API
        $response = Http::get($url, $params);

        // Перевірка на успішність запиту
        if ($response->successful()) {
            // Повертаємо дані у форматі JSON
            return response()->json($response->json());
        }

        // Якщо запит не успішний, повертаємо помилку
        return response()->json(['error' => 'Unable to fetch books'], 500);
    }
}
