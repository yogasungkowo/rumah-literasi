<x-layouts.integrated-dashboard title="Buat Donasi Baru">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('dashboard.donatur') }}" 
                   class="group inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                    <svg class="w-5 h-5 mr-2 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>

            <!-- Page Title -->
            <div class="mb-2">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Donasi Buku</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Bagikan kebaikan melalui donasi buku untuk berbagi ilmu dan wawasan kepada masyarakat.</p>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 px-8 py-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-6 h-6 mr-3 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    Informasi Donasi
                </h2>
            </div>

            <!-- Form Content -->
            <div class="p-8">
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 dark:bg-red-900/50 border border-red-200 dark:border-red-800 rounded-xl p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-red-800 dark:text-red-200">Terdapat beberapa kesalahan:</h3>
                                <ul class="mt-3 space-y-2">
                                    @foreach ($errors->all() as $error)
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 text-red-400 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-red-700 dark:text-red-300">{{ $error }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <!-- Informasi Donatur -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center mb-4">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Informasi Donatur
                            </h3>
                        </div>
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Nama Lengkap -->
                            <div>
                                <label for="donor_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Nama Lengkap
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="text" 
                                       id="donor_name" 
                                       name="donor_name" 
                                       value="{{ old('donor_name', auth()->user()->name) }}"
                                       class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all @error('donor_name') border-red-300 dark:border-red-500 @enderror"
                                       placeholder="Masukkan nama lengkap Anda">
                                @error('donor_name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label for="donor_email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                        Email
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="email" 
                                       id="donor_email" 
                                       name="donor_email" 
                                       value="{{ old('donor_email', auth()->user()->email) }}"
                                       class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all @error('donor_email') border-red-300 dark:border-red-500 @enderror"
                                       placeholder="alamat@email.com">
                                @error('donor_email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Nomor Telepon -->
                            <div>
                                <label for="donor_phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                        Nomor Telepon
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <input type="tel" 
                                       id="donor_phone" 
                                       name="donor_phone" 
                                       value="{{ old('donor_phone', auth()->user()->phone) }}"
                                       class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all @error('donor_phone') border-red-300 dark:border-red-500 @enderror"
                                       placeholder="08xxxxxxxxxx">
                                @error('donor_phone')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Alamat -->
                            <div>
                                <label for="donor_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Alamat
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <textarea id="donor_address" 
                                          name="donor_address" 
                                          rows="3"
                                          class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none @error('donor_address') border-red-300 dark:border-red-500 @enderror"
                                          placeholder="Alamat lengkap untuk proses penjemputan">{{ old('donor_address', auth()->user()->address) }}</textarea>
                                @error('donor_address')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Buku -->
                    <div class="border-t border-gray-200 dark:border-gray-600 pt-8">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Informasi Buku
                            </h3>
                        </div>
                        
                        <div id="booksContainer">
                            <!-- First Book Form -->
                            <div class="book-form bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 rounded-xl p-6 mb-6">
                                <div class="mb-6">
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-blue-600 dark:text-blue-400 font-bold text-sm">1</span>
                                        </div>
                                        Informasi Buku
                                    </h4>
                                </div>
                                
                                <!-- Basic Information Grid -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <!-- Title -->
                                    <div class="lg:col-span-2">
                                        <label for="book_title_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                Judul Buku
                                                <span class="text-red-500 ml-1">*</span>
                                            </span>
                                        </label>
                                        <input type="text" 
                                               id="book_title_0" 
                                               name="books[0][title]" 
                                               value="{{ old('books.0.title') }}"
                                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                               placeholder="Masukkan judul lengkap buku">
                                    </div>

                                    <!-- Author -->
                                    <div>
                                        <label for="book_author_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                Penulis
                                                <span class="text-red-500 ml-1">*</span>
                                            </span>
                                        </label>
                                        <input type="text" 
                                               id="book_author_0" 
                                               name="books[0][author]" 
                                               value="{{ old('books.0.author') }}"
                                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                               placeholder="Nama penulis">
                                    </div>

                                    <!-- Category -->
                                    <div>
                                        <label for="book_category_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                                Kategori
                                                <span class="text-red-500 ml-1">*</span>
                                            </span>
                                        </label>
                                        <select id="book_category_0" 
                                                name="books[0][category]" 
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">
                                            <option value="" class="text-gray-500">Pilih kategori</option>
                                            <option value="Fiksi" {{ old('books.0.category') === 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                                            <option value="Non-Fiksi" {{ old('books.0.category') === 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                                            <option value="Pendidikan" {{ old('books.0.category') === 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                            <option value="Anak-anak" {{ old('books.0.category') === 'Anak-anak' ? 'selected' : '' }}>Anak-anak</option>
                                            <option value="Agama" {{ old('books.0.category') === 'Agama' ? 'selected' : '' }}>Agama</option>
                                            <option value="Sejarah" {{ old('books.0.category') === 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                                            <option value="Biografi" {{ old('books.0.category') === 'Biografi' ? 'selected' : '' }}>Biografi</option>
                                            <option value="Sains" {{ old('books.0.category') === 'Sains' ? 'selected' : '' }}>Sains</option>
                                            <option value="Teknologi" {{ old('books.0.category') === 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                                            <option value="Lainnya" {{ old('books.0.category') === 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Publication Details -->
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                                    <!-- Condition -->
                                    <div>
                                        <label for="book_condition_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Kondisi Buku
                                                <span class="text-red-500 ml-1">*</span>
                                            </span>
                                        </label>
                                        <select id="book_condition_0" 
                                                name="books[0][condition]" 
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">
                                            <option value="" class="text-gray-500">Pilih kondisi</option>
                                            <option value="new" {{ old('books.0.condition') === 'new' ? 'selected' : '' }}>🌟 Baru</option>
                                            <option value="good" {{ old('books.0.condition') === 'good' ? 'selected' : '' }}>✨ Baik</option>
                                            <option value="fair" {{ old('books.0.condition') === 'fair' ? 'selected' : '' }}>👍 Cukup</option>
                                            <option value="poor" {{ old('books.0.condition') === 'poor' ? 'selected' : '' }}>📚 Buruk</option>
                                        </select>
                                    </div>

                                    <!-- ISBN -->
                                    <div>
                                        <label for="book_isbn_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                ISBN
                                            </span>
                                        </label>
                                        <input type="text" 
                                               id="book_isbn_0" 
                                               name="books[0][isbn]" 
                                               value="{{ old('books.0.isbn') }}"
                                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                               placeholder="978-xxx-xxx-xxxx">
                                    </div>

                                    <!-- Publisher -->
                                    <div>
                                        <label for="book_publisher_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                                Penerbit
                                            </span>
                                        </label>
                                        <input type="text" 
                                               id="book_publisher_0" 
                                               name="books[0][publisher]" 
                                               value="{{ old('books.0.publisher') }}"
                                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                               placeholder="Nama penerbit">
                                    </div>
                                </div>

                                <!-- Additional Details -->
                                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                                    <!-- Publication Year -->
                                    <div>
                                        <label for="book_year_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                Tahun Terbit
                                            </span>
                                        </label>
                                        <input type="number" 
                                               id="book_year_0" 
                                               name="books[0][publication_year]" 
                                               value="{{ old('books.0.publication_year') }}"
                                               min="1000" 
                                               max="{{ date('Y') }}"
                                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                               placeholder="{{ date('Y') }}">
                                    </div>

                                    <!-- Pages -->
                                    <div>
                                        <label for="book_pages_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                                </svg>
                                                Jumlah Halaman
                                            </span>
                                        </label>
                                        <input type="number" 
                                               id="book_pages_0" 
                                               name="books[0][pages]" 
                                               value="{{ old('books.0.pages') }}"
                                               min="1"
                                               class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all"
                                               placeholder="200">
                                    </div>

                                    <!-- Language -->
                                    <div>
                                        <label for="book_language_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Bahasa
                                            </span>
                                        </label>
                                        <select id="book_language_0" 
                                                name="books[0][language]" 
                                                class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all">
                                            <option value="id" {{ old('books.0.language', 'id') === 'id' ? 'selected' : '' }}>🇮🇩 Indonesia</option>
                                            <option value="en" {{ old('books.0.language') === 'en' ? 'selected' : '' }}>🇺🇸 English</option>
                                            <option value="ar" {{ old('books.0.language') === 'ar' ? 'selected' : '' }}>🇸🇦 Arab</option>
                                            <option value="other" {{ old('books.0.language') === 'other' ? 'selected' : '' }}>🌍 Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mt-6">
                                    <label for="book_description_0" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                            </svg>
                                            Deskripsi/Catatan
                                        </span>
                                    </label>
                                    <textarea id="book_description_0" 
                                              name="books[0][description]" 
                                              rows="3"
                                              class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                                              placeholder="Deskripsi singkat atau catatan khusus tentang buku ini...">{{ old('books.0.description') }}</textarea>
                                </div>

                                <!-- Cover Image Upload -->
                                <div class="border-t border-gray-200 dark:border-gray-600 pt-6 mt-6">
                                    <div class="mb-4">
                                        <h4 class="text-md font-semibold text-gray-900 dark:text-white flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            Cover Buku
                                        </h4>
                                    </div>
                                    
                                    <div class="flex flex-col lg:flex-row gap-6">
                                        <!-- Upload Area -->
                                        <div class="flex-1">
                                            <div class="relative border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl hover:border-blue-400 dark:hover:border-blue-500 transition-colors duration-200 p-6 text-center bg-gray-50 dark:bg-gray-700/50">
                                                <input id="cover_image_0" 
                                                       name="books[0][cover]" 
                                                       type="file" 
                                                       accept="image/*" 
                                                       class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" 
                                                       onchange="previewBookImage(this, 0)">
                                                
                                                <div class="flex flex-col items-center justify-center space-y-3">
                                                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Upload cover buku</p>
                                                        <p class="text-xs text-gray-500 dark:text-gray-400">atau <span class="text-blue-600 dark:text-blue-400 font-medium">pilih file</span></p>
                                                    </div>
                                                    <div class="flex items-center space-x-1 text-xs text-gray-400 dark:text-gray-500">
                                                        <span>PNG, JPG, JPEG</span>
                                                        <span>•</span>
                                                        <span>Max 2MB</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Preview Area -->
                                        <div class="flex-shrink-0 lg:w-48">
                                            <div id="imagePreview_0" class="hidden">
                                                <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-3">
                                                    <img id="preview_0" 
                                                         src="" 
                                                         alt="Cover Preview" 
                                                         class="w-full h-48 object-cover rounded-lg shadow-md">
                                                    <button type="button" 
                                                            onclick="removeBookImage(0)" 
                                                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center text-xs transition-colors">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <div id="placeholderPreview_0" class="block">
                                                <div class="bg-gray-100 dark:bg-gray-700 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-600 p-6 text-center h-48 flex items-center justify-center">
                                                    <div class="text-gray-400 dark:text-gray-500">
                                                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                        <p class="text-xs">Preview cover</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Pengambilan -->
                    <div class="border-t border-gray-200 dark:border-gray-600 pt-8" x-data="{ pickupMethod: '{{ old('pickup_method', 'pickup') }}' }">
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center mb-4">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2h2m7 4a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Metode Donasi
                            </h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Dijemput di Alamat -->
                            <div class="relative">
                                <input type="radio" name="pickup_method" value="pickup" id="pickup_method_pickup" 
                                       class="sr-only peer" {{ old('pickup_method', 'pickup') === 'pickup' ? 'checked' : '' }} x-model="pickupMethod">
                                <label for="pickup_method_pickup" 
                                       class="flex items-center p-4 border-2 rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200"
                                       :class="pickupMethod === 'pickup' ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/30' : 'border-gray-200 dark:border-gray-600'">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m-4-5v9"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 7l-5-5-5 5"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">Dijemput di Alamat</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Tim kami akan datang menjemput buku donasi Anda</p>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="w-5 h-5 rounded-full border-2 transition-all flex items-center justify-center"
                                             :class="pickupMethod === 'pickup' ? 'border-blue-500 bg-blue-500' : 'border-gray-300 dark:border-gray-600'">
                                            <div class="w-2 h-2 rounded-full bg-white transition-opacity"
                                                 :class="pickupMethod === 'pickup' ? 'opacity-100' : 'opacity-0'"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Diantar ke Lokasi -->
                            <div class="relative">
                                <input type="radio" name="pickup_method" value="delivery" id="pickup_method_delivery" 
                                       class="sr-only peer" {{ old('pickup_method') === 'delivery' ? 'checked' : '' }} x-model="pickupMethod">
                                <label for="pickup_method_delivery" 
                                       class="flex items-center p-4 border-2 rounded-xl cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200"
                                       :class="pickupMethod === 'delivery' ? 'border-blue-500 bg-blue-50 dark:bg-blue-900/30' : 'border-gray-200 dark:border-gray-600'">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4 4 4m-4 5v9"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 17l5 5 5-5"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">Diantar ke Lokasi</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">Anda mengantarkan buku donasi ke lokasi kami</p>
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="w-5 h-5 rounded-full border-2 transition-all flex items-center justify-center"
                                             :class="pickupMethod === 'delivery' ? 'border-blue-500 bg-blue-500' : 'border-gray-300 dark:border-gray-600'">
                                            <div class="w-2 h-2 rounded-full bg-white transition-opacity"
                                                 :class="pickupMethod === 'delivery' ? 'opacity-100' : 'opacity-0'"></div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                            <div x-show="pickupMethod === 'pickup'" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="md:col-span-2 mt-4">
                                <label for="pickup_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Alamat Penjemputan
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <textarea name="pickup_address" id="pickup_address" rows="3"
                                          class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                                          placeholder="Alamat lengkap untuk penjemputan buku (jika berbeda dari alamat di profil)..."
                                          :required="pickupMethod === 'pickup'">{{ old('pickup_address', auth()->user()->address) }}</textarea>
                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                    <svg class="w-4 h-4 inline mr-1 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                    Opsional: Isi jika alamat penjemputan berbeda dari alamat di profil Anda
                                </p>
                            </div>

                            <div x-show="pickupMethod === 'delivery'" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="md:col-span-2 mt-4">
                                <label for="delivery_address" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Alamat Pengantaran
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <textarea name="delivery_address" id="delivery_address" rows="3"
                                          class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all resize-none"
                                          placeholder="Alamat lengkap lokasi tujuan pengantaran buku..."
                                          :required="pickupMethod === 'delivery'">{{ old('delivery_address') }}</textarea>
                            </div>
                        </div>

                        <div x-show="pickupMethod === 'pickup' || pickupMethod === 'delivery'" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label for="preferred_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span x-text="pickupMethod === 'pickup' ? 'Tanggal Penjemputan' : 'Tanggal Pengantaran'"></span>
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           id="preferred_date" 
                                           name="preferred_date" 
                                           value="{{ old('preferred_date') }}"
                                           :required="pickupMethod === 'pickup' || pickupMethod === 'delivery'"
                                           class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all pr-10"
                                           placeholder="Pilih tanggal" readonly>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="preferred_time" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span x-text="pickupMethod === 'pickup' ? 'Waktu Penjemputan' : 'Waktu Pengantaran'"></span>
                                        <span class="text-red-500 ml-1">*</span>
                                    </span>
                                </label>
                                <div class="relative">
                                    <input type="text" 
                                           id="preferred_time" 
                                           name="preferred_time" 
                                           value="{{ old('preferred_time') }}"
                                           :required="pickupMethod === 'pickup' || pickupMethod === 'delivery'"
                                           class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-2 border-gray-200 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400 transition-all pr-10"
                                           placeholder="Pilih waktu" readonly>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Tambahan -->
                    <div class="border-t border-gray-200 dark:border-gray-600 pt-8 mt-8">
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
                                      placeholder="Misalnya: buku dalam kondisi khusus, waktu terbaik untuk dihubungi, atau informasi lain yang perlu kami ketahui...">{{ old('notes') }}</textarea>
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

                    <!-- Submit Buttons -->
                    <div class="bg-gray-50 dark:bg-gray-700/30 rounded-xl p-8 mt-8 border border-gray-200 dark:border-gray-600">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                            <div class="text-sm text-gray-600 dark:text-gray-400 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <span><span class="text-red-500 font-semibold">*</span> Field yang wajib diisi</span>
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <a href="{{ route('dashboard.donatur') }}" 
                                   class="px-8 py-3 bg-white hover:bg-gray-50 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 font-medium rounded-lg border-2 border-gray-300 dark:border-gray-500 hover:border-gray-400 dark:hover:border-gray-400 transition-all duration-200 flex items-center shadow-sm hover:shadow-md">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Batal
                                </a>
                                <button type="submit" 
                                        class="px-10 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 flex items-center transform hover:scale-[1.02]">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    Ajukan Donasi
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript untuk preview image dan functionality lainnya -->
    <script>
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
                    const preview = document.getElementById(`preview_${index}`);
                    const imagePreview = document.getElementById(`imagePreview_${index}`);
                    const placeholderPreview = document.getElementById(`placeholderPreview_${index}`);
                    
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
            const input = document.getElementById(`cover_image_${index}`);
            const preview = document.getElementById(`preview_${index}`);
            const imagePreview = document.getElementById(`imagePreview_${index}`);
            const placeholderPreview = document.getElementById(`placeholderPreview_${index}`);
            
            if (input) input.value = '';
            if (preview) preview.src = '';
            if (imagePreview) imagePreview.classList.add('hidden');
            if (placeholderPreview) placeholderPreview.classList.remove('hidden');
        }

        // Enhanced drag and drop functionality for existing form
        document.addEventListener('DOMContentLoaded', function() {
            const existingDropZone = document.querySelector('input[name="books[0][cover]"]');
            if (existingDropZone) {
                const dropZoneContainer = existingDropZone.parentElement;
                
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    dropZoneContainer.addEventListener(eventName, preventDefaults, false);
                });
                
                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                
                ['dragenter', 'dragover'].forEach(eventName => {
                    dropZoneContainer.addEventListener(eventName, function(e) {
                        e.preventDefault();
                        dropZoneContainer.classList.add('border-blue-400', 'bg-blue-50', 'dark:bg-blue-900/20');
                    }, false);
                });
                
                ['dragleave', 'drop'].forEach(eventName => {
                    dropZoneContainer.addEventListener(eventName, function(e) {
                        e.preventDefault();
                        dropZoneContainer.classList.remove('border-blue-400', 'bg-blue-50', 'dark:bg-blue-900/20');
                    }, false);
                });
                
                dropZoneContainer.addEventListener('drop', function(e) {
                    e.preventDefault();
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    
                    if (files.length > 0) {
                        existingDropZone.files = files;
                        previewBookImage(existingDropZone, 0);
                    }
                }, false);
            }
        });

        // Initialize Flatpickr for preferred_date
        document.addEventListener('DOMContentLoaded', function() {
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
        });
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
</x-layouts.integrated-dashboard>
