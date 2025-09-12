<x-layouts.app title="Donasi Buku - Rumah Literasi">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-500 to-green-700 dark:from-green-600 dark:to-green-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Donasi Buku
                </h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Berbagi adalah peduli. Lihat buku-buku yang telah didonasikan oleh para dermawan
                </p>
                
                <!-- Statistics -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ number_format($stats['total_books']) }}</div>
                        <div class="text-sm opacity-90">Total Buku Terdonasi</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ number_format($stats['total_donors']) }}</div>
                        <div class="text-sm opacity-90">Donatur Aktif</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-3xl font-bold mb-2">{{ number_format($stats['categories']) }}</div>
                        <div class="text-sm opacity-90">Kategori Buku</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Books Collection Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Buku-Buku yang Telah Didonasi</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Koleksi buku dari para donatur yang telah terverifikasi dan siap untuk dibaca
            </p>
        </div>

        @if($verifiedBooks->count() > 0)
            <!-- Books Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6 mb-12">
                @foreach($verifiedBooks as $book)
                    <div class="book-item group relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 ease-out transform hover:-translate-y-2 hover:scale-[1.02] overflow-hidden border border-gray-100 dark:border-gray-700 book-card-hover">
                        <!-- Book Cover Container -->
                        <div class="book-cover relative aspect-[3/4] overflow-hidden rounded-t-2xl bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800">
                            @if($book->cover_image)
                                <img src="{{ $book->cover_image_url }}" 
                                     alt="{{ $book->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-indigo-100 via-blue-50 to-cyan-100 dark:from-indigo-900 dark:via-blue-900 dark:to-cyan-900">
                                    <div class="text-center">
                                        <svg class="w-16 h-16 text-indigo-400 dark:text-indigo-300 mx-auto mb-3 transition-transform duration-500 group-hover:scale-125 group-hover:rotate-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        <p class="text-xs font-medium text-indigo-600 dark:text-indigo-300">{{ $book->title }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <!-- Status Badge -->
                            <div class="absolute top-3 right-3 transform transition-all duration-300 group-hover:scale-110">
                                @if($book->status === 'available')
                                    <div class="status-badge flex items-center space-x-1 px-2.5 py-1 bg-emerald-500/90 backdrop-blur-sm text-white rounded-full shadow-lg">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="text-xs font-semibold">Tersedia</span>
                                    </div>
                                @else
                                    <div class="status-badge flex items-center space-x-1 px-2.5 py-1 bg-blue-500/90 backdrop-blur-sm text-white rounded-full shadow-lg">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="text-xs font-semibold">Terdonasi</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Hover Overlay with Quick Info -->
                            <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                                <div class="text-center text-white p-4">
                                    <h4 class="font-bold text-sm mb-2 line-clamp-2">{{ $book->title }}</h4>
                                    <p class="text-xs opacity-90 mb-3">{{ $book->author }}</p>
                                    @if($book->description)
                                        <p class="text-xs opacity-80 line-clamp-2 leading-relaxed">{{ Str::limit($book->description, 80) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Book Details -->
                        <div class="p-4 space-y-3">
                            <!-- Title & Author -->
                            <div class="space-y-1">
                                <h3 class="font-bold text-sm text-gray-900 dark:text-white line-clamp-2 leading-tight group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">
                                    {{ $book->title }}
                                </h3>
                                <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-1 font-medium">
                                    by {{ $book->author }}
                                </p>
                            </div>
                            
                            <!-- Tags -->
                            <div class="flex flex-wrap gap-1.5">
                                @if($book->category)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 dark:from-blue-800 dark:to-blue-700 dark:text-blue-100 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md hover:scale-105">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ ucfirst(str_replace('-', ' ', $book->category)) }}
                                    </span>
                                @endif
                                
                                @if($book->condition)
                                    <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gradient-to-r from-amber-100 to-yellow-200 text-amber-800 dark:from-amber-800 dark:to-yellow-700 dark:text-amber-100 rounded-lg shadow-sm transition-all duration-300 hover:shadow-md hover:scale-105">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ ucfirst(str_replace('-', ' ', $book->condition)) }}
                                    </span>
                                @endif
                            </div>

                            <!-- Donor Info -->
                            @if($book->donor)
                                <div class="pt-3 border-t border-gray-100 dark:border-gray-700 space-y-2">
                                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                                        <div class="w-6 h-6 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center mr-2 shadow-sm">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span class="font-medium truncate">{{ $book->donor->name }}</span>
                                    </div>
                                    @if($book->donated_at)
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                            <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-blue-400 rounded-full flex items-center justify-center mr-2 shadow-sm">
                                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <span class="font-medium">{{ $book->donated_at->format('d M Y') }}</span>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="pt-3 border-t border-gray-100 dark:border-gray-700">
                                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                        <div class="w-6 h-6 bg-gradient-to-br from-gray-400 to-gray-500 rounded-full flex items-center justify-center mr-2 shadow-sm">
                                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <span class="font-medium">Koleksi Perpustakaan</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Additional Info on Hover -->
                            <div class="opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                @if($book->publication_year || $book->pages)
                                    <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 pt-2 border-t border-gray-100 dark:border-gray-700">
                                        @if($book->publication_year)
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/>
                                                </svg>
                                                {{ $book->publication_year }}
                                            </span>
                                        @endif
                                        @if($book->pages)
                                            <span class="flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                                                </svg>
                                                {{ $book->pages }} hal
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $verifiedBooks->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="relative">
                    <!-- Animated Background Elements -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 rounded-full animate-pulse"></div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-full animate-pulse delay-75"></div>
                    </div>
                    
                    <!-- Main Icon -->
                    <div class="relative z-10">
                        <div class="mx-auto w-32 h-32 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mb-8 shadow-2xl animate-bounce">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <h3 class="text-3xl font-bold gradient-text mb-4">
                    Belum Ada Buku Terdonasi
                </h3>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto leading-relaxed">
                    Jadilah yang pertama memberikan donasi buku untuk berbagi ilmu pengetahuan dan mencerdaskan bangsa
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('donations.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 hover:from-indigo-600 hover:to-purple-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Donasi Buku Sekarang
                    </a>
                    <a href="#benefits" class="inline-flex items-center px-6 py-3 bg-white dark:bg-gray-800 text-indigo-600 dark:text-indigo-400 font-semibold rounded-xl border-2 border-indigo-200 dark:border-indigo-800 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Pelajari Manfaat Donasi
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Call to Action Section -->
    <div class="bg-gray-50 dark:bg-gray-700 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                Ingin Berkontribusi?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan para donatur lainnya dan berikan akses pendidikan kepada yang membutuhkan
            </p>
            
            @auth
                @if(auth()->user()->hasRole(['Admin', 'Donatur Buku']))
                    <a href="{{ auth()->user()->dashboard_url }}" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Donasi Buku Sekarang
                    </a>
                @else
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 max-w-md mx-auto">
                        <p class="text-blue-800 dark:text-blue-200 mb-4">
                            Untuk dapat mendonasikan buku, silakan hubungi admin untuk mendapatkan akses sebagai donatur.
                        </p>
                        <a href="mailto:admin@rumahliterasi.com" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-300">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Hubungi Admin
                        </a>
                    </div>
                @endif
            @else
                <div class="space-y-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        Silakan masuk terlebih dahulu untuk dapat berdonasi
                    </p>
                    <a href="/login" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-300">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Masuk untuk Berdonasi
                    </a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="bg-gray-50 dark:bg-gray-700 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Mengapa Donasi Buku?</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Setiap buku yang Anda donasikan akan memberikan dampak positif</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 dark:bg-green-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Berbagi Pengetahuan</h3>
                    <p class="text-gray-600 dark:text-gray-300">Buku yang tidak terpakai menjadi sumber pengetahuan berharga bagi orang lain</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Ramah Lingkungan</h3>
                    <p class="text-gray-600 dark:text-gray-300">Mengurangi limbah dan memberikan kehidupan kedua pada buku</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-purple-100 dark:bg-purple-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Membantu Sesama</h3>
                    <p class="text-gray-600 dark:text-gray-300">Memberikan akses pendidikan kepada mereka yang membutuhkan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles for Enhanced Animations -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .book-card-hover {
            animation: float 6s ease-in-out infinite;
        }
        
        .book-card-hover:nth-child(2n) {
            animation-delay: -2s;
        }
        
        .book-card-hover:nth-child(3n) {
            animation-delay: -4s;
        }
        
        /* Enhanced hover effects - focus on zoom and blur */
        .book-item:hover .book-cover img {
            transform: scale(1.1);
        }
        
        /* Staggered animation for grid items */
        .grid > * {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }
        
        .grid > *:nth-child(1) { animation-delay: 0.1s; }
        .grid > *:nth-child(2) { animation-delay: 0.2s; }
        .grid > *:nth-child(3) { animation-delay: 0.3s; }
        .grid > *:nth-child(4) { animation-delay: 0.4s; }
        .grid > *:nth-child(5) { animation-delay: 0.5s; }
        .grid > *:nth-child(6) { animation-delay: 0.6s; }
        .grid > *:nth-child(n+7) { animation-delay: 0.7s; }
        
        /* Pulse effect for status badges */
        .status-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        /* Gradient text animation */
        .gradient-text {
            background: linear-gradient(-45deg, #4f46e5, #7c3aed, #ec4899, #10b981);
            background-size: 400% 400%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 3s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .book-item:hover .book-cover img {
                transform: scale(1.05);
            }
        }
    </style>
</x-layouts.app>
