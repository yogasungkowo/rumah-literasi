@php
    $title = 'Edit Pelatihan';
    $description = 'Perbarui informasi program pelatihan literasi';
@endphp

<x-layouts.admin :title="$title" :description="$description">
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400 mb-4">
            <a href="{{ route('admin.trainings.index') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                Kelola Pelatihan
            </a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900 dark:text-white font-medium">Edit Pelatihan</span>
        </nav>
        
        <!-- Page Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-700 dark:to-purple-700 rounded-xl shadow-lg text-white p-6 mb-6">
            <div class="flex items-center">
                <div class="p-3 bg-white/20 rounded-lg mr-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">Edit Pelatihan</h1>
                    <p class="text-white/90 mt-1">
                        {{ $training->title }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.trainings.update', $training) }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Informasi Dasar
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Perbarui informasi dasar tentang pelatihan</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="lg:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Judul Pelatihan
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $training->title) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 @error('title') border-red-500 ring-red-500 @enderror"
                               placeholder="Contoh: Pelatihan Menulis Kreatif untuk Pemula"
                               required>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div class="lg:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                                Deskripsi Pelatihan
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 @error('description') border-red-500 ring-red-500 @enderror"
                                  placeholder="Jelaskan secara detail tentang pelatihan ini, tujuan, dan manfaat yang akan didapat peserta..."
                                  required>{{ old('description', $training->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="trainer" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Nama Pelatih
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="trainer" id="trainer"
                               value="{{ old('trainer', $training->trainer) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 @error('trainer') border-red-500 ring-red-500 @enderror"
                               placeholder="Nama lengkap pelatih"
                               required>
                        @error('trainer')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="location" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Lokasi Pelatihan
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="location" id="location"
                               value="{{ old('location', $training->location) }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 @error('location') border-red-500 ring-red-500 @enderror"
                               placeholder="Alamat lengkap atau platform online"
                               required>
                        @error('location')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Status
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <select name="status" id="status"
                                    class="w-full px-4 py-3 pr-10 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200 @error('status') border-red-500 ring-red-500 @enderror appearance-none"
                                    required>
                                <option value="">Pilih Status</option>
                                <option value="draft" {{ old('status', $training->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $training->status) == 'published' ? 'selected' : '' }}>Dipublikasi</option>
                                <option value="ongoing" {{ old('status', $training->status) == 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung</option>
                                <option value="completed" {{ old('status', $training->status) == 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="cancelled" {{ old('status', $training->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                        @error('status')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Instructor Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <i class="fas fa-user-tie mr-2 text-purple-600 dark:text-purple-400"></i>
                    Informasi Instruktur
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Detail informasi tentang instruktur pelatihan</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div>
                        <label for="instructor_name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-user mr-1 text-purple-500"></i>
                                Nama Instruktur
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="instructor_name" id="instructor_name" 
                               value="{{ old('instructor_name', $training->instructor_name ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('instructor_name') border-red-500 ring-red-500 @enderror"
                               placeholder="Nama lengkap instruktur..."
                               required>
                        @error('instructor_name')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="instructor_email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-envelope mr-1 text-purple-500"></i>
                                Email Instruktur
                            </span>
                        </label>
                        <input type="email" name="instructor_email" id="instructor_email" 
                               value="{{ old('instructor_email', $training->instructor_email ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('instructor_email') border-red-500 ring-red-500 @enderror"
                               placeholder="email@contoh.com">
                        @error('instructor_email')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="instructor_phone" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-phone mr-1 text-purple-500"></i>
                                No. Telepon Instruktur
                            </span>
                        </label>
                        <input type="text" name="instructor_phone" id="instructor_phone" 
                               value="{{ old('instructor_phone', $training->instructor_phone ?? '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-purple-500 focus:ring-purple-500 transition-all duration-200 @error('instructor_phone') border-red-500 ring-red-500 @enderror"
                               placeholder="08xxxxxxxxxx">
                        @error('instructor_phone')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Schedule Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <i class="fas fa-calendar-alt mr-2 text-green-600 dark:text-green-400"></i>
                    Jadwal & Kapasitas
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Atur jadwal pelatihan dan jumlah peserta maksimal</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    <div>
                        <label for="start_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-calendar-day mr-1 text-green-500"></i>
                                Tanggal Mulai
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="start_date" id="start_date" 
                               value="{{ old('start_date', $training->start_date ? $training->start_date->format('Y-m-d') : '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500 transition-all duration-200 @error('start_date') border-red-500 ring-red-500 @enderror"
                               placeholder="Pilih tanggal mulai..."
                               readonly
                               required>
                        @error('start_date')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="end_date" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-calendar-check mr-1 text-green-500"></i>
                                Tanggal Selesai
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="end_date" id="end_date" 
                               value="{{ old('end_date', $training->end_date ? $training->end_date->format('Y-m-d') : '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500 transition-all duration-200 @error('end_date') border-red-500 ring-red-500 @enderror"
                               placeholder="Pilih tanggal selesai..."
                               readonly
                               required>
                        @error('end_date')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="start_time" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-clock mr-1 text-green-500"></i>
                                Waktu Mulai
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="start_time" id="start_time" 
                               value="{{ old('start_time', $training->start_time ? \Carbon\Carbon::parse($training->start_time)->format('H:i') : '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500 transition-all duration-200 @error('start_time') border-red-500 ring-red-500 @enderror"
                               placeholder="Pilih waktu mulai..."
                               readonly
                               required>
                        @error('start_time')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="end_time" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-clock mr-1 text-green-500"></i>
                                Waktu Selesai
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="text" name="end_time" id="end_time" 
                               value="{{ old('end_time', $training->end_time ? \Carbon\Carbon::parse($training->end_time)->format('H:i') : '') }}"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500 transition-all duration-200 @error('end_time') border-red-500 ring-red-500 @enderror"
                               placeholder="Pilih waktu selesai..."
                               readonly
                               required>
                        @error('end_time')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label for="max_participants" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-users mr-1 text-green-500"></i>
                                Maksimal Peserta
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <input type="number" name="max_participants" id="max_participants" 
                               value="{{ old('max_participants', $training->max_participants) }}"
                               min="1"
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500 transition-all duration-200 @error('max_participants') border-red-500 ring-red-500 @enderror"
                               placeholder="Contoh: 30"
                               required>
                        @error('max_participants')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-money-bill mr-1 text-green-500"></i>
                                Biaya Pelatihan
                                <span class="text-red-500 ml-1">*</span>
                            </span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400 font-medium">Rp</span>
                            <input type="number" name="price" id="price" 
                                   value="{{ old('price', $training->price) }}"
                                   min="0"
                                   class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500 transition-all duration-200 @error('price') border-red-500 ring-red-500 @enderror"
                                   placeholder="0 untuk gratis"
                                   required>
                        </div>
                        @error('price')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-orange-50 to-amber-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <i class="fas fa-info-circle mr-2 text-orange-600 dark:text-orange-400"></i>
                    Informasi Tambahan
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Detail tambahan tentang pelatihan dan materi</p>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label for="requirements" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-list-check mr-1 text-orange-500"></i>
                                Persyaratan
                            </span>
                        </label>
                        <textarea name="requirements" id="requirements" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-orange-500 focus:ring-orange-500 transition-all duration-200 @error('requirements') border-red-500 ring-red-500 @enderror"
                                  placeholder="Persyaratan yang harus dipenuhi peserta...">{{ old('requirements', $training->requirements) }}</textarea>
                        @error('requirements')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="materials" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                            <span class="flex items-center">
                                <i class="fas fa-box mr-1 text-orange-500"></i>
                                Materi yang Disediakan
                            </span>
                        </label>
                        <textarea name="materials" id="materials" rows="4"
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-orange-500 focus:ring-orange-500 transition-all duration-200 @error('materials') border-red-500 ring-red-500 @enderror"
                                  placeholder="Materi pelatihan yang akan disediakan...">{{ old('materials', $training->materials) }}</textarea>
                        @error('materials')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <label for="notes" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        <span class="flex items-center">
                            <i class="fas fa-sticky-note mr-1 text-orange-500"></i>
                            Catatan
                        </span>
                    </label>
                    <textarea name="notes" id="notes" rows="3"
                              class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-orange-500 focus:ring-orange-500 transition-all duration-200 @error('notes') border-red-500 ring-red-500 @enderror"
                              placeholder="Catatan tambahan untuk pelatihan ini...">{{ old('notes', $training->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Training Image -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <i class="fas fa-image mr-2 text-indigo-600 dark:text-indigo-400"></i>
                    Gambar Pelatihan
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Upload gambar baru atau gunakan gambar yang sudah ada</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Current Image Display -->
                    @if($training->image)
                        <div id="current-image" class="mb-4">
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-image mr-1 text-indigo-500"></i>
                                Gambar Saat Ini:
                            </p>
                            <div class="relative inline-block">
                                <img src="{{ Storage::url($training->image) }}" 
                                     alt="{{ $training->title }}"
                                     class="w-48 h-48 object-cover rounded-xl border-2 border-gray-200 dark:border-gray-600 shadow-lg">
                                <div class="absolute top-2 right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- File Upload Area -->
                    <div class="relative">
                        <label for="image" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center">
                                <i class="fas fa-upload mr-1 text-indigo-500"></i>
                                {{ $training->image ? 'Ganti Gambar' : 'Pilih Gambar' }}
                            </span>
                        </label>
                        
                        <!-- Custom File Upload -->
                        <div class="relative group">
                            <input type="file" name="image" id="image" 
                                   accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                   onchange="handleImagePreview(this)">
                            
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center group-hover:border-indigo-500 dark:group-hover:border-indigo-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700/50 group-hover:bg-indigo-50 dark:group-hover:bg-indigo-900/20">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 group-hover:text-indigo-500 dark:group-hover:text-indigo-400 mb-4 transition-colors duration-200"></i>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                                        Klik untuk upload gambar baru
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        atau drag & drop gambar di sini
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                                        Format: JPG, PNG, GIF (Maksimal 2MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        @error('image')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- New Image Preview Container -->
                    <div id="image-preview-container" class="hidden">
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-image mr-1 text-green-500"></i>
                            Gambar Baru:
                        </p>
                        <div class="relative inline-block">
                            <img id="image-preview" 
                                 class="w-48 h-48 object-cover rounded-xl border-2 border-green-200 dark:border-green-600 shadow-lg" 
                                 alt="Preview">
                            <button type="button" 
                                    id="remove-image"
                                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm font-bold shadow-lg transition-all duration-200 transform hover:scale-110">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <p class="text-sm text-green-600 dark:text-green-400 mt-2">
                            <i class="fas fa-check-circle mr-1"></i>
                            Gambar baru dipilih (akan mengganti gambar lama)
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Certificate Template -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <i class="fas fa-certificate mr-2 text-emerald-600 dark:text-emerald-400"></i>
                    Template Sertifikat
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Upload template sertifikat yang akan diberikan kepada peserta</p>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <!-- Current Certificate Template -->
                    @if($training->certificate_template)
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700 rounded-xl p-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                                <i class="fas fa-file-pdf text-emerald-600 mr-2"></i>
                                Template Sertifikat Saat Ini:
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-file-pdf text-2xl text-emerald-600 dark:text-emerald-400"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ basename($training->certificate_template) }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Template PDF
                                        </p>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $training->certificate_template) }}" 
                                   target="_blank"
                                   class="inline-flex items-center px-3 py-1.5 bg-emerald-100 hover:bg-emerald-200 dark:bg-emerald-900 dark:hover:bg-emerald-800 text-emerald-700 dark:text-emerald-300 text-sm font-medium rounded-lg transition-all duration-200">
                                    <i class="fas fa-external-link-alt mr-1"></i>
                                    Lihat
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-xl p-4">
                            <p class="text-sm text-yellow-800 dark:text-yellow-200">
                                <i class="fas fa-info-circle mr-2"></i>
                                Belum ada template sertifikat yang diupload
                            </p>
                        </div>
                    @endif

                    <!-- File Upload Area -->
                    <div class="relative">
                        <label for="certificate_template" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">
                            <span class="flex items-center">
                                <i class="fas fa-file-pdf mr-1 text-emerald-500"></i>
                                {{ $training->certificate_template ? 'Ganti Template Sertifikat' : 'Upload Template Sertifikat' }}
                            </span>
                        </label>
                        
                        <!-- Custom File Upload -->
                        <div class="relative group">
                            <input type="file" name="certificate_template" id="certificate_template" 
                                   accept=".pdf"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                   onchange="handleCertificatePreview(this)">
                            
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-8 text-center group-hover:border-emerald-500 dark:group-hover:border-emerald-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700/50 group-hover:bg-emerald-50 dark:group-hover:bg-emerald-900/20">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-file-pdf text-4xl text-gray-400 group-hover:text-emerald-500 dark:group-hover:text-emerald-400 mb-4 transition-colors duration-200"></i>
                                    <p class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                                        Klik untuk upload template sertifikat
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        atau drag & drop file PDF di sini
                                    </p>
                                    <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                                        Format: PDF (Maksimal 3MB)
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        @error('certificate_template')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Certificate Preview Container -->
                    <div id="certificate-preview-container" class="hidden">
                        <p class="text-sm font-medium text-gray-900 dark:text-white mb-2">
                            <i class="fas fa-file-pdf text-emerald-600 mr-2"></i>
                            Template Baru:
                        </p>
                        <div class="relative inline-block bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700 rounded-xl p-4">
                            <div class="flex items-center space-x-3">
                                <i class="fas fa-file-pdf text-2xl text-emerald-600 dark:text-emerald-400"></i>
                                <div>
                                    <p id="certificate-name" class="text-sm font-medium text-gray-900 dark:text-white"></p>
                                    <p id="certificate-size" class="text-xs text-gray-500 dark:text-gray-400"></p>
                                </div>
                            </div>
                            <button type="button" 
                                    id="remove-certificate"
                                    class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold shadow-lg transition-all duration-200 transform hover:scale-110">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <p class="text-sm text-green-600 dark:text-green-400 mt-2">
                            <i class="fas fa-check-circle mr-1"></i>
                            Template baru dipilih (akan mengganti template lama)
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col sm:flex-row sm:justify-end sm:space-x-4 space-y-3 sm:space-y-0">
                <a href="{{ route('admin.trainings.show', $training) }}" 
                   class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-center rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Lihat Detail
                </a>
                <a href="{{ route('admin.trainings.index') }}" 
                   class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-center rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
                <button type="submit" 
                        class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Pelatihan
                </button>
            </div>
        </div>
    </form>

    @push('scripts')
    <script>
        // Initialize Flatpickr for date inputs with proper default values
        const startDatePicker = flatpickr("#start_date", {
            dateFormat: "Y-m-d",
            locale: "id",
            allowInput: true,
            placeholder: "Pilih tanggal mulai...",
            defaultDate: "{{ old('start_date', $training->start_date ? $training->start_date->format('Y-m-d') : '') }}",
            onChange: function(selectedDates, dateStr, instance) {
                // Update minimum date for end_date picker
                const endDatePicker = document.querySelector("#end_date")._flatpickr;
                if (endDatePicker) {
                    endDatePicker.set('minDate', dateStr);
                }
            }
        });

        const endDatePicker = flatpickr("#end_date", {
            dateFormat: "Y-m-d",
            locale: "id",
            allowInput: true,
            placeholder: "Pilih tanggal selesai...",
            defaultDate: "{{ old('end_date', $training->end_date ? $training->end_date->format('Y-m-d') : '') }}",
            minDate: "{{ old('start_date', $training->start_date ? $training->start_date->format('Y-m-d') : '') }}"
        });

        // Initialize Flatpickr for time inputs with 24-hour format
        const startTimePicker = flatpickr("#start_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            allowInput: true,
            placeholder: "Pilih waktu mulai...",
            defaultDate: "{{ old('start_time', $training->start_time ? \Carbon\Carbon::parse($training->start_time)->format('H:i') : '') }}",
            onChange: function(selectedDates, dateStr, instance) {
                // Update minimum time for end_time picker if same date
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;
                const endTimePicker = document.querySelector("#end_time")._flatpickr;
                
                if (endTimePicker && startDate === endDate && dateStr) {
                    endTimePicker.set('minTime', dateStr);
                }
            }
        });

        const endTimePicker = flatpickr("#end_time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            allowInput: true,
            placeholder: "Pilih waktu selesai...",
            defaultDate: "{{ old('end_time', $training->end_time ? \Carbon\Carbon::parse($training->end_time)->format('H:i') : '') }}"
        });

        // Enhanced image preview functionality
        function handleImagePreview(input) {
            const file = input.files[0];
            const previewContainer = document.getElementById('image-preview-container');
            const preview = document.getElementById('image-preview');
            const uploadArea = input.parentElement;
            
            if (file) {
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    alert('File yang dipilih bukan gambar!');
                    input.value = '';
                    return;
                }
                
                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar! Maksimal 2MB.');
                    input.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                    uploadArea.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        // Remove image functionality
        document.getElementById('remove-image').addEventListener('click', function() {
            const input = document.getElementById('image');
            const previewContainer = document.getElementById('image-preview-container');
            const uploadArea = input.parentElement;
            
            input.value = '';
            previewContainer.classList.add('hidden');
            uploadArea.classList.remove('hidden');
        });

        // Drag and drop functionality
        const uploadArea = document.querySelector('#image').parentElement;
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            uploadArea.classList.add('border-indigo-500', 'bg-indigo-50', 'dark:bg-indigo-900/20');
        }

        function unhighlight(e) {
            uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50', 'dark:bg-indigo-900/20');
        }

        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            const fileInput = document.getElementById('image');
            
            fileInput.files = files;
            handleImagePreview(fileInput);
        }

        // Price input formatting
        document.getElementById('price').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value;
        });

        // Form validation with improved time handling
        document.querySelector('form').addEventListener('submit', function(e) {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;
            
            // Validate dates
            if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
                e.preventDefault();
                alert('Tanggal mulai tidak boleh lebih dari tanggal selesai!');
                return;
            }
            
            // Validate times if same date
            if (startDate === endDate && startTime && endTime) {
                const startDateTime = new Date(`${startDate} ${startTime}`);
                const endDateTime = new Date(`${endDate} ${endTime}`);
                
                if (startDateTime >= endDateTime) {
                    e.preventDefault();
                    alert('Waktu mulai harus lebih awal dari waktu selesai!');
                    return;
                }
            }
            
            // Validate required fields
            const requiredFields = ['title', 'description', 'trainer', 'location', 'status', 'start_date', 'end_date', 'start_time', 'end_time', 'max_participants', 'price', 'instructor_name'];
            for (let field of requiredFields) {
                const element = document.getElementById(field);
                if (element && !element.value.trim()) {
                    e.preventDefault();
                    alert(`Field ${element.labels[0].textContent.replace('*', '').trim()} harus diisi!`);
                    element.focus();
                    return;
                }
            }
        });

        // Auto-resize textareas
        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        });

        // Certificate template preview functionality
        function handleCertificatePreview(input) {
            const file = input.files[0];
            const previewContainer = document.getElementById('certificate-preview-container');
            const certificateName = document.getElementById('certificate-name');
            const certificateSize = document.getElementById('certificate-size');

            if (file) {
                // Validate file type
                if (!file.type.includes('pdf')) {
                    alert('Hanya file PDF yang diperbolehkan!');
                    input.value = '';
                    return;
                }

                // Validate file size (3MB = 3 * 1024 * 1024 bytes)
                if (file.size > 3 * 1024 * 1024) {
                    alert('Ukuran file tidak boleh lebih dari 3MB!');
                    input.value = '';
                    return;
                }

                // Show preview
                certificateName.textContent = file.name;
                certificateSize.textContent = formatFileSize(file.size);
                previewContainer.classList.remove('hidden');
            } else {
                previewContainer.classList.add('hidden');
            }
        }

        // Remove certificate functionality
        document.getElementById('remove-certificate').addEventListener('click', function() {
            const input = document.getElementById('certificate_template');
            const previewContainer = document.getElementById('certificate-preview-container');
            
            input.value = '';
            previewContainer.classList.add('hidden');
        });

        // Helper function to format file size
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    </script>
    @endpush
</x-layouts.admin>
