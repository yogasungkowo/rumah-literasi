<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $query = Article::with('categories')->latest();

        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%'.$search.'%')
                    ->orWhereHas('author', fn ($q) => $q->where('name', 'like', '%'.$search.'%'));
            });
        }

        if (request('category')) {
            $query->whereHas('categories', function ($q) {
                $q->where('categories.id', request('category'));
            });
        }

        if (request('status')) {
            if (request('status') === 'published') {
                $query->where('is_published', true);
            } elseif (request('status') === 'draft') {
                $query->where('is_published', false);
            }
        }

        if (request('trending')) {
            $query->where('is_trending', true);
        }

        if (request('featured')) {
            $query->where('is_featured', true);
        }

        if (request('date_from')) {
            $query->whereDate('published_at', '>=', request('date_from'));
        }

        if (request('date_to')) {
            $query->whereDate('published_at', '<=', request('date_to'));
        }

        $articles = $query->paginate(15)->withQueryString();

        return view('admin.article.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'category_id' => 'nullable|exists:categories,id',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
            'new_category' => 'nullable|string|max:100|unique:categories,name',
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'is_featured' => 'sometimes|boolean',
            'is_trending' => 'sometimes|boolean',
        ],
            [
                'title.required' => 'Judul artikel wajib diisi.',
                'title.string' => 'Judul artikel harus berupa teks.',
                'title.max' => 'Judul artikel maksimal 255 karakter.',
                'excerpt.string' => 'Cuplikan artikel harus berupa teks.',
                'excerpt.max' => 'Cuplikan artikel maksimal 500 karakter.',
                'content.required' => 'Konten artikel wajib diisi.',
                'content.string' => 'Konten artikel harus berupa teks.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.max' => 'Ukuran gambar maksimal 5MB.',
                'category_id.exists' => 'Kategori yang dipilih tidak valid.',
                'categories.array' => 'Kategori tambahan harus berupa array.',
                'categories.*.integer' => 'Setiap kategori tambahan harus berupa ID yang valid.',
                'categories.*.exists' => 'Salah satu kategori tambahan tidak valid.',
                'new_category.string' => 'Kategori baru harus berupa teks.',
                'new_category.max' => 'Kategori baru maksimal 100 karakter.',
                'new_category.unique' => 'Kategori baru sudah ada.',
                'is_published.boolean' => 'Status publikasi tidak valid.',
                'published_at.date' => 'Tanggal publikasi tidak valid.',
                'meta_title.string' => 'Meta title harus berupa teks.',
                'meta_title.max' => 'Meta title maksimal 255 karakter.',
                'meta_description.string' => 'Meta description harus berupa teks.',
                'meta_description.max' => 'Meta description maksimal 255 karakter.',
                'meta_keywords.string' => 'Meta keywords harus berupa teks.',
                'meta_keywords.max' => 'Meta keywords maksimal 255 karakter.',
                'is_featured.boolean' => 'Status fitur tidak valid.',
                'is_trending.boolean' => 'Status trending tidak valid.',
            ]);

        $slug = Str::slug($data['title']);
        $i = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = Str::slug($data['title']).'-'.$i++;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        if (! empty($data['new_category'])) {
            $newCategory = Category::create([
                'name' => $data['new_category'],
                'slug' => Str::slug($data['new_category']),
            ]);
            $data['category_id'] = $newCategory->id;
        }

        $article = Article::create([
            'title' => $data['title'],
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'],
            'slug' => $slug,
            'image' => $data['image'] ?? null,
            'user_id' => Auth::id() ?? 1,
            'category_id' => $data['category_id'] ?? null,
            'is_published' => ! empty($data['is_published']),
            'published_at' => $data['published_at'] ?? (! empty($data['is_published']) ? now() : null),
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords' => $data['meta_keywords'] ?? null,
            'is_featured' => ! empty($data['is_featured']),
            'is_trending' => ! empty($data['is_trending']),
            'view_count' => 0,
        ]);

        $categoryIds = [];
        if (! empty($data['category_id'])) {
            $categoryIds[] = $data['category_id'];
        }
        if (! empty($data['categories'])) {
            $categoryIds = array_merge($categoryIds, $data['categories']);
        }

        if (! empty($categoryIds)) {
            $article->categories()->sync(array_unique($categoryIds));
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil dibuat!',
                'redirect' => route('admin.articles.index'),
            ]);
        }

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dibuat!');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $article->load('categories');

        return view('admin.article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|max:5120',
            'category_id' => 'nullable|exists:categories,id',
            'categories' => 'nullable|array',
            'categories.*' => 'integer|exists:categories,id',
            'new_category' => 'nullable|string|max:100|unique:categories,name,'.$request->input('new_category'),
            'is_published' => 'sometimes|boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'is_featured' => 'sometimes|boolean',
            'is_trending' => 'sometimes|boolean',
        ],
            [
                'title.required' => 'Judul artikel wajib diisi.',
                'title.string' => 'Judul artikel harus berupa teks.',
                'title.max' => 'Judul artikel maksimal 255 karakter.',
                'excerpt.string' => 'Cuplikan artikel harus berupa teks.',
                'excerpt.max' => 'Cuplikan artikel maksimal 500 karakter.',
                'content.required' => 'Konten artikel wajib diisi.',
                'content.string' => 'Konten artikel harus berupa teks.',
                'image.image' => 'File yang diunggah harus berupa gambar.',
                'image.max' => 'Ukuran gambar maksimal 5MB.',
                'category_id.exists' => 'Kategori yang dipilih tidak valid.',
                'categories.array' => 'Kategori tambahan harus berupa array.',
                'categories.*.integer' => 'Setiap kategori tambahan harus berupa ID yang valid.',
                'categories.*.exists' => 'Salah satu kategori tambahan tidak valid.',
                'new_category.string' => 'Kategori baru harus berupa teks.',
                'new_category.max' => 'Kategori baru maksimal 100 karakter.',
                'new_category.unique' => 'Kategori baru sudah ada.',
                'is_published.boolean' => 'Status publikasi tidak valid.',
                'published_at.date' => 'Tanggal publikasi tidak valid.',
                'meta_title.string' => 'Meta title harus berupa teks.',
                'meta_title.max' => 'Meta title maksimal 255 karakter.',
                'meta_description.string' => 'Meta description harus berupa teks.',
                'meta_description.max' => 'Meta description maksimal 255 karakter.',
                'meta_keywords.string' => 'Meta keywords harus berupa teks.',
                'meta_keywords.max' => 'Meta keywords maksimal 255 karakter.',
                'is_featured.boolean' => 'Status fitur tidak valid.',
                'is_trending.boolean' => 'Status trending tidak valid.',
            ]);

        if ($article->title !== $data['title']) {
            $slug = Str::slug($data['title']);
            $i = 1;
            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = Str::slug($data['title']).'-'.$i++;
            }
            $data['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        if (! empty($data['new_category'])) {
            $newCategory = Category::create([
                'name' => $data['new_category'],
                'slug' => Str::slug($data['new_category']),
            ]);
            $data['category_id'] = $newCategory->id;
        }

        $article->update([
            'title' => $data['title'],
            'excerpt' => $data['excerpt'] ?? null,
            'content' => $data['content'],
            'slug' => $data['slug'] ?? $article->slug,
            'image' => $data['image'] ?? $article->image,
            'category_id' => $data['category_id'] ?? null,
            'is_published' => ! empty($data['is_published']),
            'published_at' => $data['published_at'] ?? ($article->is_published ? now() : $article->published_at),
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords' => $data['meta_keywords'] ?? null,
            'is_featured' => ! empty($data['is_featured']),
            'is_trending' => ! empty($data['is_trending']),
        ]);

        $categoryIds = [];
        if (! empty($data['category_id'])) {
            $categoryIds[] = $data['category_id'];
        }
        if (isset($data['categories']) && is_array($data['categories'])) {
            $categoryIds = array_merge($categoryIds, $data['categories']);
        }

        $article->categories()->sync(array_unique($categoryIds));

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Artikel berhasil diperbarui!',
                'redirect' => route('admin.articles.index'),
            ]);
        }

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        $article->categories()->detach();
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
