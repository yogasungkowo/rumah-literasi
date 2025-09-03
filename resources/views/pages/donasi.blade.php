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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mb-8">
                @foreach($verifiedBooks as $book)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                        <!-- Book Cover -->
                        <div class="aspect-[2/3] bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                            @if($book->cover_image)
                                <img src="{{ $book->cover_image_url }}" 
                                     alt="{{ $book->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"/>
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-1 right-1">
                                <span class="px-1.5 py-0.5 text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100 rounded-full">
                                    ✓
                                </span>
                            </div>
                        </div>

                        <!-- Book Details -->
                        <div class="p-3">
                            <h3 class="font-semibold text-sm text-gray-900 dark:text-white mb-1 line-clamp-2 leading-tight">
                                {{ $book->title }}
                            </h3>
                            
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-2 line-clamp-1">
                                {{ $book->author }}
                            </p>
                            
                            <div class="flex flex-wrap gap-1 mb-2">
                                @if($book->category)
                                    <span class="inline-block px-1.5 py-0.5 text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100 rounded">
                                        {{ ucfirst(str_replace('-', ' ', $book->category)) }}
                                    </span>
                                @endif
                                
                                @if($book->condition)
                                    <span class="inline-block px-1.5 py-0.5 text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100 rounded">
                                        {{ ucfirst(str_replace('-', ' ', $book->condition)) }}
                                    </span>
                                @endif
                            </div>

                            <!-- Donor Info -->
                            @if($book->donor)
                                <div class="pt-2 border-t border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="truncate">{{ $book->donor->name }}</span>
                                    </div>
                                    @if($book->donated_at)
                                        <div class="flex items-center text-xs text-gray-500 dark:text-gray-400 mt-0.5">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $book->donated_at->format('d M Y') }}
                                        </div>
                                    @endif
                                </div>
                            @endif
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
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Belum Ada Buku Terdonasi</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Jadilah yang pertama memberikan donasi buku untuk berbagi ilmu pengetahuan
                </p>
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
</x-layouts.app>
