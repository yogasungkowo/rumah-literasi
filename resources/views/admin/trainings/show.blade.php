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
                            <span class="text-white/90 font-medium">{{ $training->participants()->count() }}/{{ $training->max_participants }} Peserta</span>
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
                          class="inline" id="delete-training-show-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" 
                                class="w-full inline-flex items-center justify-center px-6 py-3 bg-red-500/20 hover:bg-red-500/30 text-white font-medium rounded-lg transition-all duration-200 backdrop-blur-sm border border-red-400/50"
                                onclick="confirmDeleteTrainingShow('{{ $training->title }}')">
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

            <!-- Detailed Daily Schedule -->
            @if($training->schedule && is_array($training->schedule) && count($training->schedule) > 0)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-calendar-week mr-2 text-indigo-600 dark:text-indigo-400"></i>
                        Jadwal Detail Harian
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        @php
                            // Check if it's old format (day_1, day_2) or new format (0, 1, 2)
                            $isOldFormat = array_key_exists('day_1', $training->schedule);
                        @endphp
                        
                        @if($isOldFormat)
                            {{-- Old format support --}}
                            @foreach($training->schedule as $dayKey => $dayData)
                                @php
                                    $dayNumber = (int) filter_var($dayKey, FILTER_SANITIZE_NUMBER_INT);
                                @endphp
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 bg-gray-50 dark:bg-gray-700">
                                    <div class="flex items-center justify-between mb-4">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Hari {{ $dayNumber }}
                                            @if(isset($dayData['date']) && $dayData['date'])
                                                <span class="text-sm font-normal text-gray-600 dark:text-gray-400 ml-2">
                                                    ({{ \Carbon\Carbon::parse($dayData['date'])->format('d M Y') }})
                                                </span>
                                            @endif
                                        </h4>
                                    </div>
                                    
                                    @if(isset($dayData['sessions']) && is_array($dayData['sessions']) && count($dayData['sessions']) > 0)
                                        <div class="space-y-3">
                                            <h5 class="font-medium text-gray-900 dark:text-white">Sesi Pelatihan:</h5>
                                            @foreach($dayData['sessions'] as $session)
                                                <div class="flex items-start space-x-4 p-3 bg-white dark:bg-gray-600 rounded-lg border border-gray-200 dark:border-gray-500">
                                                    <div class="flex-shrink-0">
                                                        @if(isset($session['time']) && $session['time'])
                                                            <div class="flex items-center justify-center px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-md text-sm font-medium">
                                                                {{ $session['time'] }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        @if(isset($session['topic']) && $session['topic'])
                                                            <h6 class="text-sm font-semibold text-gray-900 dark:text-white">
                                                                {{ $session['topic'] }}
                                                            </h6>
                                                        @endif
                                                        @if(isset($session['description']) && $session['description'])
                                                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                                                {{ $session['description'] }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            {{-- New format support --}}
                            @foreach($training->schedule as $dayIndex => $dayData)
                                <div class="border border-gray-200 dark:border-gray-600 rounded-lg p-4 bg-gray-50 dark:bg-gray-700">
                                    <div class="flex items-center justify-between mb-4">
                                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Hari {{ (int)$dayIndex + 1 }}
                                            @if(isset($dayData['date']) && $dayData['date'])
                                                <span class="text-sm font-normal text-gray-600 dark:text-gray-400 ml-2">
                                                    ({{ \Carbon\Carbon::parse($dayData['date'])->format('d M Y') }})
                                                </span>
                                            @endif
                                        </h4>
                                        @if(isset($dayData['theme']) && $dayData['theme'])
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200">
                                                {{ $dayData['theme'] }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    @if(isset($dayData['activities']) && is_array($dayData['activities']) && count($dayData['activities']) > 0)
                                        <div class="space-y-3">
                                            <h5 class="font-medium text-gray-900 dark:text-white">Aktivitas:</h5>
                                            @foreach($dayData['activities'] as $activity)
                                                <div class="flex items-start space-x-4 p-3 bg-white dark:bg-gray-600 rounded-lg border border-gray-200 dark:border-gray-500">
                                                    <div class="flex-shrink-0">
                                                        @if(isset($activity['time']) && $activity['time'])
                                                            <div class="flex items-center justify-center w-16 h-8 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-300 rounded-md text-sm font-medium">
                                                                {{ $activity['time'] }}
                                                            </div>
                                                        @else
                                                            <div class="flex items-center justify-center w-16 h-8 bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 rounded-md text-sm">
                                                                <i class="fas fa-clock"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        @if(isset($activity['title']) && $activity['title'])
                                                            <h6 class="text-sm font-semibold text-gray-900 dark:text-white">
                                                                {{ $activity['title'] }}
                                                            </h6>
                                                        @endif
                                                        @if(isset($activity['description']) && $activity['description'])
                                                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                                                {{ $activity['description'] }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="text-center py-4">
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                Belum ada aktivitas yang ditambahkan untuk hari ini
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            @endif

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

            <!-- Certificate Template -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-certificate mr-2 text-emerald-600 dark:text-emerald-400"></i>
                        Template Sertifikat
                    </h3>
                </div>
                <div class="p-6">
                    @if($training->certificate_template)
                        <div class="bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700 rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-file-pdf text-2xl text-emerald-600 dark:text-emerald-400"></i>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ basename($training->certificate_template) }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            Template PDF Sertifikat
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ asset('storage/' . $training->certificate_template) }}" 
                                       target="_blank"
                                       class="inline-flex items-center px-3 py-1.5 bg-emerald-100 hover:bg-emerald-200 dark:bg-emerald-900 dark:hover:bg-emerald-800 text-emerald-700 dark:text-emerald-300 text-sm font-medium rounded-lg transition-all duration-200">
                                        <i class="fas fa-external-link-alt mr-1"></i>
                                        Lihat
                                    </a>
                                    <a href="{{ asset('storage/' . $training->certificate_template) }}" 
                                       download
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900 dark:hover:bg-blue-800 text-blue-700 dark:text-blue-300 text-sm font-medium rounded-lg transition-all duration-200">
                                        <i class="fas fa-download mr-1"></i>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-xl p-4">
                            <div class="flex items-center">
                                <i class="fas fa-info-circle text-yellow-600 dark:text-yellow-400 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                                        Template sertifikat belum diupload
                                    </p>
                                    <p class="text-xs text-yellow-600 dark:text-yellow-400 mt-1">
                                        Peserta tidak akan mendapat sertifikat untuk pelatihan ini
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Participants Info -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Peserta</h3>
                </div>
                <div class="p-6 space-y-4">
                    @php
                        $totalParticipants = $training->participants()->count();
                        $approvedParticipants = $training->participants()->where('status', 'approved')->count();
                        $participantPercentage = $training->max_participants > 0 ? ($totalParticipants / $training->max_participants) * 100 : 0;
                    @endphp
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                            {{ $totalParticipants }}
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">dari {{ $training->max_participants }} peserta</div>
                        @if($approvedParticipants < $totalParticipants)
                            <div class="text-xs text-orange-600 dark:text-orange-400 mt-1">
                                ({{ $approvedParticipants }} disetujui)
                            </div>
                        @endif
                    </div>
                    
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full transition-all duration-300" 
                             style="width: {{ $participantPercentage }}%"></div>
                    </div>
                    
                    <div class="text-center">
                        @if($totalParticipants >= $training->max_participants)
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                Penuh
                            </span>
                        @else
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                {{ $training->max_participants - $totalParticipants }} slot tersisa
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
                            Rp {{ number_format($training->price * $training->participants()->where('status', 'approved')->count(), 0, ',', '.') }}
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

        <!-- Participant Registration Management -->
        <div class="col-span-1 lg:col-span-3 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendaftar Peserta</h3>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                Total: <span class="font-semibold text-gray-900 dark:text-white">{{ $participantRegistrations->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    @if($participantRegistrations->count() > 0)
                        <!-- Status Summary -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-yellow-100 dark:bg-yellow-800 rounded-lg">
                                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Menunggu</p>
                                        <p class="text-lg font-bold text-yellow-900 dark:text-yellow-100">{{ $participantsByStatus->get('registered', collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-green-100 dark:bg-green-800 rounded-lg">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800 dark:text-green-200">Disetujui</p>
                                        <p class="text-lg font-bold text-green-900 dark:text-green-100">{{ $participantsByStatus->get('approved', collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-red-100 dark:bg-red-800 rounded-lg">
                                        <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800 dark:text-red-200">Ditolak</p>
                                        <p class="text-lg font-bold text-red-900 dark:text-red-100">{{ $participantsByStatus->get('rejected', collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 dark:bg-gray-900/20 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-gray-100 dark:bg-gray-800 rounded-lg">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728L5.636 5.636m12.728 12.728L18.364 5.636M5.636 18.364l12.728-12.728"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-800 dark:text-gray-200">Dibatalkan</p>
                                        <p class="text-lg font-bold text-gray-900 dark:text-gray-100">{{ $participantsByStatus->get('cancelled', collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Participants List -->
                        <div class="space-y-4">
                            @foreach($participantRegistrations as $registration)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 hover:shadow-md transition-shadow duration-200">
                                    <div class="flex items-start justify-between">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-lg">
                                                    {{ strtoupper(substr($registration->user->name, 0, 1)) }}
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div class="flex items-center space-x-3 mb-2">
                                                    <h4 class="font-semibold text-gray-900 dark:text-white">{{ $registration->user->name }}</h4>
                                                    @if($registration->status === 'registered')
                                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100">
                                                            Menunggu Persetujuan
                                                        </span>
                                                    @elseif($registration->status === 'approved')
                                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                                            Disetujui
                                                        </span>
                                                    @elseif($registration->status === 'rejected')
                                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100">
                                                            Ditolak
                                                        </span>
                                                    @elseif($registration->status === 'cancelled')
                                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-100">
                                                            Dibatalkan
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                                    <p><span class="font-medium">Email:</span> {{ $registration->user->email }}</p>
                                                    <p><span class="font-medium">Motivasi:</span> {{ Str::limit($registration->motivation, 100) }}</p>
                                                    <p><span class="font-medium">Harapan:</span> {{ Str::limit($registration->expectations, 100) }}</p>
                                                    <p><span class="font-medium">Tingkat Pengalaman:</span> 
                                                        @if($registration->experience_level === 'beginner')
                                                            Pemula
                                                        @elseif($registration->experience_level === 'intermediate')
                                                            Menengah
                                                        @elseif($registration->experience_level === 'advanced')
                                                            Lanjutan
                                                        @else
                                                            {{ $registration->experience_level }}
                                                        @endif
                                                    </p>
                                                    <p><span class="font-medium">Tanggal Daftar:</span> {{ $registration->created_at->format('d M Y H:i') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="flex flex-col space-y-2">
                                            @if($registration->status === 'registered')
                                                <div class="flex space-x-2">
                                                    <form action="{{ route('admin.trainings.participants.approve', [$training, $registration->user]) }}" method="POST" class="inline" id="approve-participant-form-{{ $registration->user->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" 
                                                                class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded-md transition-colors duration-200"
                                                                onclick="confirmApproveParticipant({{ $registration->user->id }}, '{{ $registration->user->name }}')">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                            Setujui
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.trainings.participants.reject', [$training, $registration->user]) }}" method="POST" class="inline" id="reject-participant-form-{{ $registration->user->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" 
                                                                class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-md transition-colors duration-200"
                                                                onclick="confirmRejectParticipant({{ $registration->user->id }}, '{{ $registration->user->name }}')">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                            </svg>
                                                            Tolak
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                @if($registration->approved_at)
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        Disetujui: {{ $registration->approved_at->format('d M Y H:i') }}
                                                    </p>
                                                @elseif($registration->rejected_at)
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        Ditolak: {{ $registration->rejected_at->format('d M Y H:i') }}
                                                    </p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM9 9a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Belum ada peserta terdaftar</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Belum ada peserta yang mendaftar untuk pelatihan ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Volunteer Registration Management -->
        <div class="col-span-1 lg:col-span-3">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendaftar Relawan</h3>
                        <div class="flex items-center space-x-4">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                Total: <span class="font-semibold text-gray-900 dark:text-white">{{ $volunteerRegistrations->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    @if($volunteerRegistrations->count() > 0)
                        <!-- Status Summary -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-yellow-100 dark:bg-yellow-800 rounded-lg">
                                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-yellow-800 dark:text-yellow-200">Menunggu Persetujuan</p>
                                        <p class="text-lg font-bold text-yellow-900 dark:text-yellow-100">{{ ($volunteersByStatus['registered'] ?? collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-green-100 dark:bg-green-800 rounded-lg">
                                        <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800 dark:text-green-200">Dikonfirmasi</p>
                                        <p class="text-lg font-bold text-green-900 dark:text-green-100">{{ ($volunteersByStatus['confirmed'] ?? collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="p-2 bg-red-100 dark:bg-red-800 rounded-lg">
                                        <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800 dark:text-red-200">Ditolak</p>
                                        <p class="text-lg font-bold text-red-900 dark:text-red-100">{{ ($volunteersByStatus['cancelled'] ?? collect())->count() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Volunteer List -->
                        <div class="space-y-4">
                            @foreach($volunteerRegistrations as $registration)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                                    <span class="text-white font-semibold text-sm">
                                                        {{ strtoupper(substr($registration->user->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $registration->user->name }}
                                                </h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $registration->user->email }}
                                                </p>
                                                <p class="text-xs text-gray-400 dark:text-gray-500">
                                                    Mendaftar: {{ $registration->created_at->format('d M Y H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center space-x-3">
                                            <!-- Status Badge -->
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($registration->status === 'registered')
                                                    bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                                @elseif($registration->status === 'confirmed')
                                                    bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @elseif($registration->status === 'cancelled')
                                                    bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif
                                            ">
                                                @if($registration->status === 'registered')
                                                    Menunggu
                                                @elseif($registration->status === 'confirmed')
                                                    Dikonfirmasi
                                                @elseif($registration->status === 'cancelled')
                                                    Ditolak
                                                @endif
                                            </span>
                                            
                                            <!-- Action Buttons -->
                                            @if($registration->status === 'registered')
                                                <div class="flex space-x-2">
                                                    <form method="POST" action="{{ route('admin.trainings.volunteers.approve', [$training, $registration->user]) }}" class="inline" id="approve-volunteer-form-{{ $registration->user->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" 
                                                                class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-xs font-medium rounded-md transition-colors duration-200"
                                                                onclick="confirmApproveVolunteer({{ $registration->user->id }}, '{{ $registration->user->name }}')">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                            </svg>
                                                            Setujui
                                                        </button>
                                                    </form>
                                                    
                                                    <form method="POST" action="{{ route('admin.trainings.volunteers.reject', [$training, $registration->user]) }}" class="inline" id="reject-volunteer-form-{{ $registration->user->id }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" 
                                                                class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs font-medium rounded-md transition-colors duration-200"
                                                                onclick="confirmRejectVolunteer({{ $registration->user->id }}, '{{ $registration->user->name }}')">
                                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                            </svg>
                                                            Tolak
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                @if($registration->confirmed_at)
                                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $registration->status === 'confirmed' ? 'Dikonfirmasi' : 'Ditolak' }}: {{ $registration->confirmed_at->format('d M Y H:i') }}
                                                    </p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM9 9a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Belum ada relawan terdaftar</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Belum ada relawan yang mendaftar untuk pelatihan ini.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmApproveParticipant(userId, userName) {
            Swal.fire({
                title: 'Setujui Peserta?',
                text: `Apakah Anda yakin ingin menyetujui pendaftaran peserta "${userName}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`approve-participant-form-${userId}`).submit();
                }
            });
        }

        function confirmRejectParticipant(userId, userName) {
            Swal.fire({
                title: 'Tolak Peserta?',
                text: `Apakah Anda yakin ingin menolak pendaftaran peserta "${userName}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`reject-participant-form-${userId}`).submit();
                }
            });
        }

        function confirmApproveVolunteer(userId, userName) {
            Swal.fire({
                title: 'Setujui Relawan?',
                text: `Apakah Anda yakin ingin menyetujui pendaftaran relawan "${userName}"?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Setujui!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`approve-volunteer-form-${userId}`).submit();
                }
            });
        }

        function confirmRejectVolunteer(userId, userName) {
            Swal.fire({
                title: 'Tolak Relawan?',
                text: `Apakah Anda yakin ingin menolak pendaftaran relawan "${userName}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Tolak!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then ((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`reject-volunteer-form-${userId}`).submit();
                }
            });
        }

        function confirmDeleteTrainingShow(trainingTitle) {
            Swal.fire({
                title: 'Hapus Pelatihan?',
                text: `Apakah Anda yakin ingin menghapus pelatihan "${trainingTitle}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-training-show-form').submit();
                }
            });
        }
    </script>
</x-layouts.admin>
