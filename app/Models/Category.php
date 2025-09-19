<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'color' => 'string',
    ];

    /**
     * Get the articles for the category (many-to-many relationship)
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_categories');
    }

    /**
     * Get published articles for the category
     */
    public function publishedArticles()
    {
        return $this->belongsToMany(Article::class, 'article_categories')->where('is_published', true);
    }

    /**
     * Get the article categories for the category
     */
    public function articleCategories()
    {
        return $this->hasMany(ArticleCategory::class, 'category_id');
    }

    public function pubishedArticles()
    {
        return $this->hasMany(Article::class, 'category_id')->where('is_published', true);
    }

    public function trendingArticles()
    {
        return $this->hasMany(Article::class, 'category_id')->where('is_trending', true);
    }

    public function featuredArticles()
    {
        return $this->hasMany(Article::class, 'category_id')->where('is_featured', true);
    }

    // Scopes
    public function scopeWithPublishedArticles($query)
    {
        return $query->with(['publishedArticles' => function ($q) {
            $q->orderBy('created_at', 'desc');
        }]);
    }

    public function scopeWithArticleCount($query)
    {
        return $query->withCount(['publishedArticles']);
    }

    // Accessors & Mutators
    public function getColorClassAttribute()
    {
        $colorMap = [
            '#3B82F6' => 'blue',
            '#10B981' => 'emerald', 
            '#06B6D4' => 'sky',
            '#8B5CF6' => 'purple',
            '#F59E0B' => 'amber',
            '#EF4444' => 'red',
            '#EC4899' => 'pink',
        ];

        return $colorMap[$this->color] ?? 'blue';
    }
}
