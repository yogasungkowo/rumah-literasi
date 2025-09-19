<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    protected $fillable = [
        'name',
        'article_id',
        'category_id',
    ];

    protected $casts = [
        'name' => 'string',
        'article_id' => 'integer',
        'category_id' => 'integer',
    ];

    /**
     * Get the article for the article category
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    /**
     * Get the category for the article category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
