<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_path',
        'image_url',
        'category',
        'is_active',
        'sort_order',
        'uploaded_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the user who uploaded this gallery item
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the full URL for the image
     */
    public function getImageUrlAttribute()
    {
        if ($this->attributes['image_url']) {
            return $this->attributes['image_url'];
        }

        if ($this->image_path) {
            return Storage::url($this->image_path);
        }

        return null;
    }

    /**
     * Scope for active galleries
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordering by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }
}
