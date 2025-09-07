<x-layouts.integrated-dashboard title="Detail Pelatihan">
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
                        <a href="{{ route('participant.trainings.index') }}" 
                           class="px-2 py-1 rounded-md font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-indigo-400 dark:hover:bg-gray-800 transition-colors duration-200">
                            Daftar Pelatihan
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <span class="px-2 py-1 font-medium text-gray-500 dark:text-gray-500">Detail Pelatihan</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title with gradient -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 rounded-xl p-6 text-white shadow-lg">
            <h1 class="text-3xl font-bold mb-2">{{ $training->title }}</h1>
            <p class="text-indigo-100 dark:text-indigo-200">Detail informasi dan pendaftaran pelatihan</p>
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

    @if(session('info'))
        <div class="mb-6 bg-blue-50 border-l-4 border-blue-400 text-blue-800 px-6 py-4 rounded-r-lg dark:bg-blue-900/20 dark:border-blue-600 dark:text-blue-300 shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium">{{ session('info') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content with enhanced modern styling -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Training Hero Section with modern design -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden group">
                @if($training->image)
                    <div class="relative aspect-video">
                        <img src="{{ $training->image_url }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                             alt="{{ $training->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white">
                            <h2 class="text-3xl font-bold mb-3 leading-tight">{{ $training->title }}</h2>
                            @if($training->instructor_name)
                                <div class="flex items-center text-white/90">
                                    <i class="fas fa-user-tie text-lg mr-2"></i>
                                    <span class="font-medium">{{ $training->instructor_name }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="p-8">
                    @if(!$training->image)
                        <div class="mb-8">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">{{ $training->title }}</h2>
                            @if($training->instructor_name)
                                <div class="flex items-center text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-user-tie text-indigo-500 mr-2"></i>
                                    <span class="font-medium">{{ $training->instructor_name }}</span>
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    <!-- Description Section -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-info-circle text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Deskripsi Pelatihan</h3>
                        </div>
                        <div class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-700 dark:to-blue-900/20 rounded-xl p-6 border border-gray-200 dark:border-gray-600">
                            <div class="prose prose-lg dark:prose-invert max-w-none prose-headings:text-gray-900 dark:prose-headings:text-white prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-strong:text-gray-900 dark:prose-strong:text-white prose-a:text-indigo-600 dark:prose-a:text-indigo-400">
                                {!! $training->description !!}
                            </div>
                        </div>
                    </div>

                    @if($training->objectives)
                        <div class="mb-8">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-bullseye text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Tujuan Pelatihan</h3>
                            </div>
                            <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 rounded-xl p-6 border border-emerald-200 dark:border-emerald-700">
                                <div class="prose prose-lg dark:prose-invert max-w-none prose-headings:text-gray-900 dark:prose-headings:text-white prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-li:text-gray-700 dark:prose-li:text-gray-300">
                                    {!! $training->objectives !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($training->requirements)
                        <div class="mb-8">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-orange-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-check-square text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Persyaratan</h3>
                            </div>
                            <div class="bg-gradient-to-r from-amber-50 to-orange-50 dark:from-amber-900/20 dark:to-orange-900/20 rounded-xl p-6 border border-amber-200 dark:border-amber-700">
                                <div class="prose prose-lg dark:prose-invert max-w-none prose-headings:text-gray-900 dark:prose-headings:text-white prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-li:text-gray-700 dark:prose-li:text-gray-300">
                                    {!! $training->requirements !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($training->materials)
                        <div class="mb-8">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-book-open text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Materi Pelatihan</h3>
                            </div>
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-xl p-6 border border-purple-200 dark:border-purple-700">
                                <div class="prose prose-lg dark:prose-invert max-w-none prose-headings:text-gray-900 dark:prose-headings:text-white prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-li:text-gray-700 dark:prose-li:text-gray-300">
                                    {!! $training->materials !!}
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Enhanced Schedule Section -->
                    @if($training->schedules->count() > 0)
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mr-3">
                                    <i class="fas fa-calendar-alt text-white"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Jadwal Pelatihan</h3>
                            </div>
                            <div class="space-y-4">
                                @foreach($training->schedules->sortBy('date') as $schedule)
                                    <div class="group bg-gradient-to-r from-white to-indigo-50 dark:from-gray-800 dark:to-indigo-900/20 rounded-xl p-6 border border-indigo-100 dark:border-indigo-800 hover:shadow-lg hover:scale-[1.02] transition-all duration-300">
                                        <div class="flex items-start space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="w-14 h-14 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                                                    <span class="text-white font-bold text-lg">{{ $loop->iteration }}</span>
                                                </div>
                                            </div>
                                            <div class="flex-grow">
                                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                                    {{ $schedule->topic }}
                                                </h4>
                                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                                    <div class="flex items-center text-gray-600 dark:text-gray-300">
                                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-100 to-indigo-100 dark:from-blue-800 dark:to-indigo-800 rounded-xl flex items-center justify-center mr-3 shadow-sm">
                                                            <i class="fas fa-calendar text-blue-600 dark:text-blue-400"></i>
                                                        </div>
                                                        <span class="font-medium">{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</span>
                                                    </div>
                                                    <div class="flex items-center text-gray-600 dark:text-gray-300">
                                                        <div class="w-10 h-10 bg-gradient-to-r from-emerald-100 to-teal-100 dark:from-emerald-800 dark:to-teal-800 rounded-xl flex items-center justify-center mr-3 shadow-sm">
                                                            <i class="fas fa-clock text-emerald-600 dark:text-emerald-400"></i>
                                                        </div>
                                                        <span class="font-medium">{{ $schedule->start_time }} - {{ $schedule->end_time }}</span>
                                                    </div>
                                                    <div class="flex items-center text-gray-600 dark:text-gray-300">
                                                        <div class="w-10 h-10 bg-gradient-to-r from-orange-100 to-red-100 dark:from-orange-800 dark:to-red-800 rounded-xl flex items-center justify-center mr-3 shadow-sm">
                                                            <i class="fas fa-map-marker-alt text-orange-600 dark:text-orange-400"></i>
                                                        </div>
                                                        <span class="font-medium">{{ $schedule->location }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Enhanced Sidebar with modern styling -->
        <div class="lg:col-span-1 space-y-8">
            <!-- Registration Status Card with enhanced design -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 px-6 py-4">
                    <h3 class="text-lg font-bold text-white flex items-center">
                        <i class="fas fa-user-check mr-2"></i>
                        Status Pendaftaran
                    </h3>
                </div>
                <div class="p-6">
                    @php
                        $userRegistration = $training->participants->where('user_id', Auth::id())->first();
                    @endphp
                    
                    @if($userRegistration)
                        @if($userRegistration->status == 'registered')
                            <div class="bg-gradient-to-r from-amber-50 to-yellow-50 border-l-4 border-amber-400 text-amber-800 px-5 py-4 rounded-lg mb-6 dark:from-amber-900/20 dark:to-yellow-900/20 dark:border-amber-600 dark:text-amber-300">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-amber-100 dark:bg-amber-800 rounded-full flex items-center justify-center">
                                            <i class="fas fa-clock text-amber-600 dark:text-amber-400"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-lg">Pendaftaran Terdaftar</div>
                                        <div class="text-sm mt-1 opacity-90">Pendaftaran Anda sedang menunggu persetujuan dari admin.</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('participant.registrations.show', $userRegistration) }}" 
                               class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail Pendaftaran
                            </a>
                        @elseif($userRegistration->status == 'approved')
                            <div class="bg-gradient-to-r from-emerald-50 to-green-50 border-l-4 border-emerald-400 text-emerald-800 px-5 py-4 rounded-lg mb-6 dark:from-emerald-900/20 dark:to-green-900/20 dark:border-emerald-600 dark:text-emerald-300">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-800 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check-circle text-emerald-600 dark:text-emerald-400"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-lg">Pendaftaran Diterima</div>
                                        <div class="text-sm mt-1 opacity-90">Selamat! Anda terdaftar sebagai peserta pelatihan ini.</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('participant.registrations.show', $userRegistration) }}" 
                               class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white py-4 px-6 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail Pendaftaran
                            </a>
                        @elseif($userRegistration->status == 'rejected')
                            <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-400 text-red-800 px-5 py-4 rounded-lg mb-6 dark:from-red-900/20 dark:to-pink-900/20 dark:border-red-600 dark:text-red-300">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-red-100 dark:bg-red-800 rounded-full flex items-center justify-center">
                                            <i class="fas fa-times-circle text-red-600 dark:text-red-400"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-lg">Pendaftaran Ditolak</div>
                                        <div class="text-sm mt-1 opacity-90">Mohon maaf, pendaftaran Anda tidak dapat disetujui.</div>
                                    </div>
                                </div>
                            </div>
                        @elseif($userRegistration->status == 'cancelled')
                            <div class="bg-gradient-to-r from-gray-50 to-slate-50 border-l-4 border-gray-400 text-gray-800 px-5 py-4 rounded-lg mb-6 dark:from-gray-800 dark:to-slate-800 dark:border-gray-600 dark:text-gray-300">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                            <i class="fas fa-ban text-gray-600 dark:text-gray-400"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-lg">Pendaftaran Dibatalkan</div>
                                        <div class="text-sm mt-1 opacity-90">Anda telah membatalkan pendaftaran untuk pelatihan ini. Anda bisa mendaftar ulang.</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Daftar Ulang -->
                            <a href="{{ route('participant.trainings.register.form', $training) }}" 
                               class="w-full bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white py-4 px-6 rounded-xl transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 hover:scale-[1.02] inline-block text-center">
                                <i class="fas fa-redo mr-3"></i>Daftar Ulang
                            </a>
                        @endif
                    @else
                        @if($training->status == 'published')
                            @if($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                <div class="bg-gradient-to-r from-orange-50 to-red-50 border-l-4 border-orange-400 text-orange-800 px-5 py-4 rounded-lg mb-6 dark:from-orange-900/20 dark:to-red-900/20 dark:border-orange-600 dark:text-orange-300">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 bg-orange-100 dark:bg-orange-800 rounded-full flex items-center justify-center">
                                                <i class="fas fa-users text-orange-600 dark:text-orange-400"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-bold text-lg">Kuota Penuh</div>
                                            <div class="text-sm mt-1 opacity-90">Maaf, kuota peserta untuk pelatihan ini sudah terpenuhi.</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-400 text-blue-800 px-5 py-4 rounded-lg mb-6 dark:from-blue-900/20 dark:to-indigo-900/20 dark:border-blue-600 dark:text-blue-300">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                                                <i class="fas fa-info-circle text-blue-600 dark:text-blue-400"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-bold text-lg">Pelatihan Tersedia</div>
                                            <div class="text-sm mt-1 opacity-90">Bergabunglah dengan pelatihan yang menarik ini!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('participant.trainings.register.form', $training) }}" 
                                   class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-4 px-6 rounded-xl transition-all duration-300 font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 hover:scale-[1.02] inline-block text-center">
                                    <i class="fas fa-user-plus mr-3"></i>Daftar Sekarang
                                </a>
                            @endif
                        @else
                            <div class="bg-gradient-to-r from-gray-50 to-slate-50 border-l-4 border-gray-400 text-gray-800 px-5 py-4 rounded-lg mb-6 dark:from-gray-800 dark:to-slate-800 dark:border-gray-600 dark:text-gray-300">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                            <i class="fas fa-lock text-gray-600 dark:text-gray-400"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="font-bold text-lg">Tidak Tersedia</div>
                                        <div class="text-sm mt-1 opacity-90">Pelatihan belum dibuka untuk pendaftaran umum.</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Enhanced Training Info Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-700 dark:to-blue-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                        Informasi Pelatihan
                    </h3>
                </div>
                <div class="p-6 space-y-5">
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
                                    {{ $training->instructor_name }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($training->instructor_contact)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-phone text-green-600 dark:text-green-400"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-medium text-gray-600 dark:text-gray-400 mb-1">Kontak</div>
                                    <div class="text-gray-900 dark:text-white font-semibold text-sm leading-relaxed">
                                        {{ $training->instructor_contact }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-purple-100 dark:bg-purple-800 rounded-xl flex items-center justify-center">
                                <i class="fas fa-flag text-purple-600 dark:text-purple-400"></i>
                            </div>
                            <span class="font-medium text-gray-600 dark:text-gray-400">Status</span>
                        </div>
                        <span>
                            @if($training->status == 'published')
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">Terbuka</span>
                            @elseif($training->status == 'ongoing')
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">Berlangsung</span>
                            @elseif($training->status == 'completed')
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">Selesai</span>
                            @else
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">Draft</span>
                            @endif
                        </span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-xl flex items-center justify-center">
                                <i class="fas fa-users text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <span class="font-medium text-gray-600 dark:text-gray-400">Peserta</span>
                        </div>
                        <span class="text-gray-900 dark:text-white font-semibold">
                            {{ $training->participants->where('status', '!=', 'cancelled')->count() }}
                            @if($training->max_participants)
                                <span class="text-gray-500 dark:text-gray-400">/ {{ $training->max_participants }}</span>
                            @endif
                        </span>
                    </div>

                    @if($training->start_date)
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-orange-100 dark:bg-orange-800 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-play text-orange-600 dark:text-orange-400"></i>
                                </div>
                                <span class="font-medium text-gray-600 dark:text-gray-400">Mulai</span>
                            </div>
                            <span class="text-gray-900 dark:text-white font-semibold">{{ $training->start_date->format('d M Y') }}</span>
                        </div>
                    @endif

                    @if($training->end_date)
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-red-100 dark:bg-red-800 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-stop text-red-600 dark:text-red-400"></i>
                                </div>
                                <span class="font-medium text-gray-600 dark:text-gray-400">Selesai</span>
                            </div>
                            <span class="text-gray-900 dark:text-white font-semibold">{{ $training->end_date->format('d M Y') }}</span>
                        </div>
                    @endif

                    @if($training->location)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-teal-100 dark:bg-teal-800 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-map-marker-alt text-teal-600 dark:text-teal-400"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-medium text-gray-600 dark:text-gray-400 mb-1">Lokasi</div>
                                    <div class="text-gray-900 dark:text-white font-semibold text-sm leading-relaxed">
                                        {{ $training->location }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($training->created_at)
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-gray-100 dark:bg-gray-600 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-calendar-plus text-gray-600 dark:text-gray-400"></i>
                                </div>
                                <span class="font-medium text-gray-600 dark:text-gray-400">Dibuat</span>
                            </div>
                            <span class="text-gray-900 dark:text-white font-semibold">{{ $training->created_at->format('d M Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.integrated-dashboard>
