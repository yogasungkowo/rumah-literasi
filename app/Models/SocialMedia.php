<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media';

    protected $fillable = [
        'platform',
        'platform_name',
        'url',
        'username',
        'icon',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope for active social media
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered social media
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('platform_name');
    }

    /**
     * Get icon class for the platform
     */
    public function getIconClassAttribute()
    {
        if ($this->icon) {
            return $this->icon;
        }

        $icons = [
            'facebook' => 'fab fa-facebook-f',
            'instagram' => 'fab fa-instagram',
            'linkedin' => 'fab fa-linkedin-in',
            'twitter' => 'fab fa-x-twitter',
            'youtube' => 'fab fa-youtube',
            'tiktok' => 'fab fa-tiktok',
        ];

        return $icons[$this->platform] ?? 'fas fa-link';
    }

    /**
     * Get the display URL
     */
    public function getDisplayUrlAttribute()
    {
        if ($this->url) {
            return $this->url;
        }

        if ($this->username) {
            $baseUrls = [
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://instagram.com/',
                'linkedin' => 'https://linkedin.com/company/',
                'twitter' => 'https://x.com/',
                'youtube' => 'https://youtube.com/@',
                'tiktok' => 'https://tiktok.com/@',
            ];

            $baseUrl = $baseUrls[$this->platform] ?? '';
            return $baseUrl . $this->username;
        }

        return '';
    }
}
