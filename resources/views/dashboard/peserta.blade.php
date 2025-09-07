<x-layouts.integrated-dashboard title="Dashboard Peserta Pelatihan">
    <!-- Welcome Section -->
    <div class="mb-8 bg-gradient-to-r from-indigo-500 to-indigo-600 dark:from-indigo-600 dark:to-indigo-700 rounded-lg p-6 text-white">
        <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ $user->name }}!</h2>
        <p class="text-indigo-100">Bergabunglah dengan pelatihan literasi untuk meningkatkan kemampuan Anda.</p>
    </div>

    <!-- Contact Us Button -->
    <div class="mb-8">
        <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-blue-600 hover:from-green-600 hover:to-blue-700 text-white font-semibold rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
            <i class="fas fa-phone mr-2"></i>
            Hubungi Kami
        </a>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-full mr-4">
                    <i class="fas fa-clipboard-list text-2xl text-blue-600 dark:text-blue-400"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pendaftaran</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $myRegistrations->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full mr-4">
                    <i class="fas fa-check-circle text-2xl text-green-600 dark:text-green-400"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Disetujui</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $myRegistrations->where('status', 'approved')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded-full mr-4">
                    <i class="fas fa-clock text-2xl text-yellow-600 dark:text-yellow-400"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Menunggu</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $myRegistrations->where('status', 'registered')->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- My Registrations & Available Trainings -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- My Training Registrations -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendaftaran Saya</h3>
                <a href="{{ route('participant.registrations.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 text-sm font-medium">
                    Lihat Semua
                </a>
            </div>
            <div class="p-6">
                @if($myRegistrations->count() > 0)
                    <div class="space-y-4">
                        @foreach($myRegistrations->take(3) as $registration)
                            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-medium text-gray-900 dark:text-white">{{ Str::limit($registration->training->title, 30) }}</h4>
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        @if($registration->status === 'approved') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                        @elseif($registration->status === 'registered') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                        @elseif($registration->status === 'rejected') bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                        @endif">
                                        @if($registration->status === 'approved') Disetujui
                                        @elseif($registration->status === 'registered') Menunggu
                                        @elseif($registration->status === 'rejected') Ditolak
                                        @else {{ ucfirst($registration->status) }}
                                        @endif
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300">{{ $registration->training->instructor_name }}</p>
                                @if($registration->training->start_date)
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Mulai: {{ $registration->training->start_date->format('d M Y') }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-clipboard-list text-4xl text-gray-300 dark:text-gray-600 mb-4"></i>
                        <p class="text-gray-600 dark:text-gray-400">Belum ada pendaftaran pelatihan</p>
                        <p class="text-sm text-gray-500 dark:text-gray-500 mt-1">Daftar pelatihan di sebelah kanan</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Available Trainings -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pelatihan Tersedia</h3>
                <a href="{{ route('participant.trainings.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 text-sm font-medium">
                    Lihat Semua
                </a>
            </div>
            <div class="p-6">
                @if($availableTrainings->count() > 0)
                    <div class="space-y-4">
                        @foreach($availableTrainings->take(3) as $training)
                            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex items-start justify-between mb-2">
                                    <h4 class="font-medium text-gray-900 dark:text-white">{{ Str::limit($training->title, 30) }}</h4>
                                    @if($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                            Penuh
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                            Tersedia
                                        </span>
                                    @endif
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">{{ $training->instructor_name }}</p>
                                @if($training->start_date)
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Mulai: {{ $training->start_date->format('d M Y') }}</p>
                                @endif
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $training->participants->where('status', '!=', 'cancelled')->count() }}@if($training->max_participants)/{{ $training->max_participants }}@endif peserta
                                    </span>
                                    @php
                                        $userRegistration = $myRegistrations->where('training_id', $training->id)->first();
                                    @endphp
                                    @if($userRegistration)
                                        <span class="text-xs text-gray-500 dark:text-gray-400">Sudah Daftar</span>
                                    @elseif($training->max_participants && $training->participants->where('status', '!=', 'cancelled')->count() >= $training->max_participants)
                                        <span class="text-xs text-gray-500 dark:text-gray-400">Kuota Penuh</span>
                                    @else
                                        <a href="{{ route('participant.trainings.show', $training) }}" 
                                           class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm transition-colors">
                                            Daftar
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <i class="fas fa-graduation-cap text-4xl text-gray-300 dark:text-gray-600 mb-4"></i>
                        <p class="text-gray-600 dark:text-gray-400">Tidak ada pelatihan tersedia</p>
                        <p class="text-sm text-gray-500 dark:text-gray-500 mt-1">Periksa kembali nanti</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-indigo-100 dark:bg-indigo-900/30 rounded-full mr-4">
                    <i class="fas fa-search text-2xl text-indigo-600 dark:text-indigo-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Cari Pelatihan</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Temukan pelatihan literasi yang sesuai dengan minat Anda.</p>
            <a href="{{ route('participant.trainings.index') }}" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Jelajahi Pelatihan
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-full mr-4">
                    <i class="fas fa-list-check text-2xl text-green-600 dark:text-green-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendaftaran Saya</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Kelola dan pantau status pendaftaran pelatihan Anda.</p>
            <a href="{{ route('participant.registrations.index') }}" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Lihat Pendaftaran
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-full mr-4">
                    <i class="fas fa-user-edit text-2xl text-purple-600 dark:text-purple-400"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Profile</h3>
            </div>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Perbarui informasi profil dan pengaturan akun Anda.</p>
            <a href="{{ route('dashboard.profile') }}" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors inline-block text-center">
                Edit Profile
            </a>
        </div>
    </div>
</x-layouts.integrated-dashboard>
