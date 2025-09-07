<x-layouts.integrated-dashboard title="Pendaftaran Saya">
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
                        <span class="px-2 py-1 font-medium text-gray-500 dark:text-gray-500">Pendaftaran Saya</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title with gradient -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 rounded-xl p-6 text-white shadow-lg">
            <h1 class="text-3xl font-bold mb-2">Pendaftaran Saya</h1>
            <p class="text-indigo-100 dark:text-indigo-200">Kelola dan pantau semua pendaftaran pelatihan Anda</p>
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

    <!-- Statistics Cards with modern design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Pendaftaran</p>
                    <p class="text-3xl font-bold">{{ $registrations->count() }}</p>
                </div>
                <div class="p-3 bg-blue-400/30 rounded-xl">
                    <i class="fas fa-clipboard-list text-2xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-amber-100 text-sm font-medium">Menunggu Persetujuan</p>
                    <p class="text-3xl font-bold">{{ $registrations->where('status', 'registered')->count() }}</p>
                </div>
                <div class="p-3 bg-amber-400/30 rounded-xl">
                    <i class="fas fa-clock text-2xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-emerald-100 text-sm font-medium">Diterima</p>
                    <p class="text-3xl font-bold">{{ $registrations->where('status', 'approved')->count() }}</p>
                </div>
                <div class="p-3 bg-emerald-400/30 rounded-xl">
                    <i class="fas fa-check text-2xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-100 text-sm font-medium">Ditolak/Dibatalkan</p>
                    <p class="text-3xl font-bold">{{ $registrations->whereIn('status', ['rejected', 'cancelled'])->count() }}</p>
                </div>
                <div class="p-3 bg-red-400/30 rounded-xl">
                    <i class="fas fa-times text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                <i class="fas fa-list text-indigo-500 mr-3"></i>
                Riwayat Pendaftaran Pelatihan
            </h2>
        </div>
        <div class="p-6">
            @if($registrations->count() > 0)
                <!-- Desktop View -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="text-left py-4 px-4 font-semibold text-gray-900 dark:text-white">Pelatihan</th>
                                <th class="text-left py-4 px-4 font-semibold text-gray-900 dark:text-white">Instruktur</th>
                                <th class="text-left py-4 px-4 font-semibold text-gray-900 dark:text-white">Tanggal Daftar</th>
                                <th class="text-left py-4 px-4 font-semibold text-gray-900 dark:text-white">Status</th>
                                <th class="text-left py-4 px-4 font-semibold text-gray-900 dark:text-white">Jadwal</th>
                                <th class="text-left py-4 px-4 font-semibold text-gray-900 dark:text-white">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($registrations as $registration)
                            <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-4">
                                        @if($registration->training->image)
                                            <img src="{{ asset('storage/' . $registration->training->image) }}" 
                                                 alt="{{ $registration->training->title }}" 
                                                 class="w-12 h-12 rounded-xl object-cover shadow-md">
                                        @else
                                            <div class="w-12 h-12 bg-gradient-to-r from-gray-200 to-gray-300 dark:from-gray-600 dark:to-gray-700 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-graduation-cap text-gray-500 dark:text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div class="min-w-0 flex-1">
                                            <p class="font-semibold text-gray-900 dark:text-white text-sm">{{ $registration->training->title }}</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">{{ Str::limit(strip_tags($registration->training->description), 50) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-900 dark:text-white">{{ $registration->training->instructor_name }}</td>
                                <td class="py-4 px-4 text-sm text-gray-900 dark:text-white">{{ $registration->created_at->format('d M Y H:i') }}</td>
                                <td class="py-4 px-4">
                                    @if($registration->status == 'registered')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                            <i class="fas fa-clock mr-1"></i> Menunggu
                                        </span>
                                    @elseif($registration->status == 'approved')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                            <i class="fas fa-check mr-1"></i> Diterima
                                        </span>
                                    @elseif($registration->status == 'rejected')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                            <i class="fas fa-times mr-1"></i> Ditolak
                                        </span>
                                    @elseif($registration->status == 'cancelled')
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                            <i class="fas fa-ban mr-1"></i> Dibatalkan
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-4 text-sm text-gray-900 dark:text-white">
                                    @if($registration->training->schedules->count() > 0)
                                        @php
                                            $firstSchedule = $registration->training->schedules->sortBy('date')->first();
                                        @endphp
                                        <div>{{ $firstSchedule->date->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">{{ $firstSchedule->start_time }} - {{ $firstSchedule->end_time }}</div>
                                        @if($registration->training->schedules->count() > 1)
                                            <div class="text-xs text-gray-500 dark:text-gray-400">({{ $registration->training->schedules->count() }} pertemuan)</div>
                                        @endif
                                    @else
                                        <span class="text-xs text-gray-500 dark:text-gray-400">Belum dijadwalkan</span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('participant.registrations.show', $registration) }}" 
                                           class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 hover:bg-blue-200 dark:bg-blue-800 dark:hover:bg-blue-700 text-blue-600 dark:text-blue-400 rounded-lg transition-colors"
                                           title="Lihat Detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="{{ route('participant.trainings.show', $registration->training) }}" 
                                           class="inline-flex items-center justify-center w-8 h-8 bg-indigo-100 hover:bg-indigo-200 dark:bg-indigo-800 dark:hover:bg-indigo-700 text-indigo-600 dark:text-indigo-400 rounded-lg transition-colors"
                                           title="Lihat Pelatihan">
                                            <i class="fas fa-graduation-cap text-sm"></i>
                                        </a>
                                        @if($registration->status == 'registered')
                                            <button type="button" 
                                                    class="inline-flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 dark:bg-red-800 dark:hover:bg-red-700 text-red-600 dark:text-red-400 rounded-lg transition-colors"
                                                    onclick="document.getElementById('cancelModal{{ $registration->id }}').showModal()"
                                                    title="Batalkan Pendaftaran">
                                                <i class="fas fa-times text-sm"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View -->
                <div class="lg:hidden space-y-4">
                    @foreach($registrations as $registration)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-4 border border-gray-200 dark:border-gray-600">
                            <div class="flex items-start space-x-4 mb-4">
                                @if($registration->training->image)
                                    <img src="{{ asset('storage/' . $registration->training->image) }}" 
                                         alt="{{ $registration->training->title }}" 
                                         class="w-16 h-16 rounded-xl object-cover shadow-md">
                                @else
                                    <div class="w-16 h-16 bg-gradient-to-r from-gray-200 to-gray-300 dark:from-gray-600 dark:to-gray-700 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-graduation-cap text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="flex-1 min-w-0">
                                    <h3 class="font-semibold text-gray-900 dark:text-white text-sm mb-1">{{ $registration->training->title }}</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">{{ $registration->training->instructor_name }}</p>
                                    <div class="mb-2">
                                        @if($registration->status == 'registered')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                                <i class="fas fa-clock mr-1"></i> Menunggu
                                            </span>
                                        @elseif($registration->status == 'approved')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                                <i class="fas fa-check mr-1"></i> Diterima
                                            </span>
                                        @elseif($registration->status == 'rejected')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                                <i class="fas fa-times mr-1"></i> Ditolak
                                            </span>
                                        @elseif($registration->status == 'cancelled')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400">
                                                <i class="fas fa-ban mr-1"></i> Dibatalkan
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 text-xs mb-4">
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Tanggal Daftar:</span>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $registration->created_at->format('d M Y H:i') }}</div>
                                </div>
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Jadwal:</span>
                                    @if($registration->training->schedules->count() > 0)
                                        @php
                                            $firstSchedule = $registration->training->schedules->sortBy('date')->first();
                                        @endphp
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $firstSchedule->date->format('d M Y') }}</div>
                                        <div class="text-gray-500 dark:text-gray-400">{{ $firstSchedule->start_time }} - {{ $firstSchedule->end_time }}</div>
                                    @else
                                        <div class="text-gray-500 dark:text-gray-400">Belum dijadwalkan</div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('participant.registrations.show', $registration) }}" 
                                   class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 hover:bg-blue-200 dark:bg-blue-800 dark:hover:bg-blue-700 text-blue-600 dark:text-blue-400 rounded-lg transition-colors">
                                    <i class="fas fa-eye text-sm"></i>
                                </a>
                                <a href="{{ route('participant.trainings.show', $registration->training) }}" 
                                   class="inline-flex items-center justify-center w-8 h-8 bg-indigo-100 hover:bg-indigo-200 dark:bg-indigo-800 dark:hover:bg-indigo-700 text-indigo-600 dark:text-indigo-400 rounded-lg transition-colors">
                                    <i class="fas fa-graduation-cap text-sm"></i>
                                </a>
                                @if($registration->status == 'registered')
                                    <button type="button" 
                                            class="inline-flex items-center justify-center w-8 h-8 bg-red-100 hover:bg-red-200 dark:bg-red-800 dark:hover:bg-red-700 text-red-600 dark:text-red-400 rounded-lg transition-colors"
                                            onclick="document.getElementById('cancelModal{{ $registration->id }}').showModal()">
                                        <i class="fas fa-times text-sm"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($registrations->hasPages())
                    <div class="flex justify-center mt-8">
                        {{ $registrations->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16">
                    <div class="max-w-sm mx-auto">
                        <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-clipboard-list text-4xl text-gray-400 dark:text-gray-500"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Belum Ada Pendaftaran</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">Anda belum mendaftar untuk pelatihan apapun. Mulai eksplorasi pelatihan yang tersedia!</p>
                        <a href="{{ route('participant.trainings.index') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white py-3 px-6 rounded-xl transition-all duration-300 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-plus mr-2"></i> Lihat Pelatihan Tersedia
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Cancel Registration Modals -->
    @foreach($registrations->where('status', 'registered') as $registration)
        <dialog id="cancelModal{{ $registration->id }}" class="modal backdrop:bg-black/50 backdrop:backdrop-blur-sm">
            <div class="fixed inset-0 flex items-center justify-center p-4">
                <div class="bg-white dark:bg-gray-800 rounded-2xl max-w-md w-full shadow-2xl border-0 overflow-hidden">
                    <div class="bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/30 dark:to-pink-900/30 px-6 py-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-exclamation-triangle text-red-500 mr-3"></i>
                                Batalkan Pendaftaran
                            </h3>
                            <button type="button" 
                                    onclick="document.getElementById('cancelModal{{ $registration->id }}').close()"
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
                                    onclick="document.getElementById('cancelModal{{ $registration->id }}').close()"
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
    @endforeach

</x-layouts.integrated-dashboard>
