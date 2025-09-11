<x-layouts.integrated-dashboard title="Detail Donasi #{{ $donation->id }}">
    <div class="max-w-6xl mx-auto space-y-6">
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
        
        <!-- Header -->
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Donasi #{{ $donation->id }}</h2>
                <p class="text-gray-600 dark:text-gray-400">Diajukan pada {{ $donation->created_at->format('d F Y, H:i') }}</p>
            </div>
            <div class="flex items-center space-x-3">
                @php
                    $statusConfig = [
                        'pending' => ['bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300', 'Menunggu Verifikasi'],
                        'approved' => ['bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300', 'Disetujui'],
                        'rejected' => ['bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300', 'Ditolak'],
                        'picked_up' => ['bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300', 'Sudah Dijemput'],
                        'completed' => ['bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300', 'Selesai'],
                        'cancelled' => ['bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-300', 'Dibatalkan']
                    ];
                    $config = $statusConfig[$donation->status] ?? ['bg-gray-100 text-gray-800', ucfirst($donation->status)];
                @endphp
                <span class="px-4 py-2 rounded-full text-sm font-medium {{ $config[0] }}">
                    {{ $config[1] }}
                </span>
                <div class="flex space-x-2">
                    <a href="{{ route('donations.history') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Riwayat
                    </a>
                    @if($donation->status === 'pending')
                        <a href="{{ route('donations.edit', $donation->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-4 py-2 rounded-lg transition-colors inline-flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Status Timeline -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Status Timeline</h3>
            <div class="relative">
                <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200 dark:bg-gray-600"></div>
                
                <!-- Created -->
                <div class="relative flex items-center mb-6">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-plus text-white text-sm"></i>
                    </div>
                    <div class="ml-4">
                        <p class="font-medium text-gray-900 dark:text-white">Donasi Diajukan</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $donation->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>

                @if($donation->status !== 'pending')
                    <!-- Verified -->
                    <div class="relative flex items-center mb-6">
                        <div class="flex-shrink-0 w-8 h-8 {{ $donation->status === 'rejected' ? 'bg-red-600' : 'bg-green-600' }} rounded-full flex items-center justify-center">
                            <i class="fas {{ $donation->status === 'rejected' ? 'fa-times' : 'fa-check' }} text-white text-sm"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900 dark:text-white">
                                {{ $donation->status === 'rejected' ? 'Donasi Ditolak' : 'Donasi Disetujui' }}
                            </p>
                            @if($donation->approved_at)
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $donation->approved_at->format('d M Y, H:i') }}</p>
                            @endif
                            @if($donation->verifier)
                                <p class="text-sm text-gray-600 dark:text-gray-400">oleh {{ $donation->verifier->name }}</p>
                            @endif
                        </div>
                    </div>
                @endif

                @if($donation->status === 'picked_up' || $donation->status === 'completed')
                    <!-- Picked Up -->
                    <div class="relative flex items-center mb-6">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-truck text-white text-sm"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900 dark:text-white">Buku Dijemput</p>
                            @if($donation->picked_up_at)
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $donation->picked_up_at->format('d M Y, H:i') }}</p>
                            @endif
                        </div>
                    </div>
                @endif

                @if($donation->status === 'completed')
                    <!-- Completed -->
                    <div class="relative flex items-center mb-6">
                        <div class="flex-shrink-0 w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-flag-checkered text-white text-sm"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900 dark:text-white">Donasi Selesai</p>
                            @if($donation->completed_at)
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $donation->completed_at->format('d M Y, H:i') }}</p>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Informasi Donatur -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Donatur</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Nama Lengkap</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $donation->donor_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Email</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $donation->donor_email }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Nomor Telepon</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $donation->donor_phone }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Alamat</p>
                        <p class="font-medium text-gray-900 dark:text-white">{{ $donation->donor_address }}</p>
                    </div>
                </div>
            </div>

            <!-- Informasi Pengambilan -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Pengambilan</h3>
                <div class="space-y-3">
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Metode</p>
                        <p class="font-medium text-gray-900 dark:text-white">
                            {{ $donation->pickup_method === 'pickup' ? 'Dijemput di alamat donatur' : 'Diantar ke lokasi tertentu' }}
                        </p>
                    </div>
                    @if($donation->pickup_method === 'delivery' && $donation->pickup_address)
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Alamat Pengantaran</p>
                            <p class="font-medium text-gray-900 dark:text-white">{{ $donation->pickup_address }}</p>
                        </div>
                    @endif
                    @if($donation->preferred_date)
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Tanggal Preferensi</p>
                            <p class="font-medium text-gray-900 dark:text-white">
                                {{ \Carbon\Carbon::parse($donation->preferred_date)->format('d F Y') }}
                                @if($donation->preferred_time)
                                    pada {{ \Carbon\Carbon::parse($donation->preferred_time)->format('H:i') }}
                                @endif
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Daftar Buku -->
        @if($donation->book_data)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Buku ({{ count($donation->book_data) }} buku)</h3>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach($donation->book_data as $index => $book)
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex space-x-4">
                                    @if(isset($book['cover']) && $book['cover'])
                                        <div class="flex-shrink-0">
                                            <img src="{{ Storage::url($book['cover']) }}" 
                                                 alt="Cover {{ $book['title'] ?? 'N/A' }}"
                                                 class="w-16 h-20 object-cover rounded-lg shadow-sm">
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="text-lg font-medium text-gray-900 dark:text-white">{{ $book['title'] ?? 'N/A' }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $book['author'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                                <span class="text-sm text-gray-500 dark:text-gray-400">#{{ $index + 1 }}</span>
                            </div>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Kategori</p>
                                    <p class="font-medium text-gray-900 dark:text-white">{{ $book['category'] ?? '-' }}</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Kondisi</p>
                                    <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full
                                        {{ ($book['condition'] ?? '') === 'new' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : '' }}
                                        {{ ($book['condition'] ?? '') === 'good' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300' : '' }}
                                        {{ ($book['condition'] ?? '') === 'fair' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' : '' }}
                                        {{ ($book['condition'] ?? '') === 'poor' ? 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' : '' }}">
                                        {{ 
                                            ($book['condition'] ?? '') === 'new' ? 'Baru' : 
                                            (($book['condition'] ?? '') === 'good' ? 'Baik' : 
                                            (($book['condition'] ?? '') === 'fair' ? 'Cukup' : 
                                            (($book['condition'] ?? '') === 'poor' ? 'Buruk' : '-')))
                                        }}
                                    </span>
                                </div>
                                @if(isset($book['isbn']) && $book['isbn'])
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">ISBN</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $book['isbn'] }}</p>
                                    </div>
                                @endif
                                @if(isset($book['publisher']) && $book['publisher'])
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Penerbit</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $book['publisher'] }}</p>
                                    </div>
                                @endif
                                @if(isset($book['publication_year']) && $book['publication_year'])
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Tahun Terbit</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $book['publication_year'] }}</p>
                                    </div>
                                @endif
                                @if(isset($book['pages']) && $book['pages'])
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Halaman</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $book['pages'] }} hal</p>
                                    </div>
                                @endif
                                @if(isset($book['language']) && $book['language'])
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Bahasa</p>
                                        <p class="font-medium text-gray-900 dark:text-white">
                                            {{ 
                                                $book['language'] === 'id' ? 'Indonesia' : 
                                                ($book['language'] === 'en' ? 'English' : 
                                                ($book['language'] === 'ar' ? 'Arab' : ucfirst($book['language'])))
                                            }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                            
                            @if(isset($book['description']) && $book['description'])
                                <div class="mt-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Deskripsi</p>
                                    <p class="text-gray-900 dark:text-white">{{ $book['description'] }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Notes and Status Messages -->
        @if($donation->notes || $donation->admin_notes || $donation->rejection_reason)
            <div class="space-y-4">
                @if($donation->notes)
                    <div class="bg-blue-50 dark:bg-blue-900/50 rounded-lg p-4 border border-blue-200 dark:border-blue-700">
                        <h4 class="font-medium text-blue-900 dark:text-blue-100 mb-2">Catatan Donatur</h4>
                        <p class="text-blue-800 dark:text-blue-200">{{ $donation->notes }}</p>
                    </div>
                @endif

                @if($donation->admin_notes)
                    <div class="bg-green-50 dark:bg-green-900/50 rounded-lg p-4 border border-green-200 dark:border-green-700">
                        <h4 class="font-medium text-green-900 dark:text-green-100 mb-2">Catatan Admin</h4>
                        <p class="text-green-800 dark:text-green-200">{{ $donation->admin_notes }}</p>
                    </div>
                @endif

                @if($donation->rejection_reason)
                    <div class="bg-red-50 dark:bg-red-900/50 rounded-lg p-4 border border-red-200 dark:border-red-700">
                        <h4 class="font-medium text-red-900 dark:text-red-100 mb-2">Alasan Penolakan</h4>
                        <p class="text-red-800 dark:text-red-200">{{ $donation->rejection_reason }}</p>
                    </div>
                @endif
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4">
            @if($donation->status === 'pending')
                <a href="{{ route('donations.edit', $donation) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i>Edit Donasi
                </a>
                <form method="POST" action="{{ route('donations.cancel', $donation) }}" class="inline" onsubmit="return confirm('Yakin ingin membatalkan donasi ini?')">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg transition-colors">
                        <i class="fas fa-times mr-2"></i>Batalkan Donasi
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-layouts.integrated-dashboard>
