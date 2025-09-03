<x-layouts.admin title="Verifikasi Donasi">
    {{-- @php
        use Illuminate\Support\Facades\Storage;
    @endphp --}}
    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Verifikasi Donasi Buku</h2>
                <p class="text-gray-600 dark:text-gray-400">Kelola dan verifikasi donasi buku dari masyarakat</p>
            </div>
            <a href="{{ route('admin.donations.reports') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                <i class="fas fa-chart-bar mr-2"></i>Laporan
            </a>
        </div>

        <!-- Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="bg-yellow-50 dark:bg-yellow-900/50 rounded-lg p-4 border border-yellow-200 dark:border-yellow-700">
                <div class="flex items-center">
                    <div class="p-2 bg-yellow-600 rounded-lg">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-yellow-600 dark:text-yellow-400">Pending</p>
                        <p class="text-xl font-bold text-yellow-900 dark:text-yellow-100">{{ $statusCounts['pending'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/50 rounded-lg p-4 border border-green-200 dark:border-green-700">
                <div class="flex items-center">
                    <div class="p-2 bg-green-600 rounded-lg">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Disetujui</p>
                        <p class="text-xl font-bold text-green-900 dark:text-green-100">{{ $statusCounts['approved'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 dark:bg-blue-900/50 rounded-lg p-4 border border-blue-200 dark:border-blue-700">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-600 rounded-lg">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Dijemput</p>
                        <p class="text-xl font-bold text-blue-900 dark:text-blue-100">{{ $statusCounts['picked_up'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/50 rounded-lg p-4 border border-purple-200 dark:border-purple-700">
                <div class="flex items-center">
                    <div class="p-2 bg-purple-600 rounded-lg">
                        <i class="fas fa-flag-checkered text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-purple-600 dark:text-purple-400">Selesai</p>
                        <p class="text-xl font-bold text-purple-900 dark:text-purple-100">{{ $statusCounts['completed'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 dark:bg-red-900/50 rounded-lg p-4 border border-red-200 dark:border-red-700">
                <div class="flex items-center">
                    <div class="p-2 bg-red-600 rounded-lg">
                        <i class="fas fa-times text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-600 dark:text-red-400">Ditolak</p>
                        <p class="text-xl font-bold text-red-900 dark:text-red-100">{{ $statusCounts['rejected'] }}</p>
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
                           placeholder="Cari berdasarkan ID, nama donatur, atau email..."
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status</label>
                    <select name="status" id="status" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                        <option value="picked_up" {{ request('status') === 'picked_up' ? 'selected' : '' }}>Sudah Dijemput</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div>
                    <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Dari Tanggal</label>
                    <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}"
                           class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </div>
                <div>
                    <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sampai Tanggal</label>
                    <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}"
                           class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'date_from', 'date_to']))
                    <a href="{{ route('admin.donations.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- Donations List -->
        <div class="space-y-4">
            @forelse($donations as $donation)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Donasi #{{ $donation->id }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    oleh {{ $donation->donor_name }} • {{ $donation->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                @php
                                    $statusConfig = [
                                        'pending' => ['bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300', 'Menunggu Verifikasi', 'fas fa-clock'],
                                        'approved' => ['bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300', 'Disetujui', 'fas fa-check'],
                                        'rejected' => ['bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300', 'Ditolak', 'fas fa-times'],
                                        'picked_up' => ['bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300', 'Sudah Dijemput', 'fas fa-truck'],
                                        'completed' => ['bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300', 'Selesai', 'fas fa-flag-checkered'],
                                        'cancelled' => ['bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300', 'Dibatalkan', 'fas fa-ban']
                                    ];
                                    $config = $statusConfig[$donation->status] ?? ['bg-gray-100 text-gray-800', ucfirst($donation->status), 'fas fa-question'];
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $config[0] }}">
                                    <i class="{{ $config[2] }} mr-1"></i>
                                    {{ $config[1] }}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Donatur</p>
                                <p class="font-medium text-gray-900 dark:text-white">{{ $donation->donor_name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-500">{{ $donation->donor_email }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Jumlah Buku</p>
                                <p class="font-medium text-gray-900 dark:text-white">{{ count($donation->book_data ?? []) }} buku</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Metode Pengambilan</p>
                                <p class="font-medium text-gray-900 dark:text-white">
                                    {{ $donation->pickup_method === 'pickup' ? 'Dijemput' : 'Diantar' }}
                                </p>
                            </div>
                            @if($donation->preferred_date)
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Tanggal Preferensi</p>
                                    <p class="font-medium text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($donation->preferred_date)->format('d M Y') }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        @if($donation->book_data)
                            <div class="border-t dark:border-gray-700 pt-4 mb-4">
                                <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Buku yang Didonasikan:</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
                                    @foreach(array_slice($donation->book_data, 0, 6) as $book)
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
                                    @if(count($donation->book_data) > 6)
                                        <div class="bg-gray-100 dark:bg-gray-600 rounded p-2 flex items-center justify-center">
                                            <p class="text-sm text-gray-600 dark:text-gray-400">+{{ count($donation->book_data) - 6 }} lainnya</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('admin.donations.show', $donation) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                <i class="fas fa-eye mr-1"></i>Detail
                            </a>
                            
                            @if($donation->status === 'pending')
                                <!-- Quick Approve Button -->
                                <button type="button" 
                                        onclick="showApproveModal({{ $donation->id }}, '{{ $donation->donor_name }}')"
                                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-check mr-1"></i>Setujui
                                </button>
                                
                                <!-- Quick Reject Button -->
                                <button type="button" 
                                        onclick="showRejectModal({{ $donation->id }}, '{{ $donation->donor_name }}')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                                    <i class="fas fa-times mr-1"></i>Tolak
                                </button>
                            @elseif($donation->status === 'approved')
                                <form method="POST" action="{{ route('admin.donations.mark-picked-up', $donation) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm transition-colors"
                                            onclick="return confirm('Tandai donasi ini sudah dijemput?')">
                                        <i class="fas fa-truck mr-1"></i>Dijemput
                                    </button>
                                </form>
                            @elseif($donation->status === 'picked_up')
                                <form method="POST" action="{{ route('admin.donations.complete', $donation) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm transition-colors"
                                            onclick="return confirm('Tandai donasi ini selesai?')">
                                        <i class="fas fa-flag-checkered mr-1"></i>Selesai
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                    <i class="fas fa-inbox text-6xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Tidak Ada Donasi</h3>
                    <p class="text-gray-600 dark:text-gray-400">Belum ada donasi yang perlu diverifikasi.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($donations->hasPages())
            <div class="flex justify-center">
                {{ $donations->links() }}
            </div>
        @endif
    </div>

    <!-- Approve Modal -->
    <div id="approveModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Setujui Donasi</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Yakin ingin menyetujui donasi dari <span id="approveDonorName" class="font-medium"></span>?
                    </p>
                    
                    <form id="approveForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="approve_admin_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Catatan Admin (Opsional)</label>
                            <textarea name="admin_notes" id="approve_admin_notes" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                      placeholder="Tambahkan catatan untuk donatur..."></textarea>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="hideApproveModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                                Batal
                            </button>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-check mr-2"></i>Setujui Donasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl max-w-md w-full">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Tolak Donasi</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Berikan alasan penolakan donasi dari <span id="rejectDonorName" class="font-medium"></span>:
                    </p>
                    
                    <form id="rejectForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="rejection_reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Alasan Penolakan *</label>
                            <textarea name="rejection_reason" id="rejection_reason" rows="4" required
                                      class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                      placeholder="Jelaskan alasan mengapa donasi ini ditolak..."></textarea>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="hideRejectModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors">
                                Batal
                            </button>
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors">
                                <i class="fas fa-times mr-2"></i>Tolak Donasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function showApproveModal(donationId, donorName) {
            document.getElementById('approveDonorName').textContent = donorName;
            document.getElementById('approveForm').action = `/admin/donations/${donationId}/approve`;
            document.getElementById('approveModal').classList.remove('hidden');
        }

        function hideApproveModal() {
            document.getElementById('approveModal').classList.add('hidden');
            document.getElementById('approve_admin_notes').value = '';
        }

        function showRejectModal(donationId, donorName) {
            document.getElementById('rejectDonorName').textContent = donorName;
            document.getElementById('rejectForm').action = `/admin/donations/${donationId}/reject`;
            document.getElementById('rejectModal').classList.remove('hidden');
        }

        function hideRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
            document.getElementById('rejection_reason').value = '';
        }

        // Close modals when clicking outside
        document.getElementById('approveModal').addEventListener('click', function(e) {
            if (e.target === this) hideApproveModal();
        });

        document.getElementById('rejectModal').addEventListener('click', function(e) {
            if (e.target === this) hideRejectModal();
        });
    </script>
    @endpush
</x-layouts.integrated-dashboard>
