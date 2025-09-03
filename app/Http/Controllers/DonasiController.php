<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDonation;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    public function index()
    {
        // Ambil buku-buku yang sudah didonasi dengan status terverifikasi
        $verifiedBooks = Book::with(['donor', 'donation'])
            ->where('status', 'donated')
            ->whereNotNull('donated_by')
            ->latest('donated_at')
            ->paginate(12);

        // Statistik donasi - hitung dari semua buku yang sudah didonasi
        $totalDonatedBooks = Book::where('status', 'donated')
            ->whereNotNull('donated_by');

        $stats = [
            'total_books' => $totalDonatedBooks->count(),
            'total_donors' => Book::where('status', 'donated')
                ->whereNotNull('donated_by')
                ->distinct('donated_by')
                ->count(),
            'categories' => $totalDonatedBooks->whereNotNull('category')
                ->distinct('category')
                ->count(),
        ];

        return view('pages.donasi', compact('verifiedBooks', 'stats'));
    }
}
