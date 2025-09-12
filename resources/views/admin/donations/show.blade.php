@php
    use Illuminate\Support\Facades\Storage;
@endphp
<x-layouts.admin title="Detail Donasi" description="Tinjau dan kelola detail donasi">
    <div class="w-full max-w-none">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('admin.donations.index') }}"
                class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar Donasi
            </a>
        </div>

        <!-- Status and Actions -->
        <div class="mb-6 flex justify-between items-center">
            <div>
                <span
                    class="inline-flex px-3 py-1 text-sm font-semibold rounded-full
                    @if ($donation->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                    @elseif($donation->status === 'approved') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                    @elseif($donation->status === 'picked_up') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100
                    @elseif($donation->status === 'completed') bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100
                    @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                    @switch($donation->status)
                        @case('pending') Menunggu @break
                        @case('approved') Disetujui @break
                        @case('picked_up') Sudah Diambil @break
                        @case('completed') Selesai @break
                        @case('rejected') Ditolak @break
                        @default {{ ucfirst($donation->status) }}
                    @endswitch
                </span>
            </div>

            <!-- Action Buttons -->
            @if ($donation->status === 'pending')
                <div class="flex space-x-2">
                    <form action="{{ route('admin.donations.approve', $donation) }}" method="POST" class="inline" id="approve-form">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                            onclick="confirmApprove()">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Setujui
                        </button>
                    </form>
                    <form action="{{ route('admin.donations.reject', $donation) }}" method="POST" class="inline" id="reject-form">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                            onclick="confirmReject()">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Tolak
                        </button>
                    </form>
                </div>
            @elseif($donation->status === 'approved')
                <div class="flex space-x-2">
                    <form action="{{ route('admin.donations.mark-picked-up', $donation) }}" method="POST" class="inline" id="picked-up-form">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                            onclick="confirmPickedUp()">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tandai Sudah Diambil
                        </button>
                    </form>
                </div>
            @elseif($donation->status === 'picked_up')
                <div class="flex space-x-2">
                    <form action="{{ route('admin.donations.complete', $donation) }}" method="POST" class="inline" id="complete-form">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-colors font-medium"
                            onclick="confirmComplete()">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Tandai Selesai
                        </button>
                    </form>
                </div>
            @endif
        </div>

        <!-- Quick Summary Card -->
        <div class="mb-6 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg p-6 border border-blue-200 dark:border-gray-600">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Ringkasan Donasi</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ number_format($donation->total_books) }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Buku</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $donation->pickup_method === 'pickup' ? 'Dijemput' : 'Diantar' }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Metode Pengambilan</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $donation->preferred_date ? $donation->preferred_date->format('d M Y') : 'Tidak ditentukan' }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Tanggal Preferensi</div>
                </div>
                <div class="text-center">
                    <div class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $donation->created_at->format('d M Y') }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-300">Tanggal Kirim</div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mb-8 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-4">Aksi Cepat</h3>
            <div class="flex flex-wrap gap-4">
                <!-- Contact Donor -->
                <a href="mailto:{{ $donation->donor_email }}" 
                   class="inline-flex items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email Donatur
                </a>

                @if($donation->donor_phone)
                    <a href="tel:{{ $donation->donor_phone }}" 
                       class="inline-flex items-center px-3 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Telepon Donatur
                    </a>
                @endif

                @if($donation->pickup_method === 'pickup' && ($donation->pickup_address || $donation->donor_address))
                    <a href="https://maps.google.com/?q={{ urlencode($donation->pickup_address ?: $donation->donor_address) }}" 
                       target="_blank"
                       class="inline-flex items-center px-3 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-md transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Lihat Rute
                    </a>
                @endif

                <!-- Print/Export -->
                <button onclick="window.print()" 
                        class="inline-flex items-center px-3 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                    </svg>
                    Cetak Detail
                </button>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="space-y-8">
            <!-- Donor and Pickup Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Donor Information -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Informasi Donatur</h3>
                    </div>
                    <div class="px-8 py-6">
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $donation->donor_name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                    <a href="mailto:{{ $donation->donor_email }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                        {{ $donation->donor_email }}
                                    </a>
                                </dd>
                            </div>
                            @if($donation->donor_phone)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Telepon</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                        <a href="tel:{{ $donation->donor_phone }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                            {{ $donation->donor_phone }}
                                        </a>
                                    </dd>
                                </div>
                            @endif
                            @if($donation->donor_address)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Alamat</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $donation->donor_address }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>

                <!-- Pickup Information -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 0V6a2 2 0 012-2h4a2 2 0 012 2v1m-6 0h8m-9 0h10v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                            </svg>
                            Informasi Pengambilan
                        </h3>
                    </div>
                    <div class="px-8 py-6">
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Metode</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                        @if($donation->pickup_method === 'pickup') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                        @else bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100 @endif">
                                        {{ $donation->pickup_method === 'pickup' ? 'Dijemput' : 'Diantar' }}
                                    </span>
                                </dd>
                            </div>
                            
                            @if($donation->preferred_date)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Preferensi</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                        {{ \Carbon\Carbon::parse($donation->preferred_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                    </dd>
                                </div>
                            @endif

                            @if($donation->preferred_time)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Waktu Preferensi</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $donation->preferred_time }}</dd>
                                </div>
                            @endif

                            @if($donation->pickup_address)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                        {{ $donation->pickup_method === 'pickup' ? 'Alamat Penjemputan' : 'Alamat Pengantaran' }}
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                        {{ $donation->pickup_address }}
                                        @if($donation->pickup_method === 'pickup')
                                            <a href="https://maps.google.com/?q={{ urlencode($donation->pickup_address) }}" 
                                               target="_blank" 
                                               class="ml-2 text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 text-xs">
                                                (Lihat di Maps)
                                            </a>
                                        @endif
                                    </dd>
                                </div>
                            @endif

                            @if($donation->notes)
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Catatan</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $donation->notes }}</dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Detail Donasi -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Detail Donasi</h3>
                </div>
                <div class="px-8 py-6">
                    <dl class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Buku</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ number_format($donation->total_books) }} buku</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Kirim</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($donation->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</dd>
                        </div>
                        @if ($donation->donor_id)
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Akun Pengguna</dt>
                                <dd class="mt-1">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Pengguna Terdaftar
                                    </span>
                                </dd>
                            </div>
                        @endif
                        @if ($donation->verified_by)
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Diverifikasi Oleh</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $donation->verifier->name ?? 'Tidak diketahui' }}</dd>
                            </div>
                        @endif
                        @if ($donation->verified_at)
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Verifikasi</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($donation->verified_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</dd>
                            </div>
                        @endif
                        @if ($donation->picked_up_at)
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tanggal Diambil</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($donation->picked_up_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>
            </div>

            <!-- Book Information Section (Full Width) -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg border border-gray-200 dark:border-gray-700">
                <div class="px-8 py-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Informasi Buku</h3>
                </div>
                <div class="px-8 py-6">
                    @php
                        $bookData = $donation->book_data;
                        if (is_string($bookData)) {
                            $bookData = json_decode($bookData, true);
                        }
                    @endphp

                    @if ($bookData && is_array($bookData) && count($bookData) > 0)
                        <div class="space-y-8">
                            @foreach ($bookData as $index => $book)
                                <div class="@if($index > 0) pt-8 border-t border-gray-200 dark:border-gray-700 @endif">
                                    <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                                        <!-- Book Cover -->
                                        @if (isset($book['cover']) && $book['cover'])
                                            <div class="lg:col-span-1">
                                                <img src="{{ Storage::url($book['cover']) }}" 
                                                     alt="Sampul Buku" 
                                                     class="w-full max-w-48 rounded-lg shadow-md object-cover">
                                            </div>
                                        @endif

                                        <!-- Book Details -->
                                        <div class="{{ isset($book['cover']) && $book['cover'] ? 'lg:col-span-4' : 'lg:col-span-5' }}">
                                            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                                                @if (isset($book['title']) && $book['title'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white font-medium">{{ $book['title'] }}</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['author']) && $book['author'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Penulis</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['author'] }}</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['publisher']) && $book['publisher'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Penerbit</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['publisher'] }}</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['year']) && $book['year'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Tahun</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['year'] }}</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['isbn']) && $book['isbn'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">ISBN</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['isbn'] }}</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['pages']) && $book['pages'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Halaman</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['pages'] }} halaman</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['condition']) && $book['condition'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Kondisi</dt>
                                                        <dd class="mt-1">
                                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                                                @if($book['condition'] === 'excellent') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                                                @elseif($book['condition'] === 'good') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100
                                                                @elseif($book['condition'] === 'fair') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                                                @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                                                                @switch($book['condition'])
                                                                    @case('excellent') Sangat Baik @break
                                                                    @case('good') Baik @break
                                                                    @case('fair') Cukup @break
                                                                    @case('poor') Buruk @break
                                                                    @default {{ ucfirst($book['condition']) }}
                                                                @endswitch
                                                            </span>
                                                        </dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['quantity']) && $book['quantity'])
                                                    <div>
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['quantity'] }} eksemplar</dd>
                                                    </div>
                                                @endif

                                                @if (isset($book['description']) && $book['description'])
                                                    <div class="md:col-span-2 xl:col-span-3">
                                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Deskripsi</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $book['description'] }}</dd>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 mx-auto text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Tidak ada informasi buku tersedia</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
        function confirmApprove() {
            Swal.fire({
                title: 'Setujui Donasi?',
                text: 'Apakah Anda yakin ingin menyetujui donasi ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('approve-form').submit();
                }
            });
        }

        function confirmReject() {
            Swal.fire({
                title: 'Tolak Donasi?',
                text: 'Apakah Anda yakin ingin menolak donasi ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('reject-form').submit();
                }
            });
        }

        function confirmPickedUp() {
            Swal.fire({
                title: 'Tandai Sudah Diambil?',
                text: 'Apakah donasi ini sudah berhasil diambil?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Sudah Diambil!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('picked-up-form').submit();
                }
            });
        }

        function confirmComplete() {
            Swal.fire({
                title: 'Selesaikan Donasi?',
                text: 'Tandai donasi ini sebagai selesai?',
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#7c3aed',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Selesai!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('complete-form').submit();
                }
            });
        }
    </script>
    @endpush
</x-layouts.admin>
