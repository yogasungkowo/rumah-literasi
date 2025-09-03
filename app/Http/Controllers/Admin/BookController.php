<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of books
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Search functionality
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('author', 'like', '%' . $request->search . '%')
                  ->orWhere('isbn', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by category
        if ($request->category) {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // Filter by condition
        if ($request->condition) {
            $query->where('condition', $request->condition);
        }

        $books = $query->with(['donor', 'donation'])->orderBy('created_at', 'desc')->paginate(15);

        // Get filter data
        $categories = Book::distinct()->pluck('category')->filter();
        $statuses = Book::distinct()->pluck('status')->filter();
        $conditions = Book::distinct()->pluck('condition')->filter();

        // Get all donations for fallback cover search (cached for this request)
        $allDonations = \App\Models\BookDonation::with('books')->get();

        return view('admin.books.index', compact('books', 'categories', 'statuses', 'conditions', 'allDonations'));
    }

    /**
     * Show the form for creating a new book
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created book
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'condition' => 'required|in:new,good,fair,poor',
            'isbn' => 'nullable|string|max:20',
            'publisher' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1900|max:2030',
            'pages' => 'nullable|integer|min:1',
            'language' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:available,borrowed,donated,damaged',
        ]);

        $bookData = $request->except('cover_image');

        // Handle cover upload
        if ($request->hasFile('cover_image')) {
            $cover = $request->file('cover_image');
            $coverPath = $cover->store('book-covers', 'public');
            $bookData['cover_image'] = $coverPath;
        }

        Book::create($bookData);

        return redirect()->route('admin.books.index')
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified book
     */
    public function show(Book $book)
    {
        $book->load('donor');
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified book
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'condition' => 'required|in:new,good,fair,poor',
            'isbn' => 'nullable|string|max:20',
            'publisher' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1900|max:2030',
            'pages' => 'nullable|integer|min:1',
            'language' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:available,borrowed,donated,damaged',
        ]);

        $bookData = $request->except('cover_image');

        // Handle cover upload
        if ($request->hasFile('cover_image')) {
            // Delete old cover if exists
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            
            $cover = $request->file('cover_image');
            $coverPath = $cover->store('book-covers', 'public');
            $bookData['cover_image'] = $coverPath;
        }

        $book->update($bookData);

        return redirect()->route('admin.books.show', $book)
                         ->with('success', 'Buku berhasil diperbarui!');
    }

    /**
     * Remove the specified book from storage
     */
    public function destroy(Book $book)
    {
        // Delete cover if exists
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
                         ->with('success', 'Buku berhasil dihapus!');
    }
}
