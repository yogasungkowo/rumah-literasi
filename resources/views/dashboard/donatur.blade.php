<x-layouts.integrated-dashboard title="Dashboard Donatur Buku">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-green-500 to-green-600 dark:from-green-600 dark:to-green-700 rounded-lg p-6 text-white">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
                <p class="text-green-100">Kelola dan pantau status donasi buku Anda di sini.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('donations.create') }}" class="bg-white text-green-600 hover:bg-green-50 px-6 py-3 rounded-lg font-medium transition-colors inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Donasi Buku Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Donasi</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $donations->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu Verifikasi</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $donations->where('status', 'pending')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Terverifikasi</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $donations->whereIn('status', ['approved', 'picked_up', 'completed'])->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Donations List -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Donasi Buku Anda</h3>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Pantau status verifikasi dari setiap donasi buku yang Anda berikan</p>
        </div>
        
        @if($donations->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tanggal Donasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Detail Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($donations as $donation)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                    {{ $donation->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm">
                                        <div class="font-medium text-gray-900 dark:text-white">
                                            {{ $donation->book_title }}
                                        </div>
                                        <div class="text-gray-500 dark:text-gray-400">
                                            {{ $donation->book_author }} • {{ $donation->book_category }}
                                        </div>
                                        @if($donation->book_description)
                                            <div class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                                                {{ Str::limit($donation->book_description, 60) }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                    <span class="font-medium">{{ $donation->total_books }}</span> buku
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($donation->status === 'pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Menunggu Verifikasi
                                        </span>
                                    @elseif($donation->status === 'approved')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Disetujui
                                        </span>
                                    @elseif($donation->status === 'picked_up')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                            </svg>
                                            Sudah Dijemput
                                        </span>
                                    @elseif($donation->status === 'completed')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Selesai
                                        </span>
                                    @elseif($donation->status === 'rejected')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Ditolak
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    @if($donation->notes)
                                        <div class="max-w-xs">
                                            <p>{{ Str::limit($donation->notes, 50) }}</p>
                                        </div>
                                    @else
                                        <span class="text-gray-400 dark:text-gray-500 italic">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div class="flex space-x-2">
                                        <!-- Tombol Lihat Detail Buku -->
                                        <button 
                                            onclick="showBookDetails({{ $donation->id }})"
                                            class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:hover:bg-blue-900/50 text-blue-700 dark:text-blue-300 text-xs font-medium rounded-lg transition-colors duration-200"
                                            title="Lihat detail buku yang didonasikan"
                                        >
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Lihat Buku
                                        </button>
                                        
                                        @if($donation->status === 'pending')
                                            <!-- Tombol Edit (hanya untuk status pending) -->
                                            <a 
                                                href="{{ route('donations.edit', $donation->id) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-yellow-100 hover:bg-yellow-200 dark:bg-yellow-900/30 dark:hover:bg-yellow-900/50 text-yellow-700 dark:text-yellow-300 text-xs font-medium rounded-lg transition-colors duration-200"
                                                title="Edit donasi (hanya untuk status pending)"
                                            >
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination if needed -->
            @if(method_exists($donations, 'links'))
                <div class="px-6 py-3 border-t border-gray-200 dark:border-gray-700">
                    {{ $donations->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum Ada Donasi</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Anda belum memiliki donasi buku. Mulai berbagi kebaikan dengan mendonasikan buku.</p>
                <a href="{{ route('donations.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Donasi Buku Pertama
                </a>
            </div>
        @endif
    </div>

    <!-- Modal untuk Detail Buku -->
    <div id="bookDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 dark:bg-gray-900 dark:bg-opacity-70 hidden z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 py-6">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl max-w-4xl w-full mx-4 transform transition-all">
                <!-- Modal Header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Detail Buku Donasi</h3>
                    </div>
                    <button 
                        onclick="closeBookDetailsModal()"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div id="modalContent" class="p-6">
                    <!-- Content will be loaded here -->
                    <div class="flex items-center justify-center py-12">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                        <span class="ml-3 text-gray-600 dark:text-gray-400">Memuat detail buku...</span>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/50 rounded-b-2xl">
                    <div class="flex justify-end">
                        <button 
                            onclick="closeBookDetailsModal()"
                            class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors"
                        >
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk Modal -->
    <script>
        function showBookDetails(donationId) {
            const modal = document.getElementById('bookDetailsModal');
            const content = document.getElementById('modalContent');
            
            // Show modal
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            // Show loading
            content.innerHTML = `
                <div class="flex items-center justify-center py-12">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                    <span class="ml-3 text-gray-600 dark:text-gray-400">Memuat detail buku...</span>
                </div>
            `;
            
            // Fetch book details
            fetch(`/donations/${donationId}/books`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        displayBookDetails(data.donation);
                    } else {
                        showError('Gagal memuat detail buku');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showError('Terjadi kesalahan saat memuat data');
                });
        }

        function displayBookDetails(donation) {
            const content = document.getElementById('modalContent');
            const books = donation.book_data || [];
            
            let booksHtml = '';
            
            if (books.length > 0) {
                books.forEach((book, index) => {
                    booksHtml += `
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 mb-4">
                            <div class="flex items-start space-x-4">
                                ${book.cover ? `
                                    <div class="flex-shrink-0">
                                        <img src="/storage/${book.cover}" alt="Cover ${book.title}" 
                                             class="w-20 h-28 object-cover rounded-lg shadow-md">
                                    </div>
                                ` : `
                                    <div class="flex-shrink-0 w-20 h-28 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                `}
                                
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 px-2 py-1 rounded-full text-xs font-medium">
                                            Buku #${index + 1}
                                        </span>
                                    </div>
                                    
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-2">${book.title}</h4>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                        <div>
                                            <span class="font-semibold text-gray-700 dark:text-gray-300">Penulis:</span>
                                            <span class="text-gray-600 dark:text-gray-400">${book.author}</span>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-700 dark:text-gray-300">Kategori:</span>
                                            <span class="text-gray-600 dark:text-gray-400">${book.category}</span>
                                        </div>
                                        <div>
                                            <span class="font-semibold text-gray-700 dark:text-gray-300">Kondisi:</span>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${getConditionBadgeClass(book.condition)}">
                                                ${getConditionText(book.condition)}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    ${book.description ? `
                                        <div class="mt-4">
                                            <span class="font-semibold text-gray-700 dark:text-gray-300">Deskripsi:</span>
                                            <p class="text-gray-600 dark:text-gray-400 mt-1">${book.description}</p>
                                        </div>
                                    ` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                });
            } else {
                booksHtml = `
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">Tidak ada detail buku yang tersedia</p>
                    </div>
                `;
            }

            content.innerHTML = `
                <div class="space-y-6">
                    <!-- Info Donasi -->
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl p-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Donasi</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                            <div>
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Tanggal Donasi:</span>
                                <p class="text-gray-600 dark:text-gray-400">${new Date(donation.created_at).toLocaleDateString('id-ID', {
                                    year: 'numeric',
                                    month: 'long',
                                    day: 'numeric'
                                })}</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Total Buku:</span>
                                <p class="text-gray-600 dark:text-gray-400">${books.length} buku</p>
                            </div>
                            <div>
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Status:</span>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium ${getStatusBadgeClass(donation.status)}">
                                    ${getStatusText(donation.status)}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Buku -->
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Detail Buku (${books.length})</h4>
                        ${booksHtml}
                    </div>
                </div>
            `;
        }

        function getConditionBadgeClass(condition) {
            const classes = {
                'baru': 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300',
                'sangat-baik': 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300',
                'baik': 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300',
                'cukup': 'bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-300'
            };
            return classes[condition] || 'bg-gray-100 dark:bg-gray-900/30 text-gray-800 dark:text-gray-300';
        }

        function getConditionText(condition) {
            const texts = {
                'baru': 'Baru',
                'sangat-baik': 'Sangat Baik',
                'baik': 'Baik',
                'cukup': 'Cukup'
            };
            return texts[condition] || condition;
        }

        function getStatusBadgeClass(status) {
            const classes = {
                'pending': 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300',
                'approved': 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300',
                'picked_up': 'bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300',
                'completed': 'bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300',
                'rejected': 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300'
            };
            return classes[status] || 'bg-gray-100 dark:bg-gray-900/30 text-gray-800 dark:text-gray-300';
        }

        function getStatusText(status) {
            const texts = {
                'pending': 'Menunggu Verifikasi',
                'approved': 'Disetujui',
                'picked_up': 'Sudah Dijemput',
                'completed': 'Selesai',
                'rejected': 'Ditolak'
            };
            return texts[status] || status;
        }

        function showError(message) {
            const content = document.getElementById('modalContent');
            content.innerHTML = `
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-red-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Terjadi Kesalahan</h3>
                    <p class="text-gray-500 dark:text-gray-400">${message}</p>
                </div>
            `;
        }

        function closeBookDetailsModal() {
            const modal = document.getElementById('bookDetailsModal');
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close modal when clicking outside
        document.getElementById('bookDetailsModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookDetailsModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeBookDetailsModal();
            }
        });
    </script>
</x-layouts.integrated-dashboard>
