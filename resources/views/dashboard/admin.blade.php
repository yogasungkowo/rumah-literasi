@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-layouts.admin title="Dashboard Admin" description="Kelola semua aspek Rumah Literasi dari dashboard admin ini">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-600 dark:from-blue-600 dark:to-blue-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
        <p class="text-blue-100">Kelola semua aspek Rumah Literasi dari dashboard admin ini.</p>
    </div>

    <!-- Statistics Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pengguna</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_users']) }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full">
                    <i class="fas fa-users text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Buku</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_books']) }}</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full">
                    <i class="fas fa-book text-2xl text-green-600 dark:text-green-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Donasi Pending</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['pending_donations']) }}</p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full">
                    <i class="fas fa-heart text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sponsorship Pending</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['pending_sponsorships']) }}</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full">
                    <i class="fas fa-handshake text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full mr-4">
                    <i class="fas fa-book text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Buku</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Tambah, edit, dan kelola koleksi buku literasi.</p>
            <a href="/admin/books" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Kelola Buku
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full mr-4">
                    <i class="fas fa-graduation-cap text-2xl text-green-600 dark:text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Pelatihan</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Buat dan kelola program pelatihan literasi.</p>
            <a href="/admin/trainings" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Kelola Pelatihan
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full mr-4">
                    <i class="fas fa-heart text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Verifikasi Donasi</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Tinjau dan verifikasi donasi buku masuk.</p>
            <a href="/admin/donations" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Verifikasi Donasi
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-4">
                    <i class="fas fa-handshake text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Verifikasi Sponsorship</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Tinjau proposal sponsorship yang masuk.</p>
            <a href="/admin/sponsorships" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Verifikasi Sponsorship
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-full mr-4">
                    <i class="fas fa-images text-2xl text-indigo-600 dark:text-indigo-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Galeri</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Upload dan kelola foto kegiatan untuk galeri website.</p>
            <a href="{{ route('admin.galleries.index') }}" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Kelola Galeri
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-full mr-4">
                    <i class="fas fa-users-cog text-2xl text-red-600 dark:text-red-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelola Users</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Kelola pengguna dan role mereka.</p>
            <a href="/admin/users" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Kelola Users
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Books -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Buku Terbaru</h3>
                    <a href="{{ route('admin.books.index') }}" class="text-sm text-blue-600 hover:text-blue-500">Lihat Semua</a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recent_books) && count($recent_books) > 0)
                    <div class="space-y-3">
                        @foreach($recent_books as $book)
                            <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                @php
                                    // Get cover with 3-level fallback system
                                    $coverUrl = null;
                                    
                                    // Level 1: Direct cover_image
                                    if ($book->cover_image) {
                                        $coverUrl = Storage::url($book->cover_image);
                                    }
                                    // Level 2: Linked donation
                                    elseif ($book->donation && $book->donation->book_data) {
                                        foreach ($book->donation->book_data as $bookData) {
                                            if (isset($bookData['title']) && $bookData['title'] === $book->title && isset($bookData['cover'])) {
                                                $coverUrl = Storage::url($bookData['cover']);
                                                break;
                                            }
                                        }
                                    }
                                    // Level 3: Search all donations
                                    else {
                                        $allDonations = \App\Models\BookDonation::all();
                                        foreach ($allDonations as $donation) {
                                            if ($donation->book_data) {
                                                foreach ($donation->book_data as $bookData) {
                                                    if (isset($bookData['title']) && $bookData['title'] === $book->title && isset($bookData['cover'])) {
                                                        $coverUrl = Storage::url($bookData['cover']);
                                                        break 2;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                
                                @if($coverUrl)
                                    <img src="{{ $coverUrl }}" 
                                         alt="{{ $book->title }}" 
                                         class="w-10 h-12 object-cover rounded mr-3 flex-shrink-0">
                                @else
                                    <div class="w-10 h-12 bg-gray-200 dark:bg-gray-600 rounded mr-3 flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <p class="font-medium text-gray-900 dark:text-white text-sm truncate">{{ $book->title }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $book->author }}</p>
                                    <div class="flex items-center mt-1">
                                        <span class="inline-flex px-2 py-0.5 text-xs rounded-full 
                                            @if($book->status === 'available') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                            @elseif($book->status === 'borrowed') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                                            @elseif($book->status === 'donated') bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300
                                            @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300 @endif">
                                            {{ ucfirst($book->status) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400 text-center py-4">Belum ada buku</p>
                @endif
            </div>
        </div>

        <!-- Recent Donations -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Donasi Terbaru</h3>
                    <a href="{{ route('admin.donations.index') }}" class="text-sm text-blue-600 hover:text-blue-500">Lihat Semua</a>
                </div>
            </div>
            <div class="p-6">
                @if(isset($recent_donations) && count($recent_donations) > 0)
                    <div class="space-y-3">
                        @foreach($recent_donations as $donation)
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $donation->donor_name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $donation->total_books }} buku</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($donation->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                                    @elseif($donation->status === 'approved') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300 @endif">
                                    {{ ucfirst($donation->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400 text-center py-4">Belum ada donasi</p>
                @endif
            </div>
        </div>

        <!-- Recent Sponsorships -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sponsorship Terbaru</h3>
            </div>
            <div class="p-6">
                @if(isset($recent_sponsorships) && count($recent_sponsorships) > 0)
                    <div class="space-y-3">
                        @foreach($recent_sponsorships as $sponsorship)
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $sponsorship->company_name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}</p>
                                </div>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    @if($sponsorship->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300
                                    @elseif($sponsorship->status === 'approved') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300 @endif">
                                    {{ ucfirst($sponsorship->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400 text-center py-4">Belum ada sponsorship</p>
                @endif
            </div>
        </div>
    </div>
</x-layouts.admin>
