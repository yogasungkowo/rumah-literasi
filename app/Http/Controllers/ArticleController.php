<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with(['categories', 'author'])
            ->where('is_published', true)
            ->orderBy('is_trending', 'desc')
            ->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('excerpt', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->input('category'));
            });
        }

        $articles = $query->paginate(6)->withQueryString();

        $categories = Category::withCount(['articles' => function ($query) {
                $query->where('is_published', true);
            }])
            ->orderBy('name', 'asc')
            ->get();
        
        $categories->each(function ($category) {
            $category->published_articles_count = $category->articles_count;
        });
        
        // $popularTags = Tag::withCount(['articles' => function ($query) {
        //     $query->where('is_published', true);
        // }])->orderBy('articles_count', 'desc')->limit(10)->get();

        return view('pages.artikel.index', compact('articles', 'categories'));
    }

    public function show(Article $article)
    {
        if (!$article->is_published) {
            abort(404);
        }

        $article->increment('view_count');

        $relatedArticles = Article::with('categories')
            ->where('is_published', true)
            ->where('id', '!=', $article->id)
            ->whereHas('categories', function ($q) use ($article) {
                $q->whereIn('categories.id', $article->categories->pluck('id'));
            })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('pages.artikel.show', compact('article', 'relatedArticles'));
    }
}