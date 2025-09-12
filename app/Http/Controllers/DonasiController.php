<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDonation;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        // Ambil buku-buku yang sudah didonasi dan buku yang tersedia
        $verifiedBooks = Book::with(['donor', 'donation'])
            ->where(function($query) {
                $query->where(function($q) {
                    // Buku dari donasi (status donated dan ada donated_by)
                    $q->where('status', 'donated')
                      ->whereNotNull('donated_by');
                })
                ->orWhere(function($q) {
                    // Buku available (bisa dari manual admin atau dari donasi)
                    $q->where('status', 'available');
                });
            })
            ->latest('donated_at')
            ->paginate(12);

        // Statistik donasi - hitung dari semua buku yang relevan
        $totalBooksQuery = Book::where(function($query) {
            $query->where(function($q) {
                $q->where('status', 'donated')
                  ->whereNotNull('donated_by');
            })
            ->orWhere('status', 'available');
        });

        $stats = [
            'total_books' => $totalBooksQuery->count(),
            'total_donors' => Book::where(function($query) {
                $query->where(function($q) {
                    $q->where('status', 'donated')
                      ->whereNotNull('donated_by');
                })
                ->orWhere('status', 'available');
            })
            ->whereNotNull('donated_by')
            ->distinct('donated_by')
            ->count(),
            'categories' => $totalBooksQuery->whereNotNull('category')
                ->distinct('category')
                ->count(),
        ];

        return view('pages.donasi', compact('verifiedBooks', 'stats'));
    }
}
