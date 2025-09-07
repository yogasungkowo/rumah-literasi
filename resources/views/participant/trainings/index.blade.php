<x-layouts.integrated-dashboard title="Daftar Pelatihan Tersedia">
    <!-- Header Section with modern styling -->
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <span class="px-2 py-1 font-medium text-gray-500 dark:text-gray-500">Daftar Pelatihan</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title with gradient -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 rounded-xl p-6 text-white shadow-lg">
            <h1 class="text-3xl font-bold mb-2">Daftar Pelatihan Tersedia</h1>
            <p class="text-indigo-100 dark:text-indigo-200">Temukan dan daftar pelatihan yang sesuai dengan kebutuhan Anda</p>
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

    <!-- Main Content Card -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                <i class="fas fa-graduation-cap text-indigo-500 mr-3"></i>
                Pelatihan yang Tersedia
            </h2>
        </div>
        <div class="p-6">
            @if($trainings->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($trainings as $training)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300 group flex flex-col h-full">
                            @if($training->image)
                                <div class="relative h-48 overflow-hidden flex-shrink-0">
                                    <img src="{{ asset('storage/' . $training->image) }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" 
                                         alt="{{ $training->title }}">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-graduation-cap text-4xl text-gray-400 dark:text-gray-500"></i>
                                </div>
                            @endif
                            
                            <div class="p-6 flex flex-col flex-grow">
                                <div class="flex-grow">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                        {{ $training->title }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                                        {{ Str::limit(strip_tags($training->description), 100) }}
                                    </p>
                                    
                                    <!-- Training Details with clean icons -->
                                    <div class="space-y-3 mb-4">
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <i class="fas fa-user-tie text-indigo-500 mr-3 w-4"></i>
                                            <span class="text-sm font-medium">{{ $training->instructor_name }}</span>
                                        </div>
                                        
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <i class="fas fa-users text-emerald-500 mr-3 w-4"></i>
                                            <span class="text-sm font-medium">{{ $training->participants->count() }}/{{ $training->max_participants ?? '∞' }} peserta</span>
                                        </div>
                                        
                                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                                            <i class="fas fa-calendar text-blue-500 mr-3 w-4"></i>
                                            <span class="text-sm font-medium">
                                                @if($training->schedules->count() > 0)
                                                    {{ $training->schedules->first()->date->format('d M Y') }}
                                                    @if($training->schedules->count() > 1)
                                                        ({{ $training->schedules->count() }} pertemuan)
                                                    @endif
                                                @else
                                                    Jadwal belum ditentukan
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Status Badge -->
                                    <div class="mb-6">
                                        @if($training->status == 'published')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                                <i class="fas fa-check mr-1"></i> Terbuka untuk Pendaftaran
                                            </span>
                                        @elseif($training->status == 'ongoing')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                                <i class="fas fa-clock mr-1"></i> Sedang Berlangsung
                                            </span>
                                        @elseif($training->status == 'completed')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                <i class="fas fa-flag-checkered mr-1"></i> Selesai
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                <i class="fas fa-draft2digital mr-1"></i> Draft
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons - Always at bottom -->
                                <div class="mt-auto space-y-3">
                                    <!-- Always show "Lihat Detail" button first -->
                                    <a href="{{ route('participant.trainings.show', $training) }}" 
                                       class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-3 px-4 rounded-xl transition-all duration-300 inline-block text-center font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                        <i class="fas fa-eye mr-2"></i> Lihat Detail
                                    </a>
                                    
                                    @php
                                        $userRegistration = $training->participants->where('user_id', auth()->id())->first();
                                    @endphp
                                    
                                    @if($userRegistration)
                                        @if($userRegistration->status == 'registered')
                                            <div class="space-y-2">
                                                <button class="w-full bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400 py-3 px-4 rounded-xl font-semibold border border-amber-200 dark:border-amber-700" disabled>
                                                    <i class="fas fa-clock mr-2"></i> Menunggu Persetujuan
                                                </button>
                                                <a href="{{ route('participant.registrations.show', $userRegistration) }}" 
                                                   class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white py-2 px-4 rounded-xl transition-all duration-300 inline-block text-center font-medium text-sm">
                                                    <i class="fas fa-file-alt mr-2"></i> Lihat Pendaftaran
                                                </a>
                                            </div>
                                        @elseif($userRegistration->status == 'approved')
                                            <div class="space-y-2">
                                                <button class="w-full bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 py-3 px-4 rounded-xl font-semibold border border-emerald-200 dark:border-emerald-700" disabled>
                                                    <i class="fas fa-check mr-2"></i> Terdaftar
                                                </button>
                                                <a href="{{ route('participant.registrations.show', $userRegistration) }}" 
                                                   class="w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white py-2 px-4 rounded-xl transition-all duration-300 inline-block text-center font-medium text-sm">
                                                    <i class="fas fa-file-alt mr-2"></i> Lihat Pendaftaran
                                                </a>
                                            </div>
                                        @elseif($userRegistration->status == 'rejected')
                                            <div class="space-y-2">
                                                <button class="w-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 py-3 px-4 rounded-xl font-semibold border border-red-200 dark:border-red-700" disabled>
                                                    <i class="fas fa-times mr-2"></i> Ditolak
                                                </button>
                                                <a href="{{ route('participant.registrations.show', $userRegistration) }}" 
                                                   class="w-full bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white py-2 px-4 rounded-xl transition-all duration-300 inline-block text-center font-medium text-sm">
                                                    <i class="fas fa-file-alt mr-2"></i> Lihat Pendaftaran
                                                </a>
                                            </div>
                                        @elseif($userRegistration->status == 'cancelled')
                                            <div class="space-y-2">
                                                <!-- Primary Action: Form Pendaftaran Ulang -->
                                                <a href="{{ route('participant.trainings.register.form', $training) }}" 
                                                   class="w-full bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white py-3 px-4 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-block text-center">
                                                    <i class="fas fa-redo mr-2"></i> Daftar Ulang
                                                </a>
                                                <!-- Secondary Action: Lihat Detail -->
                                                <a href="{{ route('participant.registrations.show', $userRegistration) }}" 
                                                   class="w-full bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white py-3 px-4 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-block text-center">
                                                    <i class="fas fa-file-alt mr-2"></i> Lihat Detail
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        @if($training->status == 'published')
                                            @if($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                                <button class="w-full bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400 py-3 px-4 rounded-xl font-semibold border border-gray-200 dark:border-gray-700" disabled>
                                                    <i class="fas fa-users mr-2"></i> Kuota Penuh
                                                </button>
                                            @else
                                                <!-- Primary Action: Form Pendaftaran -->
                                                <a href="{{ route('participant.trainings.register.form', $training) }}" 
                                                   class="w-full bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white py-3 px-4 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-block text-center">
                                                    <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                                                </a>
                                                <!-- Secondary Action: Detail Form -->
                                                <a href="{{ route('participant.trainings.show', $training) }}#register" 
                                                   class="w-full bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white py-3 px-4 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-block text-center">
                                                    <i class="fas fa-info-circle mr-2"></i> Detail Form
                                                </a>
                                            @endif
                                        @else
                                            <button class="w-full bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400 py-3 px-4 rounded-xl font-semibold border border-gray-200 dark:border-gray-700" disabled>
                                                <i class="fas fa-lock mr-2"></i> Tidak Tersedia ({{ $training->status }})
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($trainings->hasPages())
                    <div class="flex justify-center mt-8">
                        {{ $trainings->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <div class="max-w-sm mx-auto">
                        <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-graduation-cap text-4xl text-gray-400 dark:text-gray-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Belum Ada Pelatihan Tersedia</h3>
                        <p class="text-gray-500 dark:text-gray-400">Saat ini belum ada pelatihan yang dibuka untuk pendaftaran. Silakan cek kembali nanti.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-layouts.integrated-dashboard>
