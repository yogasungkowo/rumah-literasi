<x-layouts.integrated-dashboard title="Detail Pelatihan">
    <!-- Header Section -->
    <div class="mb-6">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.peserta') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white">
                        <i class="fas fa-home mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('participant.trainings.index') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white">
                            Daftar Pelatihan
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Detail Pelatihan</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $training->title }}</h1>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg dark:bg-green-900/20 dark:border-green-800 dark:text-green-400">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg dark:bg-red-900/20 dark:border-red-800 dark:text-red-400">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <!-- Training Hero -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                @if($training->image)
                    <div class="relative">
                        <img src="{{ $training->image_url }}" class="w-full h-64 object-cover rounded-t-lg" alt="{{ $training->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-t-lg"></div>
                        <div class="absolute bottom-4 left-6 text-white">
                            <h2 class="text-2xl font-bold mb-2">{{ $training->title }}</h2>
                            <p class="text-white/90">{{ $training->instructor_name }}</p>
                        </div>
                    </div>
                @endif
                <div class="p-6">
                    @if(!$training->image)
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $training->title }}</h2>
                    @endif
                    
                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Deskripsi Pelatihan</h3>
                        <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                            {!! $training->description !!}
                        </div>
                    </div>

                    @if($training->objectives)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Tujuan Pelatihan</h3>
                            <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                                {!! $training->objectives !!}
                            </div>
                        </div>
                    @endif

                    @if($training->requirements)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Persyaratan</h3>
                            <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                                {!! $training->requirements !!}
                            </div>
                        </div>
                    @endif

                    @if($training->materials)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Materi Pelatihan</h3>
                            <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300">
                                {!! $training->materials !!}
                            </div>
                        </div>
                    @endif

                    <!-- Schedule -->
                    @if($training->schedules->count() > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Jadwal Pelatihan</h3>
                            <div class="space-y-3">
                                @foreach($training->schedules->sortBy('date') as $index => $schedule)
                                    <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 dark:bg-indigo-900/30 rounded-full flex items-center justify-center mr-4">
                                            <span class="text-indigo-600 dark:text-indigo-400 font-semibold">{{ $index + 1 }}</span>
                                        </div>
                                        <div class="flex-grow">
                                            <h4 class="font-medium text-gray-900 dark:text-white">{{ $schedule->topic }}</h4>
                                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-300 mt-1">
                                                <i class="fas fa-calendar mr-2"></i>
                                                <span>{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}</span>
                                                <i class="fas fa-clock ml-4 mr-2"></i>
                                                <span>{{ $schedule->start_time }} - {{ $schedule->end_time }}</span>
                                                <i class="fas fa-map-marker-alt ml-4 mr-2"></i>
                                                <span>{{ $schedule->location }}</span>
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

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <!-- Registration Status -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
                <div class="p-6">
                    @php
                        $userRegistration = $training->participants->where('user_id', Auth::id())->first();
                    @endphp
                    
                    @if($userRegistration)
                        @if($userRegistration->status == 'pending')
                            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg mb-4 dark:bg-yellow-900/20 dark:border-yellow-800 dark:text-yellow-400">
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    <div>
                                        <div class="font-semibold">Menunggu Persetujuan</div>
                                        <div class="text-sm mt-1">Pendaftaran Anda sedang ditinjau.</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('participant.registrations.show', $userRegistration) }}" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg transition-colors inline-block text-center">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail Pendaftaran
                            </a>
                        @elseif($userRegistration->status == 'approved')
                            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-4 dark:bg-green-900/20 dark:border-green-800 dark:text-green-400">
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <div>
                                        <div class="font-semibold">Pendaftaran Diterima</div>
                                        <div class="text-sm mt-1">Selamat! Anda terdaftar sebagai peserta.</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('participant.registrations.show', $userRegistration) }}" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg transition-colors inline-block text-center">
                                <i class="fas fa-eye mr-2"></i>Lihat Detail Pendaftaran
                            </a>
                        @elseif($userRegistration->status == 'rejected')
                            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg mb-4 dark:bg-red-900/20 dark:border-red-800 dark:text-red-400">
                                <div class="flex items-center">
                                    <i class="fas fa-times-circle mr-2"></i>
                                    <div>
                                        <div class="font-semibold">Pendaftaran Ditolak</div>
                                        <div class="text-sm mt-1">Mohon maaf, pendaftaran Anda ditolak.</div>
                                    </div>
                                </div>
                            </div>
                        @elseif($userRegistration->status == 'cancelled')
                            <div class="bg-gray-50 border border-gray-200 text-gray-800 px-4 py-3 rounded-lg mb-4 dark:bg-gray-900/20 dark:border-gray-800 dark:text-gray-400">
                                <div class="flex items-center">
                                    <i class="fas fa-ban mr-2"></i>
                                    <div>
                                        <div class="font-semibold">Pendaftaran Dibatalkan</div>
                                        <div class="text-sm mt-1">Anda telah membatalkan pendaftaran.</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        @if($training->status == 'published')
                            @if($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg mb-4 dark:bg-yellow-900/20 dark:border-yellow-800 dark:text-yellow-400">
                                    <div class="flex items-center">
                                        <i class="fas fa-users mr-2"></i>
                                        <div>
                                            <div class="font-semibold">Kuota Penuh</div>
                                            <div class="text-sm mt-1">Maaf, kuota peserta sudah penuh.</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg mb-4 dark:bg-blue-900/20 dark:border-blue-800 dark:text-blue-400">
                                    <div class="flex items-center">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        <div>
                                            <div class="font-semibold">Pelatihan Tersedia</div>
                                            <div class="text-sm mt-1">Daftarkan diri Anda sekarang!</div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('participant.trainings.register', $training) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded-lg transition-colors font-semibold">
                                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                                    </button>
                                </form>
                            @endif
                        @else
                            <div class="bg-gray-50 border border-gray-200 text-gray-800 px-4 py-3 rounded-lg mb-4 dark:bg-gray-900/20 dark:border-gray-800 dark:text-gray-400">
                                <div class="flex items-center">
                                    <i class="fas fa-lock mr-2"></i>
                                    <div>
                                        <div class="font-semibold">Tidak Tersedia</div>
                                        <div class="text-sm mt-1">Pelatihan tidak dibuka untuk pendaftaran.</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Training Info -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        <i class="fas fa-info-circle mr-2"></i>Informasi Pelatihan
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Instruktur:</span>
                        <span class="text-gray-900 dark:text-white">{{ $training->instructor_name }}</span>
                    </div>

                    @if($training->instructor_contact)
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Kontak:</span>
                            <span class="text-gray-900 dark:text-white">{{ $training->instructor_contact }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Status:</span>
                        <span>
                            @if($training->status == 'published')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">Terbuka</span>
                            @elseif($training->status == 'ongoing')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">Berlangsung</span>
                            @elseif($training->status == 'completed')
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">Selesai</span>
                            @else
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">Draft</span>
                            @endif
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Peserta:</span>
                        <span class="text-gray-900 dark:text-white">
                            {{ $training->participants->where('status', '!=', 'cancelled')->count() }}
                            @if($training->max_participants)
                                / {{ $training->max_participants }}
                            @endif
                        </span>
                    </div>

                    @if($training->start_date)
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Tanggal Mulai:</span>
                            <span class="text-gray-900 dark:text-white">{{ $training->start_date->format('d M Y') }}</span>
                        </div>
                    @endif

                    @if($training->end_date)
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Tanggal Selesai:</span>
                            <span class="text-gray-900 dark:text-white">{{ $training->end_date->format('d M Y') }}</span>
                        </div>
                    @endif

                    @if($training->location)
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Lokasi:</span>
                            <span class="text-gray-900 dark:text-white">{{ $training->location }}</span>
                        </div>
                    @endif

                    @if($training->created_at)
                        <div class="flex justify-between">
                            <span class="font-medium text-gray-600 dark:text-gray-400">Dibuat:</span>
                            <span class="text-gray-900 dark:text-white">{{ $training->created_at->format('d M Y') }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.integrated-dashboard>
