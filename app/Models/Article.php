<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'excerpt',
        'slug',
        'image',
        'user_id',
        'published_at',
        'is_published',
        'category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'is_featured',
        'is_trending',
        'view_count',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'category_id' => 'integer',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'view_count' => 'integer',
    ];

    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the author of the article
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the category of the article
     */ 
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the categories for the article (many-to-many via article_categories)
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    /**
     * Get the views attribute (alias for view_count)
     */
    public function getViewsAttribute()
    {
        return $this->view_count;
    }

    /**
     * Set the views attribute (alias for view_count)
     */
    public function setViewsAttribute($value)
    {
        $this->view_count = $value;
    }
}
