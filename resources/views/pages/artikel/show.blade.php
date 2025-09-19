<x-layouts.app title="{{ $article->title }} - Rumah Literasi Ranggi" description="{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 160) }}">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Article Header -->
        <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Breadcrumb -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('welcome') }}" class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-9 9a1 1 0 001.414 1.414L2 12.414V19a1 1 0 001 1h3a1 1 0 001-1v-3a1 1 0 011-1h2a1 1 0 011 1v3a1 1 0 001 1h3a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-9-9z"></path>
                                </svg>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('artikel') }}" class="ml-1 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400">Artikel</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ Str::limit($article->title, 50) }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Article Title and Meta -->
                <div class="text-center">
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4 leading-tight">
                        {{ $article->title }}
                    </h1>

                    @if($article->excerpt)
                        <p class="text-xl text-gray-600 dark:text-gray-400 mb-6 max-w-3xl mx-auto">
                            {{ $article->excerpt }}
                        </p>
                    @endif

                    <div class="flex items-center gap-3 text-xs">
                        <span class="font-medium text-blue-600 dark:text-blue-400">
                            {{ $article->created_at->format('d F Y') }}
                        </span>
                        <span class="text-slate-400">•</span>
                        @if($article->categories->count() > 0)
                            @foreach($article->categories as $category)
                                <span class="px-2 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-800 dark:text-blue-300 text-xs">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                            <span class="text-slate-400">•</span>
                        @endif
                        <span class="text-slate-500 dark:text-slate-400">
                            {{ ceil(str_word_count(strip_tags($article->content)) / 200) }} menit baca
                        </span>
                        <span class="text-slate-400">•</span>
                        <span class="text-slate-500 dark:text-slate-400">
                            {{ number_format($article->views) }} views
                        </span>
                    </div>                    <!-- Categories -->
                    @if($article->categories->count() > 0)
                        <div class="flex flex-wrap justify-center gap-2 mb-8">
                            @foreach($article->categories as $category)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                    {{ $category->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <!-- Article Image -->
                @if($article->image)
                    <div class="w-full">
                        <img src="{{ asset('storage/' . $article->image) }}"
                             alt="{{ $article->title }}"
                             class="w-full h-auto max-h-96 object-cover">
                    </div>
                @endif

                <!-- Article Body -->
                <div class="p-8 md:p-12">
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        {!! $article->content !!}
                    </div>
                </div>
            </div>

            <!-- Article Actions -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="window.history.back()"
                    class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Kembali
                </button>
                <a href="{{ route('artikel') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0l-4-4m4 4l-4 4"></path>
                    </svg>
                    Lihat Semua Artikel
                </a>
            </div>
        </div>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700 p-8">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-8 text-center">
                        Artikel Terkait
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedArticles as $relatedArticle)
                            <article class="bg-gray-50 dark:bg-gray-700 rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                <!-- Article Image -->
                                @if($relatedArticle->image)
                                    <div class="aspect-w-16 aspect-h-9">
                                        <img src="{{ asset('storage/' . $relatedArticle->image) }}"
                                             alt="{{ $relatedArticle->title }}"
                                             class="w-full h-32 object-cover">
                                    </div>
                                @else
                                    <div class="w-full h-32 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Article Content -->
                                <div class="p-4">
                                    <h3 class="text-sm font-semibold text-slate-900 dark:text-white mb-2 line-clamp-2">
                                        <a href="{{ route('artikel.show', $relatedArticle) }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                            {{ $relatedArticle->title }}
                                        </a>
                                    </h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">
                                        {{ $relatedArticle->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
