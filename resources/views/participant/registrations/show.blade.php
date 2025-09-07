<x-layouts.integrated-dashboard title="Detail Pendaftaran">
    <!-- Header Section with improved styling -->
    <div class="mb-8">
        <!-- Breadcrumb with enhanced styling -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 text-sm">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.peserta') }}" 
                       class="inline-flex items-center px-2 py-1 rounded-md font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-indigo-400 dark:hover:bg-gray-800 transition-colors duration-200">
                        <i class="fas fa-home mr-2 text-xs"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <a href="{{ route('participant.registrations.index') }}" 
                           class="px-2 py-1 rounded-md font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-indigo-400 dark:hover:bg-gray-800 transition-colors duration-200">
                            Pendaftaran Saya
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <span class="px-2 py-1 font-medium text-gray-500 dark:text-gray-500">{{ $registration->training->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title with gradient -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 rounded-xl p-6 text-white shadow-lg">
            <h1 class="text-3xl font-bold mb-2">Detail Pendaftaran</h1>
            <p class="text-indigo-100 dark:text-indigo-200">{{ $registration->training->title }}</p>
        </div>
    </div>

    <!-- Enhanced Alert Messages -->
    @if(session('success'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-400 text-emerald-800 px-6 py-4 rounded-r-lg dark:bg-emerald-900/20 dark:border-emerald-600 dark:text-emerald-300 shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-emerald-500 text-lg"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-400 text-red-800 px-6 py-4 rounded-r-lg dark:bg-red-900/20 dark:border-red-600 dark:text-red-300 shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content with enhanced styling -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Registration Details Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-user-check text-indigo-500 mr-3"></i>
                        Informasi Pendaftaran
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-4">
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-graduation-cap text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-medium text-gray-600 dark:text-gray-400 mb-1">Pelatihan</div>
                                        <div class="text-gray-900 dark:text-white font-semibold text-sm leading-relaxed">
                                            {{ $registration->training->title }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-user-tie text-green-600 dark:text-green-400"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-medium text-gray-600 dark:text-gray-400 mb-1">Instruktur</div>
                                        <div class="text-gray-900 dark:text-white font-semibold text-sm leading-relaxed">
                                            {{ $registration->training->instructor_name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-800 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-calendar-plus text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <span class="font-medium text-gray-600 dark:text-gray-400">Tanggal Daftar</span>
                                </div>
                                <span class="text-gray-900 dark:text-white font-semibold">{{ $registration->created_at->format('d M Y H:i') }}</span>
                            </div>

                            <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-orange-100 dark:bg-orange-800 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-flag text-orange-600 dark:text-orange-400"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-medium text-gray-600 dark:text-gray-400 mb-2">Status</div>
                                        <div>
                                            @if($registration->status == 'registered')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                                    <i class="fas fa-clock mr-2"></i> Menunggu Persetujuan
                                                </span>
                                            @elseif($registration->status == 'approved')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                                    <i class="fas fa-check mr-2"></i> Diterima
                                                </span>
                                            @elseif($registration->status == 'rejected')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                                    <i class="fas fa-times mr-2"></i> Ditolak
                                                </span>
                                            @elseif($registration->status == 'cancelled')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                    <i class="fas fa-ban mr-2"></i> Dibatalkan
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-teal-100 dark:bg-teal-800 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-chart-line text-teal-600 dark:text-teal-400"></i>
                                    </div>
                                    <span class="font-medium text-gray-600 dark:text-gray-400">Tingkat Pengalaman</span>
                                </div>
                                <span class="text-gray-900 dark:text-white font-semibold">
                                    @if($registration->experience_level == 'beginner')
                                        Pemula
                                    @elseif($registration->experience_level == 'intermediate')
                                        Menengah
                                    @elseif($registration->experience_level == 'advanced')
                                        Lanjutan
                                    @endif
                                </span>
                            </div>

                            @if($registration->approved_at)
                                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-800 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400"></i>
                                        </div>
                                        <span class="font-medium text-gray-600 dark:text-gray-400">Disetujui</span>
                                    </div>
                                    <span class="text-gray-900 dark:text-white font-semibold">{{ $registration->approved_at->format('d M Y H:i') }}</span>
                                </div>
                            @endif

                            @if($registration->rejected_at)
                                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-red-100 dark:bg-red-800 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-times-circle text-red-600 dark:text-red-400"></i>
                                        </div>
                                        <span class="font-medium text-gray-600 dark:text-gray-400">Ditolak</span>
                                    </div>
                                    <span class="text-gray-900 dark:text-white font-semibold">{{ $registration->rejected_at->format('d M Y H:i') }}</span>
                                </div>
                            @endif

                            @if($registration->cancelled_at)
                                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-ban text-gray-600 dark:text-gray-400"></i>
                                        </div>
                                        <span class="font-medium text-gray-600 dark:text-gray-400">Dibatalkan</span>
                                    </div>
                                    <span class="text-gray-900 dark:text-white font-semibold">{{ $registration->cancelled_at->format('d M Y H:i') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Application Details Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-file-alt text-blue-500 mr-3"></i>
                        Detail Aplikasi
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-700 dark:to-blue-900/20 rounded-xl p-6 border border-gray-200 dark:border-gray-600">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Motivasi Mengikuti Pelatihan</h3>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $registration->motivation }}</p>
                    </div>
                    
                    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-xl p-6 border border-emerald-200 dark:border-emerald-700">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-bullseye text-white"></i>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Harapan dari Pelatihan</h3>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $registration->expectations }}</p>
                    </div>
                    
                    @if($registration->additional_info)
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl p-6 border border-purple-200 dark:border-purple-700">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-info-circle text-white"></i>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">Informasi Tambahan</h3>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $registration->additional_info }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Attendance Section with enhanced styling -->
            @if($registration->status == 'approved' && $registration->training->schedules->count() > 0)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/30 dark:to-emerald-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-calendar-check text-green-500 mr-3"></i>
                            Kehadiran
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <div class="space-y-4">
                                @foreach($registration->training->schedules->sortBy('date') as $schedule)
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 hover:shadow-md transition-shadow duration-300">
                                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 items-center">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-800 rounded-full flex items-center justify-center">
                                                    <span class="text-indigo-600 dark:text-indigo-400 font-bold">{{ $loop->iteration }}</span>
                                                </div>
                                                <span class="font-medium text-gray-900 dark:text-white">Pertemuan {{ $loop->iteration }}</span>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Tanggal</div>
                                                <div class="font-semibold text-gray-900 dark:text-white">{{ $schedule->date->format('d M Y') }}</div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Waktu</div>
                                                <div class="font-semibold text-gray-900 dark:text-white">{{ $schedule->start_time }} - {{ $schedule->end_time }}</div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-sm text-gray-600 dark:text-gray-400">Topik</div>
                                                <div class="font-semibold text-gray-900 dark:text-white">{{ $schedule->topic ?? '-' }}</div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Status</div>
                                                @php
                                                    $attendance = $registration->attendance[$loop->index] ?? null;
                                                @endphp
                                                @if($attendance)
                                                    @if($attendance['status'] == 'present')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                                            <i class="fas fa-check mr-1"></i> Hadir
                                                        </span>
                                                    @elseif($attendance['status'] == 'absent')
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                                            <i class="fas fa-times mr-1"></i> Tidak Hadir
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                                            <i class="fas fa-clock mr-1"></i> Terlambat
                                                        </span>
                                                    @endif
                                                @else
                                                    @if($schedule->date->isPast())
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                            <i class="fas fa-minus mr-1"></i> Belum dicatat
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                                            <i class="fas fa-calendar mr-1"></i> Belum berlangsung
                                                        </span>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        @if($registration->attendance)
                            @php
                                $totalSessions = $registration->training->schedules->count();
                                $attendedSessions = collect($registration->attendance)->where('status', 'present')->count();
                                $attendanceRate = $totalSessions > 0 ? ($attendedSessions / $totalSessions) * 100 : 0;
                            @endphp
                            <div class="mt-8 bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 rounded-xl p-6 border border-indigo-200 dark:border-indigo-700">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tingkat Kehadiran</h3>
                                    <span class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ number_format($attendanceRate, 1) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-4 dark:bg-gray-700">
                                    @if($attendanceRate >= 80)
                                        <div class="h-4 rounded-full transition-all duration-500 bg-gradient-to-r from-emerald-500 to-green-500" style="width: {{ $attendanceRate }}%"></div>
                                    @elseif($attendanceRate >= 60)
                                        <div class="h-4 rounded-full transition-all duration-500 bg-gradient-to-r from-amber-500 to-yellow-500" style="width: {{ $attendanceRate }}%"></div>
                                    @else
                                        <div class="h-4 rounded-full transition-all duration-500 bg-gradient-to-r from-red-500 to-pink-500" style="width: {{ $attendanceRate }}%"></div>
                                    @endif
                                </div>
                                <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 mt-2">
                                    <span>0%</span>
                                    <span>{{ $attendedSessions }}/{{ $totalSessions }} sesi hadir</span>
                                    <span>100%</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <!-- Enhanced Sidebar with modern styling -->
        <div class="lg:col-span-1 space-y-8">
            <!-- Training Info Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/30 dark:to-indigo-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-graduation-cap text-blue-500 mr-2"></i>
                        Informasi Pelatihan
                    </h3>
                </div>
                <div class="p-6">
                    @if($registration->training->image)
                        <div class="relative overflow-hidden rounded-xl mb-6 group">
                            <img src="{{ asset('storage/' . $registration->training->image) }}" 
                                 class="w-full h-48 object-cover transition-transform duration-700 group-hover:scale-105" 
                                 alt="{{ $registration->training->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                    @endif
                    
                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ $registration->training->title }}</h4>
                    <div class="prose prose-sm dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 mb-6">
                        {!! Str::limit($registration->training->description, 150) !!}
                    </div>
                    
                    <div class="space-y-4">
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-800 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-user-tie text-indigo-600 dark:text-indigo-400"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-medium text-gray-600 dark:text-gray-400 mb-1">Instruktur</div>
                                    <div class="text-gray-900 dark:text-white font-semibold text-sm leading-relaxed">
                                        {{ $registration->training->instructor_name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-800 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-flag text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-medium text-gray-600 dark:text-gray-400 mb-2">Status Pelatihan</div>
                                    <div>
                                        @if($registration->training->status == 'published')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                                Terbuka
                                            </span>
                                        @elseif($registration->training->status == 'ongoing')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                                Berlangsung
                                            </span>
                                        @elseif($registration->training->status == 'completed')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                Selesai
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                Draft
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('participant.trainings.show', $registration->training) }}" 
                           class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white py-3 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-eye mr-2"></i> Lihat Detail Pelatihan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Certificate Card with enhanced styling -->
            @if($registration->status == 'approved' && $registration->training->certificate_template)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/30 dark:to-amber-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-certificate text-yellow-500 mr-2"></i>
                            Sertifikat
                        </h3>
                    </div>
                    <div class="p-6">
                        @if($registration->certificate_issued_at)
                            <div class="bg-gradient-to-r from-emerald-50 to-green-50 border-l-4 border-emerald-400 text-emerald-800 px-5 py-4 rounded-lg mb-6 dark:from-emerald-900/20 dark:to-green-900/20 dark:border-emerald-600 dark:text-emerald-300">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-800 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-lg">Sertifikat Tersedia!</div>
                                        <div class="text-sm mt-1 opacity-90">Sertifikat telah diterbitkan pada {{ $registration->certificate_issued_at->format('d M Y') }}.</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" target="_blank"
                               class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <i class="fas fa-download mr-2"></i> Unduh Sertifikat
                            </a>
                        @else
                            @if($registration->training->status == 'completed')
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-400 text-blue-800 px-5 py-4 rounded-lg dark:from-blue-900/20 dark:to-indigo-900/20 dark:border-blue-600 dark:text-blue-300">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                                                <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-bold">Sedang Diproses</div>
                                            <div class="text-sm mt-1 opacity-90">Sertifikat sedang diproses. Anda akan mendapat notifikasi setelah sertifikat siap diunduh.</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-gradient-to-r from-amber-50 to-yellow-50 border-l-4 border-amber-400 text-amber-800 px-5 py-4 rounded-lg dark:from-amber-900/20 dark:to-yellow-900/20 dark:border-amber-600 dark:text-amber-300">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 bg-amber-100 dark:bg-amber-800 rounded-full flex items-center justify-center">
                                                <i class="fas fa-clock text-amber-600 dark:text-amber-400"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-bold">Menunggu Penyelesaian</div>
                                            <div class="text-sm mt-1 opacity-90">Sertifikat akan tersedia setelah pelatihan selesai dan Anda memenuhi syarat kehadiran minimum.</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            @endif

            <!-- Actions Card with enhanced styling -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-slate-50 dark:from-gray-700 dark:to-slate-800 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-cogs text-gray-500 mr-2"></i>
                        Aksi
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    @if($registration->status == 'registered')
                        <button type="button" 
                                class="w-full bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white py-4 px-6 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                                onclick="document.getElementById('cancelModal').showModal()">
                            <i class="fas fa-times mr-2"></i> Batalkan Pendaftaran
                        </button>
                    @endif
                    
                    @if($registration->status == 'cancelled')
                        <!-- Form Pendaftaran Ulang -->
                        <a href="{{ route('participant.trainings.register.form', $registration->training) }}" 
                           class="w-full bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-redo mr-2"></i> Daftar Ulang Pelatihan Ini
                        </a>
                    @endif
                    
                    <!-- Daftar Pelatihan Baru Button -->
                    <a href="{{ route('participant.trainings.index') }}" 
                       class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-plus mr-2"></i> Daftar Pelatihan Lain
                    </a>
                    
                    <a href="{{ route('participant.trainings.index') }}" 
                       class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-graduation-cap mr-2"></i> Lihat Semua Pelatihan
                    </a>
                    
                    <a href="{{ route('participant.registrations.index') }}" 
                       class="w-full bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold border border-gray-300 dark:border-gray-600 hover:border-gray-400 dark:hover:border-gray-500">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Pendaftaran
                    </a>
                </div>
            </div>
        </div>
    </div>

<!-- Enhanced Cancel Registration Modal with proper centering -->
@if($registration->status == 'registered')
    <dialog id="cancelModal" class="modal backdrop:bg-black/50 backdrop:backdrop-blur-sm">
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-gray-800 rounded-2xl max-w-md w-full shadow-2xl border-0 overflow-hidden">
                <div class="bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/30 dark:to-pink-900/30 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                            Batalkan Pendaftaran
                        </h3>
                        <button type="button" 
                                onclick="document.getElementById('cancelModal').close()"
                                class="w-8 h-8 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-full flex items-center justify-center transition-colors">
                            <i class="fas fa-times text-gray-600 dark:text-gray-400"></i>
                        </button>
                    </div>
                </div>
                
                <form action="{{ route('participant.registrations.cancel', $registration) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-6">
                        <div class="mb-6">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-4">
                                Apakah Anda yakin ingin membatalkan pendaftaran untuk pelatihan 
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $registration->training->title }}</span>?
                            </p>
                            
                            <div class="bg-gradient-to-r from-amber-50 to-orange-50 border-l-4 border-amber-400 text-amber-800 px-5 py-4 rounded-lg dark:from-amber-900/20 dark:to-orange-900/20 dark:border-amber-600 dark:text-amber-300">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-triangle text-amber-600 dark:text-amber-400"></i>
                                    </div>
                                    <div class="ml-3">
                                        <div class="font-bold">Perhatian:</div>
                                        <div class="text-sm mt-1 opacity-90">Setelah dibatalkan, Anda perlu mendaftar ulang jika ingin mengikuti pelatihan ini.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 flex justify-end space-x-3">
                        <button type="button" 
                                onclick="document.getElementById('cancelModal').close()"
                                class="px-6 py-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-300 rounded-lg font-medium transition-colors">
                            Tidak
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white rounded-lg font-medium transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-times mr-2"></i> Ya, Batalkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </dialog>
@endif

</x-layouts.integrated-dashboard>
