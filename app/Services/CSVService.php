<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class CSVService
{
    public static function generateTodoCSV($todo) {
        // Fetch 10 titles from the API
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $titles = collect($response->json())->take(10)->pluck('title')->toArray();

        // logger()->info($titles);

        // Generate CSV file
        // Create CSV file name and file path
        $fileName = "todo_{$todo->id}_titles.csv";
        $filePath = storage_path('app/' . $fileName);

        // File open and write CSV
        $file = fopen($filePath, 'w');

        // Write CSV header
        fputcsv($file, ['Title']);

        // Write CSV data
        foreach ($titles as $title) {
            fputcsv($file, [$title]);
        }

        // Close the file
        fclose($file);

        return $fileName;
    }
}