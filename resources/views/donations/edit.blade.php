<x-layouts.integrated-dashboard title="Edit Donasi #{{ $donation->id }}">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <!-- Back Button -->
                    <div class="mb-6">
                        <a href="{{ route('dashboard.donatur') }}"
                            class="group inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Dashboard
                        </a>
                    </div>
            <div class="mb-8 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-2xl p-8 text-white shadow-xl">
                
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">Edit Donasi Buku</h1>
                        <p class="text-blue-100 mt-1">Donasi #{{ $donation->id }}</p>
                    </div>
                    
                </div>
                <p class="text-lg text-blue-100">
                    Update informasi donasi buku Anda sebelum diverifikasi admin.
                </p>
            </div>

            @if ($donation->status !== 'pending')
                <div class="mb-8 bg-red-50 dark:bg-red-900/30 border-l-4 border-red-400 dark:border-red-500 rounded-r-xl p-6 shadow-lg">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-red-400 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.08 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">Donasi Tidak Dapat Diedit</h3>
                            <p class="mt-2 text-red-700 dark:text-red-300">Donasi ini sudah diverifikasi dan tidak dapat diedit lagi.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('donations.show', $donation) }}"
                        class="inline-flex items-center px-6 py-3 bg-gray-600 hover:bg-gray-700 dark:bg-gray-500 dark:hover:bg-gray-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali ke Detail
                    </a>
                </div>
            @else
                <form action="{{ route('donations.update', $donation) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="bg-green-50 dark:bg-green-900/30 border-l-4 border-green-400 dark:border-green-500 rounded-r-xl p-6 shadow-lg mb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-400 dark:text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-semibold text-green-800 dark:text-green-200">Berhasil!</h3>
                                    <p class="mt-2 text-green-700 dark:text-green-300">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Display All Validation Errors -->
                    @if ($errors->any())
                        <div class="bg-red-50 dark:bg-red-900/30 border-l-4 border-red-400 dark:border-red-500 rounded-r-xl p-6 shadow-lg mb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-red-400 dark:text-red-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">Terjadi Kesalahan Validasi</h3>
                                    <div class="mt-2 text-red-700 dark:text-red-300">
                                        <ul class="list-disc list-inside space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Informasi Donatur -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Donatur</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="donor_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Nama Lengkap <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="text" name="donor_name" id="donor_name" value="{{ old('donor_name', $donation->donor_name) }}"
                                    required
                                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                    placeholder="Masukkan nama lengkap Anda...">
                                @error('donor_name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="donor_phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        Nomor Telepon <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="tel" name="donor_phone" id="donor_phone" value="{{ old('donor_phone', $donation->donor_phone) }}"
                                    required
                                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                    placeholder="Contoh: 08123456789">
                                @error('donor_phone')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="donor_email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Email <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="email" name="donor_email" id="donor_email" value="{{ old('donor_email', $donation->donor_email) }}"
                                    required
                                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                    placeholder="email@contoh.com">
                                @error('donor_email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-2">
                                <label for="donor_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        Alamat Lengkap <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <textarea name="donor_address" id="donor_address" rows="3" required
                                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                                    placeholder="Masukkan alamat lengkap Anda...">{{ old('donor_address', $donation->donor_address) }}</textarea>
                                @error('donor_address')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Buku -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-600">
                        <div class="mb-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Buku</h3>
                            </div>
                        </div>

                        <div id="booksContainer">
                            @foreach ($donation->book_data ?? [] as $index => $book)
                                <div
                                    class="book-form bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl p-6 mb-6 transition-all duration-200 hover:shadow-md">
                                    <div class="mb-6">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                                <span class="text-white font-bold text-sm">{{ $index + 1 }}</span>
                                            </div>
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Buku</h4>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    Judul Buku <span class="text-red-500 ml-1">*</span>
                                                </span>
                                            </label>
                                            <input type="text" name="books[{{ $index }}][title]"
                                                value="{{ old("books.$index.title", $book['title'] ?? '') }}" required
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                                placeholder="Masukkan judul buku...">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                    </svg>
                                                    Penulis <span class="text-red-500 ml-1">*</span>
                                                </span>
                                            </label>
                                            <input type="text" name="books[{{ $index }}][author]"
                                                value="{{ old("books.$index.author", $book['author'] ?? '') }}" required
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                                placeholder="Nama penulis...">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                    </svg>
                                                    Kategori <span class="text-red-500 ml-1">*</span>
                                                </span>
                                            </label>
                                            <select name="books[{{ $index }}][category]" required
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">
                                                <option value="">Pilih Kategori...</option>
                                                @foreach (['novel' => 'Novel', 'pendidikan' => 'Pendidikan', 'agama' => 'Agama', 'anak' => 'Anak-anak', 'sejarah' => 'Sejarah', 'biografi' => 'Biografi', 'teknologi' => 'Teknologi', 'kesehatan' => 'Kesehatan', 'lainnya' => 'Lainnya'] as $value => $label)
                                                    <option value="{{ $value }}"
                                                        {{ old("books.$index.category", $book['category'] ?? '') === $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Kondisi Buku <span class="text-red-500 ml-1">*</span>
                                                </span>
                                            </label>
                                            <select name="books[{{ $index }}][condition]" required
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">
                                                <option value="">Pilih kondisi...</option>
                                                @foreach (['new' => 'Baru (Belum pernah dibaca)', 'good' => 'Baik (Sedikit bekas pakai)', 'fair' => 'Cukup (Ada kerusakan kecil)', 'poor' => 'Buruk (Banyak kerusakan)'] as $value => $label)
                                                    <option value="{{ $value }}"
                                                        {{ old("books.$index.condition", $book['condition'] ?? '') === $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    ISBN
                                                </span>
                                            </label>
                                            <input type="text" name="books[{{ $index }}][isbn]"
                                                value="{{ old("books.$index.isbn", $book['isbn'] ?? '') }}"
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                                placeholder="978-xxx-xxx-xxxx">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0h3m2 0h5M9 7h6m-6 4h6m-2 4h2" />
                                                    </svg>
                                                    Penerbit
                                                </span>
                                            </label>
                                            <input type="text" name="books[{{ $index }}][publisher]"
                                                value="{{ old("books.$index.publisher", $book['publisher'] ?? '') }}"
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                                placeholder="Nama penerbit">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    Tahun Terbit
                                                </span>
                                            </label>
                                            <input type="number" name="books[{{ $index }}][publication_year]"
                                                value="{{ old("books.$index.publication_year", $book['publication_year'] ?? '') }}" min="1900"
                                                max="2030"
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                                placeholder="2025">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    Jumlah Halaman
                                                </span>
                                            </label>
                                            <input type="number" name="books[{{ $index }}][pages]"
                                                value="{{ old("books.$index.pages", $book['pages'] ?? '') }}" min="1"
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                                placeholder="200">
                                        </div>
                                        <div class="space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                    </svg>
                                                    Bahasa
                                                </span>
                                            </label>
                                            <select name="books[{{ $index }}][language]"
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">
                                                @foreach (['id' => '🇮🇩 Indonesia', 'en' => '🇺🇸 English', 'ar' => '🇸🇦 Arab', 'other' => '🌍 Lainnya'] as $value => $label)
                                                    <option value="{{ $value }}"
                                                        {{ old("books.$index.language", $book['language'] ?? 'id') === $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="md:col-span-2 lg:col-span-3 space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    Cover Buku
                                                </span>
                                            </label>
                                            @if (isset($book['cover']) && $book['cover'])
                                                <div
                                                    class="mb-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600">
                                                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Cover saat ini:</p>
                                                    <img src="{{ Storage::url($book['cover']) }}" alt="Current cover"
                                                        class="w-24 h-32 object-cover rounded-lg shadow-md border border-gray-200 dark:border-gray-600">
                                                </div>
                                            @endif
                                            <div
                                                class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-blue-400 dark:hover:border-blue-500 bg-gray-50 dark:bg-gray-700/50 transition-colors">
                                                <input id="cover_image_{{ $index }}" name="books[{{ $index }}][cover]"
                                                    type="file" accept="image/*" class="hidden"
                                                    onchange="previewBookImage(this, {{ $index }})">
                                                <label for="cover_image_{{ $index }}" class="cursor-pointer block">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                                        <span class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500">Klik untuk
                                                            upload cover baru</span>
                                                        atau drag & drop
                                                    </span>
                                                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">PNG, JPG hingga 5MB (kosongkan jika
                                                        tidak ingin mengubah)</p>
                                                </label>

                                                <!-- Preview Area -->
                                                <div id="placeholderPreview_{{ $index }}" class="hidden"></div>
                                                <div id="imagePreview_{{ $index }}" class="hidden mt-4">
                                                    <img id="preview_{{ $index }}" class="mx-auto h-32 w-auto rounded-lg shadow-md"
                                                        alt="Preview">
                                                    <button type="button" onclick="removeBookImage({{ $index }})"
                                                        class="mt-2 text-red-500 hover:text-red-700 dark:hover:text-red-400 text-sm">
                                                        Hapus foto
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="md:col-span-2 lg:col-span-3 space-y-2">
                                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                                                <span class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M4 6h16M4 12h16M4 18h7" />
                                                    </svg>
                                                    Deskripsi/Catatan
                                                </span>
                                            </label>
                                            <textarea name="books[{{ $index }}][description]" rows="3"
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                                                placeholder="Deskripsi singkat atau catatan khusus tentang buku ini...">{{ old("books.$index.description", $book['description'] ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
            @endforeach
        </div>

        <!-- Metode Pengambilan -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-600 mt-10">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Metode Pengambilan</h3>
            </div>

            <div x-data="{ method: '{{ old('pickup_method', $donation->pickup_method) }}' }" class="space-y-4">
                <div class="space-y-4">
                    <label
                        class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <input type="radio" name="pickup_method" value="pickup" x-model="method"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Dijemput di Alamat Donatur</span>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Tim kami akan datang ke alamat Anda</p>
                        </div>
                    </label>
                    <label
                        class="flex items-center p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border border-gray-200 dark:border-gray-600 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <input type="radio" name="pickup_method" value="delivery" x-model="method"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <div class="ml-3">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Diantar ke Lokasi Tertentu</span>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Anda akan mengantarkan buku ke lokasi yang ditentukan</p>
                        </div>
                    </label>
                </div>

                <div x-show="method === 'delivery'" x-transition class="space-y-2">
                    <label for="pickup_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Alamat Pengantaran <span class="text-red-500 ml-1">*</span>
                        </span>
                    </label>
                    <textarea name="pickup_address" id="pickup_address" rows="3"
                        class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                        placeholder="Alamat lengkap untuk pengantaran buku...">{{ old('pickup_address', $donation->pickup_address) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <div class="space-y-2">
                        <label for="preferred_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Tanggal Preferensi
                            </span>
                        </label>
                        <div class="relative">
                            <input type="text" name="preferred_date" id="preferred_date"
                                value="{{ old('preferred_date', $donation->preferred_date?->format('d/m/Y')) }}"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all pr-10"
                                placeholder="Pilih tanggal" readonly>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="preferred_time" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Waktu Preferensi
                            </span>
                        </label>
                        <div class="relative">
                            <input type="text" name="preferred_time" id="preferred_time"
                                value="{{ old('preferred_time', $donation->preferred_time ? substr($donation->preferred_time, 0, 5) : '') }}"
                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all pr-10"
                                placeholder="Pilih waktu (HH:MM)" readonly>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Catatan Tambahan -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 border border-gray-200 dark:border-gray-600 mt-10">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center mb-2">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                    Catatan Tambahan
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Berikan informasi tambahan yang dapat membantu proses donasi</p>
            </div>
            
            <div class="space-y-4">
                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Pesan atau Catatan Khusus
                    </span>
                </label>
                <textarea id="notes" 
                          name="notes" 
                          rows="4"
                          class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                          placeholder="Misalnya: buku dalam kondisi khusus, waktu terbaik untuk dihubungi, atau informasi lain yang perlu kami ketahui...">{{ old('notes', $donation->notes) }}</textarea>
                <div class="flex items-start p-3 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg">
                    <svg class="w-4 h-4 mr-2 mt-0.5 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm text-blue-800 dark:text-blue-200">
                        <strong>Tips:</strong> Jelaskan kondisi spesifik buku, preferensi waktu kontak, atau hal khusus lainnya yang perlu kami ketahui untuk memproses donasi Anda dengan optimal.
                    </p>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-8">
            <a href="{{ route('donations.show', $donation) }}"
                class="inline-flex items-center justify-center px-8 py-3 bg-gray-500 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Batal
            </a>
            <button type="submit"
                class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                Simpan Perubahan
            </button>
        </div>
        </form>
        @endif
    </div>
    </div>

    @if ($donation->status === 'pending')
        <!-- JavaScript untuk preview image dan functionality lainnya -->
        <script>
            let bookIndex = {{ count($donation->book_data ?? []) }};

            // Book image preview functions
            function previewBookImage(input, index) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];

                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        alert('Silakan pilih file gambar yang valid (PNG, JPG, JPEG).');
                        input.value = '';
                        return;
                    }

                    // Validate file size (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar. Maksimal 5MB.');
                        input.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('preview_' + index);
                        const imagePreview = document.getElementById('imagePreview_' + index);
                        const placeholderPreview = document.getElementById('placeholderPreview_' + index);

                        if (preview && imagePreview && placeholderPreview) {
                            preview.src = e.target.result;
                            imagePreview.classList.remove('hidden');
                            placeholderPreview.classList.add('hidden');
                        }
                    };
                    reader.readAsDataURL(file);
                }
            }

            function removeBookImage(index) {
                const input = document.getElementById('cover_image_' + index);
                const preview = document.getElementById('preview_' + index);
                const imagePreview = document.getElementById('imagePreview_' + index);
                const placeholderPreview = document.getElementById('placeholderPreview_' + index);

                if (input) input.value = '';
                if (preview) preview.src = '';
                if (imagePreview) imagePreview.classList.add('hidden');
                if (placeholderPreview) placeholderPreview.classList.remove('hidden');
            }

            // Simple drag and drop
            document.addEventListener('DOMContentLoaded', function() {
                // Setup drag and drop for existing forms
                const existingDropZones = document.querySelectorAll('[accept="image/*"]');
                existingDropZones.forEach(function(input) {
                    const dropZone = input.closest('.border-dashed');
                    if (dropZone) {
                        setupDragAndDrop(dropZone, input);
                    }
                });
            });

            function setupDragAndDrop(dropZone, input) {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(function(eventName) {
                    dropZone.addEventListener(eventName, preventDefaults, false);
                });

                ['dragenter', 'dragover'].forEach(function(eventName) {
                    dropZone.addEventListener(eventName, function() {
                        dropZone.classList.add('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20');
                    }, false);
                });

                ['dragleave', 'drop'].forEach(function(eventName) {
                    dropZone.addEventListener(eventName, function() {
                        dropZone.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900/20');
                    }, false);
                });

                dropZone.addEventListener('drop', function(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    if (files.length > 0) {
                        input.files = files;
                        input.dispatchEvent(new Event('change'));
                    }
                });
            }

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            // Add book form with modern styling
            document.getElementById('addBookBtn').addEventListener('click', function() {
                const container = document.getElementById('booksContainer');
                const newBookForm = createBookForm(bookIndex);
                container.appendChild(newBookForm);
                bookIndex++;
                updateRemoveButtons();

                // Add smooth scroll to new book form
                newBookForm.scrollIntoView({
                    behavior: 'smooth',
                    block: 'nearest'
                });
            });

            function createBookForm(index) {
                const div = document.createElement('div');
                div.className =
                    'book-form bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl p-6 mb-6 transition-all duration-200 hover:shadow-md';

                const formHtml = '<div class="flex justify-between items-center mb-6">' +
                    '<div class="flex items-center space-x-3">' +
                    '<div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">' +
                    '<span class="text-white font-bold text-sm">' + (index + 1) + '</span>' +
                    '</div>' +
                    '<h4 class="text-lg font-semibold text-gray-900 dark:text-white">Buku #' + (index + 1) + '</h4>' +
                    '</div>' +
                    '<button type="button" class="remove-book text-red-500 hover:text-red-700 dark:hover:text-red-400 p-2 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors duration-200">' +
                    '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>' +
                    '</svg>' +
                    '</button>' +
                    '</div>' +
                    '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">' +
                    '<div class="space-y-2">' +
                    '<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">' +
                    '<span class="flex items-center">' +
                    '<svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>' +
                    '</svg>' +
                    'Judul Buku <span class="text-red-500 ml-1">*</span>' +
                    '</span>' +
                    '</label>' +
                    '<input type="text" name="books[' + index +
                    '][title]" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all" placeholder="Masukkan judul buku...">' +
                    '</div>' +
                    '<div class="space-y-2">' +
                    '<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">' +
                    '<span class="flex items-center">' +
                    '<svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>' +
                    '</svg>' +
                    'Penulis <span class="text-red-500 ml-1">*</span>' +
                    '</span>' +
                    '</label>' +
                    '<input type="text" name="books[' + index +
                    '][author]" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all" placeholder="Nama penulis...">' +
                    '</div>' +
                    '<div class="space-y-2">' +
                    '<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Kategori <span class="text-red-500 ml-1">*</span></label>' +
                    '<select name="books[' + index +
                    '][category]" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">' +
                    '<option value="">Pilih Kategori...</option>' +
                    '<option value="novel">Novel</option>' +
                    '<option value="pendidikan">Pendidikan</option>' +
                    '<option value="agama">Agama</option>' +
                    '<option value="anak">Anak-anak</option>' +
                    '<option value="sejarah">Sejarah</option>' +
                    '<option value="biografi">Biografi</option>' +
                    '<option value="teknologi">Teknologi</option>' +
                    '<option value="kesehatan">Kesehatan</option>' +
                    '<option value="lainnya">Lainnya</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="space-y-2">' +
                    '<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Kondisi Buku <span class="text-red-500 ml-1">*</span></label>' +
                    '<select name="books[' + index +
                    '][condition]" required class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">' +
                    '<option value="">Pilih kondisi...</option>' +
                    '<option value="new">Baru (Belum pernah dibaca)</option>' +
                    '<option value="good">Baik (Sedikit bekas pakai)</option>' +
                    '<option value="fair">Cukup (Ada kerusakan kecil)</option>' +
                    '<option value="poor">Buruk (Banyak kerusakan)</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="space-y-2">' +
                    '<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Cover Buku</label>' +
                    '<div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 text-center hover:border-blue-400 dark:hover:border-blue-500 bg-gray-50 dark:bg-gray-700/50 transition-colors">' +
                    '<input id="cover_image_' + index + '" name="books[' + index +
                    '][cover]" type="file" accept="image/*" class="hidden" onchange="previewBookImage(this, ' + index + ')">' +
                    '<label for="cover_image_' + index + '" class="cursor-pointer block">' +
                    '<svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">' +
                    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>' +
                    '</svg>' +
                    '<span class="text-sm text-gray-600 dark:text-gray-400">' +
                    '<span class="font-medium text-blue-600 dark:text-blue-400 hover:text-blue-500">Klik untuk upload</span> atau drag & drop' +
                    '</span>' +
                    '<p class="text-xs text-gray-500 dark:text-gray-500 mt-1">PNG, JPG hingga 5MB</p>' +
                    '</label>' +
                    '<div id="placeholderPreview_' + index + '" class="hidden">' +
                    '</div>' +
                    '<div id="imagePreview_' + index + '" class="hidden mt-4">' +
                    '<img id="preview_' + index + '" class="mx-auto h-32 w-auto rounded-lg shadow-md" alt="Preview">' +
                    '<button type="button" onclick="removeBookImage(' + index +
                    ')" class="mt-2 text-red-500 hover:text-red-700 dark:hover:text-red-400 text-sm">Hapus foto</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="md:col-span-2 lg:col-span-3 space-y-2">' +
                    '<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Deskripsi/Catatan</label>' +
                    '<textarea name="books[' + index +
                    '][description]" rows="3" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none" placeholder="Deskripsi singkat atau catatan khusus tentang buku ini..."></textarea>' +
                    '</div>' +
                    '</div>';

                div.innerHTML = formHtml;

                // Add remove functionality  
                div.querySelector('.remove-book').addEventListener('click', function() {
                    div.remove();
                    updateRemoveButtons();
                    reindexBooks();
                });

                // Setup drag and drop for this form
                const fileInput = div.querySelector('input[type="file"]');
                const dropZone = fileInput.closest('div');
                setupDragAndDrop(dropZone, fileInput);

                return div;
            }

            function updateRemoveButtons() {
                const bookForms = document.querySelectorAll('.book-form');
                bookForms.forEach((form, index) => {
                    const removeBtn = form.querySelector('.remove-book');
                    if (removeBtn) {
                        removeBtn.style.display = bookForms.length > 1 ? 'block' : 'none';
                    }
                });
            }

            function reindexBooks() {
                const bookForms = document.querySelectorAll('.book-form');
                bookForms.forEach((form, index) => {
                    const numberSpan = form.querySelector('.bg-gradient-to-br span');
                    const title = form.querySelector('h4');
                    if (numberSpan) numberSpan.textContent = index + 1;
                    if (title) title.textContent = 'Buku #' + (index + 1);

                    const inputs = form.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => {
                        if (input.name && input.name.includes('books[')) {
                            input.name = input.name.replace(/books\[\d+\]/, 'books[' + index + ']');
                        }
                        if (input.id && input.id.includes('cover_image_')) {
                            input.id = input.id.replace(/cover_image_\d+/, 'cover_image_' + index);
                        }
                    });
                });
            }

            // Debug form submission
            document.querySelector('form').addEventListener('submit', function(e) {
                console.log('Form submission started');
                
                // Validate that we have at least one book
                const bookForms = document.querySelectorAll('.book-form');
                console.log('Number of book forms:', bookForms.length);
                
                if (bookForms.length === 0) {
                    e.preventDefault();
                    alert('Minimal harus ada satu buku untuk didonasikan');
                    return false;
                }

                // Check if all required fields are filled for debugging
                let emptyFields = [];
                const requiredFields = this.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        emptyFields.push(field.name);
                    }
                });

                if (emptyFields.length > 0) {
                    console.log('Empty required fields:', emptyFields);
                }

                console.log('Form validation check completed, submitting...');
            });

            // Initialize Flatpickr for preferred_date
            const preferredDateInput = document.getElementById('preferred_date');
            
            if (preferredDateInput) {
                flatpickr(preferredDateInput, {
                    dateFormat: "d/m/Y",
                    minDate: "today",
                    allowInput: true,
                    placeholder: "Pilih tanggal",
                    onReady: function(selectedDates, dateStr, instance) {
                        instance.calendarContainer.classList.add('flatpickr-custom');
                    },
                    onChange: function(selectedDates, dateStr, instance) {
                        // Convert to Y-m-d format for form submission
                        if (selectedDates.length > 0) {
                            const date = selectedDates[0];
                            const formattedDate = date.getFullYear() + '-' + 
                                String(date.getMonth() + 1).padStart(2, '0') + '-' + 
                                String(date.getDate()).padStart(2, '0');
                            
                            // Create hidden input for form submission
                            let hiddenInput = document.getElementById('preferred_date_hidden');
                            if (!hiddenInput) {
                                hiddenInput = document.createElement('input');
                                hiddenInput.type = 'hidden';
                                hiddenInput.name = 'preferred_date';
                                hiddenInput.id = 'preferred_date_hidden';
                                preferredDateInput.parentNode.appendChild(hiddenInput);
                                
                                // Remove name from visible input to avoid conflict
                                preferredDateInput.removeAttribute('name');
                            }
                            hiddenInput.value = formattedDate;
                        }
                    }
                });
            }

            // Initialize Flatpickr for preferred_time
            const preferredTimeInput = document.getElementById('preferred_time');
            
            if (preferredTimeInput) {
                flatpickr(preferredTimeInput, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    allowInput: true,
                    placeholder: "Pilih waktu (HH:MM)",
                    onReady: function(selectedDates, dateStr, instance) {
                        instance.calendarContainer.classList.add('flatpickr-custom');
                    },
                    onChange: function(selectedDates, dateStr, instance) {
                        // The dateStr already comes in H:i format for time-only mode
                        if (dateStr) {
                            // Create hidden input for form submission
                            let hiddenInput = document.getElementById('preferred_time_hidden');
                            if (!hiddenInput) {
                                hiddenInput = document.createElement('input');
                                hiddenInput.type = 'hidden';
                                hiddenInput.name = 'preferred_time';
                                hiddenInput.id = 'preferred_time_hidden';
                                preferredTimeInput.parentNode.appendChild(hiddenInput);
                                
                                // Remove name from visible input to avoid conflict
                                preferredTimeInput.removeAttribute('name');
                            }
                            hiddenInput.value = dateStr;
                        }
                    }
                });
            }
        </script>

        <style>
            /* Custom Flatpickr styling */
            .flatpickr-custom {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                border: 1px solid #e5e7eb;
                border-radius: 12px;
            }
            
            .flatpickr-custom .flatpickr-day:hover {
                background: #3b82f6 !important;
                color: white !important;
            }
            
            .flatpickr-custom .flatpickr-day.selected {
                background: #2563eb !important;
                border-color: #2563eb !important;
            }
            
            .flatpickr-custom .flatpickr-day.today {
                border-color: #3b82f6 !important;
                color: #3b82f6 !important;
            }
            
            .flatpickr-custom .flatpickr-months .flatpickr-month {
                background: #f8fafc;
                border-radius: 8px 8px 0 0;
            }
            
            /* Dark mode adjustments */
            .dark .flatpickr-custom {
                background: #374151 !important;
                border-color: #4b5563 !important;
                color: white !important;
            }
            
            .dark .flatpickr-custom .flatpickr-months .flatpickr-month {
                background: #4b5563 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-weekday {
                color: #d1d5db !important;
            }
            
            .dark .flatpickr-custom .flatpickr-day {
                color: #f3f4f6 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-day.today {
                border-color: #60a5fa !important;
                color: #60a5fa !important;
            }
            
            /* Time picker specific dark mode styling */
            .dark .flatpickr-custom .flatpickr-time {
                background: #374151 !important;
                border-color: #4b5563 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-time .flatpickr-time-separator,
            .dark .flatpickr-custom .flatpickr-time .flatpickr-time-text {
                color: #f3f4f6 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-time input {
                background: #4b5563 !important;
                color: #f3f4f6 !important;
                border-color: #6b7280 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-time input:focus {
                background: #6b7280 !important;
                border-color: #60a5fa !important;
                box-shadow: 0 0 0 2px rgba(96, 165, 250, 0.2) !important;
            }
            
            .dark .flatpickr-custom .flatpickr-time .arrowUp,
            .dark .flatpickr-custom .flatpickr-time .arrowDown {
                color: #d1d5db !important;
            }
            
            .dark .flatpickr-custom .flatpickr-time .arrowUp:hover,
            .dark .flatpickr-custom .flatpickr-time .arrowDown:hover {
                color: #60a5fa !important;
                background: #4b5563 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-am-pm {
                background: #4b5563 !important;
                color: #f3f4f6 !important;
                border-color: #6b7280 !important;
            }
            
            .dark .flatpickr-custom .flatpickr-am-pm:hover {
                background: #6b7280 !important;
                color: #60a5fa !important;
            }
        </style>
    @endif
</x-layouts.integrated-dashboard>
