<?php
require_once 'vendor/autoload.php';

use Illuminate\Support\Facades\Storage;

// Simulate Laravel app
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Get a donation with book data
$donation = App\Models\BookDonation::first();

if ($donation && $donation->book_data) {
    echo "=== TESTING COVER IMAGE DISPLAY ===\n";
    echo "Donation ID: " . $donation->id . "\n";
    echo "Book data count: " . count($donation->book_data) . "\n\n";
    
    foreach ($donation->book_data as $index => $book) {
        echo "--- Book #" . ($index + 1) . " ---\n";
        echo "Title: " . ($book['title'] ?? 'N/A') . "\n";
        echo "Cover field exists: " . (isset($book['cover']) ? 'YES' : 'NO') . "\n";
        echo "Cover value: " . ($book['cover'] ?? 'NULL') . "\n";
        echo "Cover not empty: " . (!empty($book['cover']) ? 'YES' : 'NO') . "\n";
        
        if (isset($book['cover']) && $book['cover']) {
            $storageUrl = Storage::url($book['cover']);
            echo "Storage URL: " . $storageUrl . "\n";
            echo "File exists: " . (Storage::exists($book['cover']) ? 'YES' : 'NO') . "\n";
            
            // Test HTML output that should be generated
            echo "HTML that should be generated:\n";
            echo '<img src="' . $storageUrl . '" alt="Cover ' . ($book['title'] ?? 'N/A') . '" class="w-12 h-16 object-cover rounded shadow-sm">' . "\n";
        } else {
            echo "Should show placeholder\n";
        }
        echo "\n";
    }
} else {
    echo "No donations found or no book data\n";
}
