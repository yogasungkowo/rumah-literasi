<x-layouts.integrated-dashboard title="Riwayat Donasi Saya">
    @php
        use Illuminate\Support\Facades\Storage;
    @endphp
    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header -->
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('dashboard.donatur') }}"
                class="group inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
        <div class="flex justify-between items-center">

            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Riwayat Donasi</h2>
                <p class="text-gray-600 dark:text-gray-400">Lihat semua donasi buku yang telah Anda ajukan</p>
            </div>
            <a href="{{ route('donations.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                <i class="fas fa-plus mr-2"></i>Donasi Buku Baru
            </a>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-blue-50 dark:bg-blue-900/50 rounded-lg p-6 border border-blue-200 dark:border-blue-700">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-600 rounded-lg">
                        <i class="fas fa-file-alt text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Pengajuan</p>
                        <p class="text-2xl font-bold text-blue-900 dark:text-blue-100">{{ $donations->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/50 rounded-lg p-6 border border-yellow-200 dark:border-yellow-700">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-600 rounded-lg">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Menunggu Verifikasi</p>
                        <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">{{ $donations->where('status', 'pending')->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/50 rounded-lg p-6 border border-green-200 dark:border-green-700">
                <div class="flex items-center">
                    <div class="p-3 bg-green-600 rounded-lg">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Disetujui</p>
                        <p class="text-2xl font-bold text-green-900 dark:text-green-100">
                            {{ $donations->whereIn('status', ['approved', 'picked_up', 'completed'])->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 bg-gray-600 rounded-lg">
                        <i class="fas fa-books text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Buku</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $donations->sum(function ($donation) {return count($donation->book_data ?? []);}) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <form method="GET" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-64">
                    <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cari</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                        placeholder="Cari berdasarkan ID atau catatan..."
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select name="status" id="status"
                        class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        <option value="picked_up" {{ request('status') === 'picked_up' ? 'selected' : '' }}>Sudah Dijemput</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                @if (request()->hasAny(['search', 'status']))
                    <a href="{{ route('donations.history') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Donations List -->
        <div class="space-y-6">
            @forelse($donations as $donation)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Donasi #{{ $donation->id }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Diajukan pada {{ $donation->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                @php
                                    $statusConfig = [
                                        'pending' => ['bg-yellow-100 text-yellow-800', 'Menunggu Verifikasi'],
                                        'approved' => ['bg-green-100 text-green-800', 'Disetujui'],
                                        'rejected' => ['bg-red-100 text-red-800', 'Ditolak'],
                                        'picked_up' => ['bg-blue-100 text-blue-800', 'Sudah Dijemput'],
                                        'completed' => ['bg-purple-100 text-purple-800', 'Selesai'],
                                        'cancelled' => ['bg-gray-100 text-gray-800', 'Dibatalkan'],
                                    ];
                                    $config = $statusConfig[$donation->status] ?? ['bg-gray-100 text-gray-800', ucfirst($donation->status)];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-medium {{ $config[0] }}">
                                    {{ $config[1] }}
                                </span>
                                <a href="{{ route('donations.show', $donation) }}" class="text-green-600 hover:text-green-800 transition-colors">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Jumlah Buku</p>
                                <p class="font-semibold text-gray-900 dark:text-white">{{ count($donation->book_data ?? []) }} buku</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Metode Pengambilan</p>
                                <p class="font-semibold text-gray-900 dark:text-white">
                                    {{ $donation->pickup_method === 'pickup' ? 'Dijemput' : 'Diantar' }}
                                </p>
                            </div>
                            @if ($donation->preferred_date)
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Tanggal Preferensi</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($donation->preferred_date)->format('d M Y') }}
                                        @if ($donation->preferred_time)
                                            {{ \Carbon\Carbon::parse($donation->preferred_time)->format('H:i') }}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        </div>

                        @if ($donation->book_data)
                            <div class="border-t dark:border-gray-700 pt-4">
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Buku yang Didonasikan:</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach (array_slice($donation->book_data, 0, 6) as $book)
                                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                            <div class="flex items-start space-x-3">
                                                @if(isset($book['cover']) && $book['cover'])
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ Storage::url($book['cover']) }}" 
                                                             alt="Cover {{ $book['title'] ?? 'N/A' }}" 
                                                             class="w-12 h-16 object-cover rounded shadow-sm">
                                                    </div>
                                                @else
                                                    <div class="flex-shrink-0 w-12 h-16 bg-gray-200 dark:bg-gray-600 rounded flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                                <div class="flex-1 min-w-0">
                                                    <p class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $book['title'] ?? 'N/A' }}</p>
                                                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ $book['author'] ?? 'N/A' }}</p>
                                                    <p class="text-xs text-blue-600 dark:text-blue-400">{{ $book['category'] ?? 'N/A' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (count($donation->book_data) > 6)
                                        <div class="bg-gray-100 dark:bg-gray-600 rounded p-2 flex items-center justify-center">
                                            <p class="text-sm text-gray-600 dark:text-gray-400">+{{ count($donation->book_data) - 6 }} lainnya</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if ($donation->status === 'rejected' && $donation->rejection_reason)
                            <div class="mt-4 p-3 bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-700 rounded">
                                <p class="text-sm font-medium text-red-800 dark:text-red-200">Alasan Penolakan:</p>
                                <p class="text-sm text-red-700 dark:text-red-300">{{ $donation->rejection_reason }}</p>
                            </div>
                        @endif

                        @if ($donation->admin_notes)
                            <div class="mt-4 p-3 bg-blue-50 dark:bg-blue-900/50 border border-blue-200 dark:border-blue-700 rounded">
                                <p class="text-sm font-medium text-blue-800 dark:text-blue-200">Catatan Admin:</p>
                                <p class="text-sm text-blue-700 dark:text-blue-300">{{ $donation->admin_notes }}</p>
                            </div>
                        @endif

                        <div class="flex justify-end space-x-2 mt-4">
                            <a href="{{ route('donations.show', $donation) }}"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                <i class="fas fa-eye mr-1"></i>Detail
                            </a>
                            @if ($donation->status === 'pending')
                                <a href="{{ route('donations.edit', $donation) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-edit mr-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('donations.cancel', $donation) }}" class="inline"
                                    onsubmit="return confirm('Yakin ingin membatalkan donasi ini?')">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                        <i class="fas fa-times mr-1"></i>Batal
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                    <i class="fas fa-inbox text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum Ada Donasi</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Anda belum pernah mengajukan donasi buku.</p>
                    <a href="{{ route('donations.create') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-heart mr-2"></i>Mulai Donasi Pertama
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($donations->hasPages())
            <div class="flex justify-center">
                {{ $donations->links() }}
            </div>
        @endif
    </div>
</x-layouts.integrated-dashboard>
