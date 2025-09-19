<x-layouts.admin title="Detail Artikel" description="Lihat detail artikel">
    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Artikel</h1>
                <p class="text-gray-600 dark:text-gray-400">{{ $article->title }}</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.articles.edit', $article) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.articles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Article Details -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Article Content -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <div class="space-y-4">
                        <!-- Title and Status -->
                        <div class="flex items-start justify-between">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $article->title }}</h2>
                            <div class="flex flex-col space-y-2">
                                @if($article->is_published)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                                        Draft
                                    </span>
                                @endif
                                @if($article->is_featured)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                        Featured
                                    </span>
                                @endif
                                @if($article->is_trending)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200">
                                        Trending
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Excerpt -->
                        @if($article->excerpt)
                            <p class="text-lg text-gray-600 dark:text-gray-400 italic">{{ $article->excerpt }}</p>
                        @endif

                        <!-- Image -->
                        @if($article->image)
                            <div class="mt-6">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover rounded-lg">
                            </div>
                        @endif

                        <!-- Content -->
                        <div class="prose prose-lg dark:prose-invert max-w-none mt-6">
                            {!! $article->content !!}
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                @if($article->meta_title || $article->meta_description || $article->meta_keywords)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">SEO Information</h3>
                        <div class="space-y-3">
                            @if($article->meta_title)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->meta_title }}</p>
                                </div>
                            @endif
                            @if($article->meta_description)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->meta_description }}</p>
                                </div>
                            @endif
                            @if($article->meta_keywords)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                                    <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->meta_keywords }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Article Info -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Artikel</h3>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->author->name ?? 'Unknown' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori Utama</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">
                                @if($article->category)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                        {{ $article->category->name }}
                                    </span>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">-</span>
                                @endif
                            </p>
                        </div>
                        @if($article->categories->count() > 0)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori Tambahan</label>
                                <div class="mt-1 flex flex-wrap gap-1">
                                    @foreach($article->categories as $category)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dibuat</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->created_at->format('d M Y H:i') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Diupdate</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->updated_at->format('d M Y H:i') }}</p>
                        </div>
                        @if($article->published_at)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dipublish</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $article->published_at->format('d M Y H:i') }}</p>
                            </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Views</label>
                            <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ number_format($article->view_count) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aksi</h3>
                    <div class="space-y-3">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Artikel
                        </a>
                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" class="w-full" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus Artikel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
