<x-layouts.app title="Donasi Buku - Rumah Literasi Ranggi">

    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-slate-900 via-purple-900 to-indigo-900 text-white">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>
        
        <div class="relative z-10 container mx-auto px-6 text-center">
            <div class="max-w-4xl mx-auto">
                <h1 data-aos="fade-up" class="text-5xl md:text-7xl font-extrabold mb-6 bg-gradient-to-r from-white via-blue-200 to-purple-300 bg-clip-text text-transparent">
                    Donasi Buku
                </h1>
                <p data-aos="fade-up" data-aos-delay="200" class="text-xl md:text-2xl text-white/80 font-light leading-relaxed max-w-3xl mx-auto mb-12">
                    Setiap buku yang Anda donasikan adalah jembatan menuju masa depan yang lebih cerah bagi mereka yang membutuhkan.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <div data-aos="fade-up" data-aos-delay="300" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">{{ number_format($stats['total_books'] ?? 0) }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Buku Terdonasi</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="400" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-green-300 to-emerald-300 bg-clip-text text-transparent">{{ number_format($stats['total_donors'] ?? 0) }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Donatur Aktif</p>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="500" class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20">
                        <p class="text-5xl font-bold bg-gradient-to-r from-purple-300 to-pink-300 bg-clip-text text-transparent">{{ number_format($stats['categories'] ?? 0) }}</p>
                        <p class="text-lg font-medium text-white/80 mt-2">Kategori Buku</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 dark:bg-slate-900 py-20 lg:py-24">
        <div class="container mx-auto px-6">
            <div class="max-w-7xl mx-auto">
                <div data-aos="fade-up" class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Koleksi Buku Donasi</h2>
                    <p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">Jelajahi buku-buku yang telah diverifikasi dan siap untuk dibaca.</p>
                    <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full mt-6"></div>
                </div>

                @if ($verifiedBooks->isNotEmpty())
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 md:gap-8 mb-12">
                        @foreach ($verifiedBooks as $book)
                            <div data-aos="fade-up" data-aos-delay="{{ ($loop->index % 5) * 50 }}" class="group bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 border dark:border-slate-700">
                                <div class="relative aspect-[3/4] overflow-hidden">
                                    <img src="{{ $book->cover_image_url ?? 'https://via.placeholder.com/300x400.png/6366F1/FFFFFF?text=Buku' }}" alt="Cover {{ $book->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute top-3 right-3">
                                        @if ($book->status === 'available')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold bg-emerald-500/90 backdrop-blur-sm text-white rounded-full">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 010-1.414l8-8a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                Tersedia
                                            </span>
                                        @elseif ($book->status === 'donated')
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold bg-blue-500/90 backdrop-blur-sm text-white rounded-full">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5 5a3 3 0 015.83.07l.17.93A3 3 0 0110 8a3 3 0 011.83-.07l.17-.93A3 3 0 0115 5a3 3 0 015.83.07l.17.93A3 3 0 0120 8a3 3 0 01-1.83.07l-.17-.93A3 3 0 0115 5a3 3 0 00-5.83.07l-.17.93A3 3 0 005 8a3 3 0 01-1.83-.07l-.17-.93A3 3 0 005 5z" clip-rule="evenodd"/>
                                                </svg>
                                                Didonasi
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold bg-yellow-500/90 backdrop-blur-sm text-white rounded-full">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                </svg>
                                                Dipinjam
                                            </span>
                                        @endif
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                        <h3 class="font-semibold text-sm line-clamp-2">{{ $book->title }}</h3>
                                        <p class="text-xs opacity-90 mt-1">{{ $book->author ?? 'Penulis Tidak Diketahui' }}</p>
                                    </div>
                                </div>
                                <div class="p-4 flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wide">{{ $book->category ?? 'Umum' }}</span>
                                        <span class="text-xs text-slate-400 dark:text-slate-500">{{ $book->created_at->format('M Y') }}</span>
                                    </div>
                                    <p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-2 mb-3">{{ $book->description ?? 'Deskripsi tidak tersedia' }}</p>
                                    <button data-book-id="{{ $book->id }}" data-book-title="{{ $book->title }}" data-book-author="{{ $book->author ?? 'Penulis Tidak Diketahui' }}" data-book-description="{{ $book->description ?? 'Deskripsi tidak tersedia' }}" data-book-category="{{ $book->category ?? 'Umum' }}" data-book-status="{{ $book->status }}" data-book-cover="{{ $book->cover_image_url ?? 'https://via.placeholder.com/300x400.png/6366F1/FFFFFF?text=Buku' }}" data-book-created="{{ $book->created_at->format('d M Y') }}" onclick="openBookModal(this)" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div data-aos="fade-up" class="text-center py-16">
                        <div class="w-24 h-24 bg-slate-100 dark:bg-slate-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 dark:text-white">Belum Ada Buku Donasi</h3>
                        <p class="text-slate-500 dark:text-slate-400 mt-2 mb-6 max-w-md mx-auto">Jadilah yang pertama memulai perubahan dengan mendonasikan buku Anda!</p>
                        <a href="{{ route('donations.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow-lg transition-transform duration-300 hover:scale-105 active:scale-95">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Donasi Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="bg-white dark:bg-slate-800 py-20 lg:py-24">
        <div class="container mx-auto px-6">
            <div data-aos="zoom-in" class="max-w-4xl mx-auto text-center bg-gradient-to-br from-blue-600 via-purple-700 to-pink-700 text-white rounded-2xl p-10 md:p-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Berkontribusi?</h2>
                <p class="text-xl md:text-2xl mb-10 text-white/80 leading-relaxed">
                    Bergabunglah dengan para donatur hebat lainnya dan berikan akses pendidikan kepada yang membutuhkan.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    @auth
                        <a href="{{ route('donations.create') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-indigo-600 rounded-xl font-semibold shadow-lg transition-transform duration-300 hover:scale-105 active:scale-95">
                            Donasi Buku Sekarang
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-indigo-600 rounded-xl font-semibold shadow-lg transition-transform duration-300 hover:scale-105 active:scale-95">
                            Masuk untuk Donasi
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>
    
    <!-- Book Detail Modal -->
    <div id="bookModal" class="fixed inset-0 z-50 opacity-0 scale-95 pointer-events-none bg-black/50 backdrop-blur-sm transition-all duration-300 ease-out">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden transform transition-all duration-300 ease-out">
                <div class="flex flex-col md:flex-row">
                    <!-- Book Cover -->
                    <div class="md:w-1/3 p-6 flex items-center justify-center bg-slate-50 dark:bg-slate-700">
                        <img id="modalBookCover" src="" alt="Book Cover" class="w-full max-w-xs h-auto object-cover rounded-xl shadow-lg transition-transform duration-500 hover:scale-105">
                    </div>
                    
                    <!-- Book Details -->
                    <div class="md:w-2/3 p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex-1">
                                <h2 id="modalBookTitle" class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mb-2"></h2>
                                <p id="modalBookAuthor" class="text-lg text-slate-600 dark:text-slate-400 mb-2"></p>
                                <div class="flex items-center gap-3 mb-4">
                                    <span id="modalBookCategory" class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 text-sm font-medium rounded-full"></span>
                                    <span id="modalBookStatus" class="px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-300 text-sm font-medium rounded-full"></span>
                                </div>
                            </div>
                            <button onclick="closeBookModal()" class="p-2 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg transition-colors duration-200 transform hover:scale-110">
                                <svg class="w-6 h-6 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-2">Deskripsi</h3>
                            <p id="modalBookDescription" class="text-slate-600 dark:text-slate-300 leading-relaxed"></p>
                        </div>
                        
                        <div class="border-t dark:border-slate-600 pt-4">
                            <div class="flex items-center justify-between text-sm text-slate-500 dark:text-slate-400">
                                <span>Ditambahkan: <span id="modalBookCreated"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            AOS.init({
                duration: 800,
                once: true,
            });

            // Book Modal Functions
            function openBookModal(button) {
                const modal = document.getElementById('bookModal');
                const title = document.getElementById('modalBookTitle');
                const author = document.getElementById('modalBookAuthor');
                const description = document.getElementById('modalBookDescription');
                const category = document.getElementById('modalBookCategory');
                const status = document.getElementById('modalBookStatus');
                const cover = document.getElementById('modalBookCover');
                const created = document.getElementById('modalBookCreated');

                // Populate modal with book data
                title.textContent = button.dataset.bookTitle;
                author.textContent = 'Oleh: ' + button.dataset.bookAuthor;
                description.textContent = button.dataset.bookDescription;
                category.textContent = button.dataset.bookCategory;
                cover.src = button.dataset.bookCover;
                cover.alt = 'Cover ' + button.dataset.bookTitle;
                created.textContent = button.dataset.bookCreated;

                // Set status badge
                const statusText = button.dataset.bookStatus === 'available' ? 'Tersedia' :
                                 button.dataset.bookStatus === 'donated' ? 'Didonasi' : 'Dipinjam';
                const statusClass = button.dataset.bookStatus === 'available' ? 'bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-300' :
                                  button.dataset.bookStatus === 'donated' ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300' :
                                  'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300';
                status.textContent = statusText;
                status.className = `px-3 py-1 ${statusClass} text-sm font-medium rounded-full`;

                // Show modal with animation
                modal.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
                modal.classList.add('opacity-100', 'scale-100');
                document.body.style.overflow = 'hidden';
            }

            function closeBookModal() {
                const modal = document.getElementById('bookModal');
                modal.classList.remove('opacity-100', 'scale-100');
                modal.classList.add('opacity-0', 'scale-95');
                // Add delay before disabling pointer events to allow animation to complete
                setTimeout(() => {
                    modal.classList.add('pointer-events-none');
                }, 300);
                document.body.style.overflow = 'auto';
            }

            // Close modal when clicking outside
            document.getElementById('bookModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeBookModal();
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && document.getElementById('bookModal').classList.contains('opacity-100')) {
                    closeBookModal();
                }
            });
        </script>
    @endpush
    
</x-layouts.app>