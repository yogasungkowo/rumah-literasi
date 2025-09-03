<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'title',
        'author',
        'isbn',
        'description',
        'category',
        'publisher',
        'publication_year',
        'pages',
        'language',
        'cover_image',
        'condition',
        'status',
        'donated_by',
        'donated_at',
    ];

    protected $casts = [
        'donated_at' => 'datetime',
    ];

    /**
     * Get the donor who donated this book
     */
    public function donor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'donated_by');
    }

    /**
     * Get the donation this book came from
     */
    public function donation(): BelongsTo
    {
        return $this->belongsTo(BookDonation::class, 'donation_id');
    }

    /**
     * Get cover image URL - with fallback to donation data for backward compatibility
     */
    public function getCoverImageUrlAttribute(): string
    {
        // If cover_image is set, use it
        if ($this->cover_image) {
            // Check if it's already a full URL
            if (str_starts_with($this->cover_image, 'http')) {
                return $this->cover_image;
            }
            // Build storage URL
            return asset('storage/' . $this->cover_image);
        }
        
        // Fallback: try to get cover from original donation data (for backward compatibility)
        if ($this->donation && $this->donation->book_data) {
            foreach ($this->donation->book_data as $bookData) {
                if (isset($bookData['title']) && $bookData['title'] === $this->title && isset($bookData['cover'])) {
                    return asset('storage/' . $bookData['cover']);
                }
            }
        }
        
        // Default placeholder image
        return asset('images/default-book-cover.jpg');
    }

    /**
     * Scope for available books
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    /**
     * Scope for donated books
     */
    public function scopeDonated($query)
    {
        return $query->whereNotNull('donated_by');
    }
}
