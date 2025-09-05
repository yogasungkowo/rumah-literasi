<x-layouts.admin title="Detail Pelatihan">
    <!-- Enhanced Header Section -->
    <div class="mb-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400 mb-6">
            <a href="{{ route('admin.trainings.index') }}" class="flex items-center hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Kelola Pelatihan
            </a>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-indigo-600 dark:text-indigo-400 font-medium">Detail Pelatihan</span>
        </nav>
        
        <!-- Page Header -->
        <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-700 rounded-xl shadow-xl p-8 text-white">
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-start mb-4">
                        <div class="p-3 bg-white/20 rounded-xl mr-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white leading-tight">{{ $training->title }}</h1>
                            <p class="text-white/90 mt-2 text-lg">Detail lengkap informasi pelatihan</p>
                        </div>
                    </div>
                    
                    <!-- Quick Status Info -->
                    <div class="flex flex-wrap items-center gap-4 mt-6">
                        <div class="flex items-center bg-white/10 rounded-lg px-3 py-2 backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-2 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-white/90 font-medium">
                                @if($training->status === 'published')
                                    Dipublikasi
                                @elseif($training->status === 'draft')
                                    Draft
                                @elseif($training->status === 'ongoing')
                                    Berlangsung
                                @elseif($training->status === 'completed')
                                    Selesai
                                @else
                                    Dibatalkan
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center bg-white/10 rounded-lg px-3 py-2 backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-2 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span class="text-white/90 font-medium">{{ $training->current_participants ?? 0 }}/{{ $training->max_participants }} Peserta</span>
                        </div>
                        @if($training->price > 0)
                        <div class="flex items-center bg-white/10 rounded-lg px-3 py-2 backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-2 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                            <span class="text-white/90 font-medium">Rp {{ number_format($training->price, 0, ',', '.') }}</span>
                        </div>
                        @else
                        <div class="flex items-center bg-white/10 rounded-lg px-3 py-2 backdrop-blur-sm">
                            <svg class="w-4 h-4 mr-2 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12z"/>
                            </svg>
                            <span class="text-white/90 font-medium">Gratis</span>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="mt-6 lg:mt-0 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('admin.trainings.edit', $training) }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-white/20 hover:bg-white/30 text-white font-medium rounded-lg transition-all duration-200 backdrop-blur-sm border border-white/30">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Pelatihan
                    </a>
                    
                    <form method="POST" action="{{ route('admin.trainings.destroy', $training) }}" 
                          class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelatihan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center px-6 py-3 bg-red-500/20 hover:bg-red-500/30 text-white font-medium rounded-lg transition-all duration-200 backdrop-blur-sm border border-red-400/50">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Training Image & Basic Info -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:space-x-6">
                        <div class="flex-shrink-0 mb-4 md:mb-0">
                            <img src="{{ $training->image_url }}" 
                                 alt="{{ $training->title }}"
                                 class="w-full md:w-64 h-48 object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-4">
                                <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                                    @if($training->status === 'published') bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100
                                    @elseif($training->status === 'ongoing') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                    @elseif($training->status === 'completed') bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100
                                    @elseif($training->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
                                    @else bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100 @endif">
                                    {{ $training->status_label }}
                                </span>
                                
                                @if($training->price > 0)
                                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                        Rp {{ number_format($training->price, 0, ',', '.') }}
                                    </span>
                                @else
                                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                        Gratis
                                    </span>
                                @endif
                            </div>
                            
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ $training->title }}</h2>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                {{ $training->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule & Location -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jadwal & Lokasi</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-white mb-3">Tanggal</h4>
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>
                                        <strong>Mulai:</strong> {{ $training->start_date->format('d M Y') }}
                                    </span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>
                                        <strong>Selesai:</strong> {{ $training->end_date->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-900 dark:text-white mb-3">Waktu</h4>
                            <div class="space-y-2">
                                <div class="flex items-center text-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 mr-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>{{ $training->start_time->format('H:i') }} - {{ $training->end_time->format('H:i') }} WIB</span>
                                </div>
                                <div class="flex items-center text-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 mr-3 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $training->location }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructor Information -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Instruktur</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">{{ $training->instructor_name }}</h4>
                            @if($training->instructor_email)
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $training->instructor_email }}
                                </p>
                            @endif
                            @if($training->instructor_phone)
                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    {{ $training->instructor_phone }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Requirements & Materials -->
            @if($training->requirements || $training->materials)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Persyaratan & Materi</h3>
                </div>
                <div class="p-6 space-y-6">
                    @if($training->requirements)
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Persyaratan</h4>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{ $training->requirements }}</p>
                    </div>
                    @endif
                    
                    @if($training->materials)
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-white mb-2">Materi yang Disediakan</h4>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{ $training->materials }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Notes -->
            @if($training->notes)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Catatan</h3>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{ $training->notes }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Participants Info -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Peserta</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                            {{ $training->current_participants }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">dari {{ $training->max_participants }} peserta</div>
                    </div>
                    
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full transition-all duration-300" 
                             style="width: {{ $training->max_participants > 0 ? ($training->current_participants / $training->max_participants) * 100 : 0 }}%"></div>
                    </div>
                    
                    <div class="text-center">
                        @if($training->is_full)
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                Penuh
                            </span>
                        @else
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                {{ $training->available_slots }} slot tersisa
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Statistik Cepat</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Dibuat:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $training->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Diperbarui:</span>
                        <span class="font-medium text-gray-900 dark:text-white">{{ $training->updated_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Durasi:</span>
                        <span class="font-medium text-gray-900 dark:text-white">
                            {{ $training->start_date->diffInDays($training->end_date) + 1 }} hari
                        </span>
                    </div>
                    @if($training->price > 0)
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Total Pendapatan:</span>
                        <span class="font-medium text-green-600 dark:text-green-400">
                            Rp {{ number_format($training->price * $training->current_participants, 0, ',', '.') }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Action Panel -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aksi Cepat</h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.trainings.edit', $training) }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Pelatihan
                    </a>
                    
                    @if($training->status === 'draft')
                    <form method="POST" action="{{ route('admin.trainings.update', $training) }}" class="w-full">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="published">
                        <input type="hidden" name="title" value="{{ $training->title }}">
                        <input type="hidden" name="description" value="{{ $training->description }}">
                        <input type="hidden" name="instructor_name" value="{{ $training->instructor_name }}">
                        <input type="hidden" name="start_date" value="{{ $training->start_date->format('Y-m-d') }}">
                        <input type="hidden" name="end_date" value="{{ $training->end_date->format('Y-m-d') }}">
                        <input type="hidden" name="start_time" value="{{ $training->start_time->format('H:i') }}">
                        <input type="hidden" name="end_time" value="{{ $training->end_time->format('H:i') }}">
                        <input type="hidden" name="location" value="{{ $training->location }}">
                        <input type="hidden" name="max_participants" value="{{ $training->max_participants }}">
                        <input type="hidden" name="price" value="{{ $training->price }}">
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Publikasikan
                        </button>
                    </form>
                    @endif
                    
                    <a href="{{ route('admin.trainings.index') }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
