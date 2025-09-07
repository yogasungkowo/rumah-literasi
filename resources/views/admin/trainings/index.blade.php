@php
    $title = 'Kelola Pelatihan';
    $description = 'Kelola dan pantau semua program pelatihan literasi yang tersedia';
@endphp

<x-layouts.admin :title="$title" :description="$description">
    <!-- Page Background -->
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-7xl mx-auto">
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="mb-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-6 py-4 rounded-xl shadow-sm" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 text-red-800 dark:text-red-200 px-6 py-4 rounded-xl shadow-sm" role="alert">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-600 mr-3"></i>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                <!-- Page Header -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                    <div class="mb-6 lg:mb-0">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Kelola Pelatihan</h1>
                        <p class="text-gray-600 dark:text-gray-400 text-lg">
                            Kelola dan pantau semua program pelatihan literasi yang tersedia
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('admin.trainings.create') }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Pelatihan
                        </a>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4 mb-8">
                    <div class="bg-blue-500 dark:bg-blue-600 rounded-2xl p-5 text-white shadow-lg border border-blue-600 dark:border-blue-500 hover:bg-blue-600 dark:hover:bg-blue-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <p class="text-blue-100 dark:text-blue-200 text-sm font-medium truncate">Total Pelatihan</p>
                                <p class="text-2xl font-bold truncate text-white">{{ $trainings->total() }}</p>
                            </div>
                            <div class="ml-3 flex-shrink-0">
                                <i class="fas fa-chalkboard-teacher text-2xl text-blue-200 dark:text-blue-300"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-orange-500 dark:bg-orange-600 rounded-2xl p-5 text-white shadow-lg border border-orange-600 dark:border-orange-500 hover:bg-orange-600 dark:hover:bg-orange-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <p class="text-orange-100 dark:text-orange-200 text-sm font-medium truncate">Draft</p>
                                <p class="text-2xl font-bold truncate text-white">{{ $trainings->where('status', 'draft')->count() }}</p>
                            </div>
                            <div class="ml-3 flex-shrink-0">
                                <i class="fas fa-edit text-2xl text-orange-200 dark:text-orange-300"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-green-500 dark:bg-green-600 rounded-2xl p-5 text-white shadow-lg border border-green-600 dark:border-green-500 hover:bg-green-600 dark:hover:bg-green-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <p class="text-green-100 dark:text-green-200 text-sm font-medium truncate">Dipublikasi</p>
                                <p class="text-2xl font-bold truncate text-white">{{ $trainings->where('status', 'published')->count() }}</p>
                            </div>
                            <div class="ml-3 flex-shrink-0">
                                <i class="fas fa-eye text-2xl text-green-200 dark:text-green-300"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-indigo-500 dark:bg-indigo-600 rounded-2xl p-5 text-white shadow-lg border border-indigo-600 dark:border-indigo-500 hover:bg-indigo-600 dark:hover:bg-indigo-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <p class="text-indigo-100 dark:text-indigo-200 text-sm font-medium truncate">Berlangsung</p>
                                <p class="text-2xl font-bold truncate text-white">{{ $trainings->where('status', 'ongoing')->count() }}</p>
                            </div>
                            <div class="ml-3 flex-shrink-0">
                                <i class="fas fa-play text-2xl text-indigo-200 dark:text-indigo-300"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-purple-500 dark:bg-purple-600 rounded-2xl p-5 text-white shadow-lg border border-purple-600 dark:border-purple-500 hover:bg-purple-600 dark:hover:bg-purple-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 min-w-0">
                                <p class="text-purple-100 dark:text-purple-200 text-sm font-medium truncate">Selesai</p>
                                <p class="text-2xl font-bold truncate text-white">{{ $trainings->where('status', 'completed')->count() }}</p>
                            </div>
                            <div class="ml-3 flex-shrink-0">
                                <i class="fas fa-flag-checkered text-2xl text-purple-200 dark:text-purple-300"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-filter mr-2 text-indigo-600"></i>
                            Filter Pelatihan
                        </h3>
                        <button type="button" onclick="toggleFilterForm()" 
                                class="lg:hidden inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <i class="fas fa-chevron-down mr-1" id="filter-icon"></i>
                            Toggle Filter
                        </button>
                    </div>
                    
                    <form method="GET" action="{{ route('admin.trainings.index') }}" id="filter-form" class="hidden lg:block">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4">
                            <!-- Search -->
                            <div class="lg:col-span-2">
                                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <i class="fas fa-search mr-1"></i>Pencarian
                                </label>
                                <input type="text" 
                                       name="search" 
                                       id="search"
                                       value="{{ request('search') }}"
                                       placeholder="Cari judul, deskripsi, instruktur..."
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                            </div>

                            <!-- Status Filter -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <i class="fas fa-flag mr-1"></i>Status
                                </label>
                                <select name="status" id="status" 
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                                    <option value="">Semua Status</option>
                                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Dipublikasi</option>
                                    <option value="ongoing" {{ request('status') === 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>

                            <!-- Start Date From -->
                            <div>
                                <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <i class="fas fa-calendar-alt mr-1"></i>Tanggal Mulai Dari
                                </label>
                                <input type="text" 
                                       name="date_from" 
                                       id="date_from"
                                       value="{{ request('date_from') }}"
                                       placeholder="Pilih tanggal..."
                                       class="flatpickr w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                                       readonly>
                            </div>

                            <!-- End Date To -->
                            <div>
                                <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <i class="fas fa-calendar-alt mr-1"></i>Tanggal Berakhir Sampai
                                </label>
                                <input type="text" 
                                       name="date_to" 
                                       id="date_to"
                                       value="{{ request('date_to') }}"
                                       placeholder="Pilih tanggal..."
                                       class="flatpickr w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white"
                                       readonly>
                            </div>

                            <!-- Sort By -->
                            <div>
                                <label for="sort_by" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    <i class="fas fa-sort mr-1"></i>Urutkan Berdasarkan
                                </label>
                                <select name="sort_by" id="sort_by" 
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                                    <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Tanggal Dibuat</option>
                                    <option value="title" {{ request('sort_by') === 'title' ? 'selected' : '' }}>Judul</option>
                                    <option value="start_date" {{ request('sort_by') === 'start_date' ? 'selected' : '' }}>Tanggal Mulai</option>
                                    <option value="current_participants" {{ request('sort_by') === 'current_participants' ? 'selected' : '' }}>Jumlah Peserta</option>
                                    <option value="price" {{ request('sort_by') === 'price' ? 'selected' : '' }}>Harga</option>
                                </select>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center justify-between mt-4 pt-4 border-t border-gray-200 dark:border-gray-600">
                            <div class="flex items-center space-x-2 mb-3 sm:mb-0">
                                <label for="sort_order" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-sort-amount-down mr-1"></i>Urutan:
                                </label>
                                <select name="sort_order" id="sort_order" 
                                        class="px-3 py-1.5 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-white">
                                    <option value="desc" {{ request('sort_order') === 'desc' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="asc" {{ request('sort_order') === 'asc' ? 'selected' : '' }}>Terlama</option>
                                </select>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                    <i class="fas fa-search mr-2"></i>
                                    Filter
                                </button>
                                <a href="{{ route('admin.trainings.index') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                    <i class="fas fa-times mr-2"></i>
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Training Table -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Table Header -->
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 px-6 py-4 border-b border-gray-200 dark:border-gray-600">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <i class="fas fa-table mr-2 text-indigo-600"></i>
                                Daftar Pelatihan
                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                    {{ $trainings->total() }} Total
                                </span>
                            </h3>
                        </div>
                    </div>

                    @if($trainings->count() > 0)
                        <!-- Desktop Table -->
                        <div class="hidden lg:block overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-chalkboard mr-2"></i>Pelatihan
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-user mr-2"></i>Instruktur
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-calendar mr-2"></i>Jadwal
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-users mr-2"></i>Peserta
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-hand-paper mr-2"></i>Relawan
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-flag mr-2"></i>Status
                                        </th>
                                        <th scope="col" class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            <i class="fas fa-cog mr-2"></i>Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach($trainings as $training)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                            <td class="px-6 py-4">
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0">
                                                        @if($training->image)
                                                            <img class="h-12 w-12 rounded-lg object-cover border-2 border-gray-200 dark:border-gray-600" 
                                                                 src="{{ Storage::url($training->image) }}" 
                                                                 alt="{{ $training->title }}">
                                                        @else
                                                            <div class="h-12 w-12 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                                                <i class="fas fa-chalkboard-teacher text-white text-lg"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <p class="text-sm font-semibold text-gray-900 dark:text-white truncate">
                                                            {{ $training->title }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 dark:text-gray-400 truncate">
                                                            <i class="fas fa-map-marker-alt mr-1"></i>{{ $training->location }}
                                                        </p>
                                                        @if($training->price > 0)
                                                            <p class="text-sm font-medium text-green-600 dark:text-green-400">
                                                                <i class="fas fa-money-bill mr-1"></i>Rp {{ number_format($training->price, 0, ',', '.') }}
                                                            </p>
                                                        @else
                                                            <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                                                <i class="fas fa-gift mr-1"></i>Gratis
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8">
                                                        <div class="h-8 w-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                                                            <span class="text-xs font-medium text-white">
                                                                {{ substr($training->instructor_name, 0, 1) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                            {{ $training->instructor_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900 dark:text-white">
                                                    <p class="font-medium">
                                                        <i class="fas fa-calendar-day mr-1 text-blue-500"></i>
                                                        {{ $training->start_date->format('d M Y') }}
                                                    </p>
                                                    <p class="text-gray-500 dark:text-gray-400">
                                                        <i class="fas fa-clock mr-1"></i>
                                                        s/d {{ $training->end_date->format('d M Y') }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-1">
                                                        @php
                                                            $totalParticipants = $training->participants()->count();
                                                            $approvedParticipants = $training->participants()->where('status', 'approved')->count();
                                                            $pendingParticipants = $training->participants()->where('status', 'pending')->count();
                                                            $participantPercentage = $training->max_participants > 0 ? round(($totalParticipants / $training->max_participants) * 100) : 0;
                                                        @endphp
                                                        <div class="flex items-center justify-between text-sm">
                                                            <span class="font-medium text-gray-900 dark:text-white">
                                                                {{ $totalParticipants }}/{{ $training->max_participants }}
                                                            </span>
                                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                                {{ $participantPercentage }}%
                                                            </span>
                                                        </div>
                                                        @if($pendingParticipants > 0)
                                                            <div class="flex items-center justify-between text-xs mt-1">
                                                                <span class="text-green-600 dark:text-green-400">
                                                                    {{ $approvedParticipants }} disetujui
                                                                </span>
                                                                <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200">
                                                                    {{ $pendingParticipants }} pending
                                                                </span>
                                                            </div>
                                                        @endif
                                                        <div class="mt-1 w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                                            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full transition-all duration-500" 
                                                                 style="width: {{ $participantPercentage }}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <!-- Kolom Relawan -->
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-1">
                                                        @php
                                                            $totalVolunteers = $training->volunteerRegistrations()->count();
                                                            $confirmedVolunteers = $training->volunteerRegistrations()->where('status', 'confirmed')->count();
                                                            $pendingVolunteers = $training->volunteerRegistrations()->where('status', 'registered')->count();
                                                        @endphp
                                                        <div class="flex items-center justify-between text-sm">
                                                            <span class="font-medium text-gray-900 dark:text-white">
                                                                {{ $confirmedVolunteers }}/{{ $totalVolunteers }}
                                                            </span>
                                                            @if($pendingVolunteers > 0)
                                                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200">
                                                                    {{ $pendingVolunteers }} pending
                                                                </span>
                                                            @endif
                                                        </div>
                                                        @if($totalVolunteers > 0)
                                                            <div class="mt-1 w-full bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                                                <div class="bg-gradient-to-r from-emerald-500 to-green-600 h-2 rounded-full transition-all duration-500" 
                                                                     style="width: {{ $totalVolunteers > 0 ? round(($confirmedVolunteers / $totalVolunteers) * 100) : 0 }}%"></div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="px-6 py-4">
                                                @if($training->status === 'published')
                                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 border border-green-200 dark:border-green-700">
                                                        <i class="fas fa-eye mr-1"></i>
                                                        Dipublikasi
                                                    </span>
                                                @elseif($training->status === 'draft')
                                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 border border-yellow-200 dark:border-yellow-700">
                                                        <i class="fas fa-edit mr-1"></i>
                                                        Draft
                                                    </span>
                                                @elseif($training->status === 'ongoing')
                                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 border border-blue-200 dark:border-blue-700">
                                                        <i class="fas fa-play mr-1"></i>
                                                        Berlangsung
                                                    </span>
                                                @elseif($training->status === 'completed')
                                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 border border-purple-200 dark:border-purple-700">
                                                        <i class="fas fa-flag-checkered mr-1"></i>
                                                        Selesai
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 border border-red-200 dark:border-red-700">
                                                        <i class="fas fa-times mr-1"></i>
                                                        Dibatalkan
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <div class="flex items-center justify-end space-x-2">
                                                    <a href="{{ route('admin.trainings.show', $training) }}" 
                                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/50 rounded-lg transition-all duration-200"
                                                       title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                    <!-- Button untuk mengelola relawan -->
                                                    <a href="{{ route('admin.trainings.show', $training) }}#volunteers" 
                                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 dark:hover:text-emerald-300 hover:bg-emerald-50 dark:hover:bg-emerald-900/50 rounded-lg transition-all duration-200"
                                                       title="Kelola Relawan">
                                                        <i class="fas fa-users"></i>
                                                    </a>
                                                    
                                                    <a href="{{ route('admin.trainings.edit', $training) }}" 
                                                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/50 rounded-lg transition-all duration-200"
                                                       title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.trainings.destroy', $training) }}" 
                                                          class="inline" 
                                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelatihan ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/50 rounded-lg transition-all duration-200"
                                                                title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Mobile Cards -->
                        <div class="lg:hidden space-y-4">
                            @foreach($trainings as $training)
                                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-200">
                                    <!-- Header -->
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex-1 mr-4">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                                {{ $training->title }}
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">
                                                <i class="fas fa-map-marker-alt mr-1"></i>{{ $training->location }}
                                            </p>
                                            @if($training->price > 0)
                                                <p class="text-sm font-medium text-green-600 dark:text-green-400">
                                                    <i class="fas fa-money-bill mr-1"></i>Rp {{ number_format($training->price, 0, ',', '.') }}
                                                </p>
                                            @else
                                                <p class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                                    <i class="fas fa-gift mr-1"></i>Gratis
                                                </p>
                                            @endif
                                        </div>
                                        
                                        <!-- Status Badge -->
                                        <div class="flex-shrink-0">
                                            @if($training->status === 'published')
                                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                                    <i class="fas fa-eye mr-1"></i>Dipublikasi
                                                </span>
                                            @elseif($training->status === 'draft')
                                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200">
                                                    <i class="fas fa-edit mr-1"></i>Draft
                                                </span>
                                            @elseif($training->status === 'ongoing')
                                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                                    <i class="fas fa-play mr-1"></i>Berlangsung
                                                </span>
                                            @elseif($training->status === 'completed')
                                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200">
                                                    <i class="fas fa-check mr-1"></i>Selesai
                                                </span>
                                            @elseif($training->status === 'cancelled')
                                                <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200">
                                                    <i class="fas fa-times mr-1"></i>Dibatalkan
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Info Grid -->
                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <!-- Instruktur -->
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Instruktur</p>
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center mr-2">
                                                    <span class="text-xs font-medium text-white">
                                                        {{ substr($training->instructor_name, 0, 1) }}
                                                    </span>
                                                </div>
                                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                    {{ $training->instructor_name }}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Jadwal -->
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Jadwal</p>
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $training->start_date->format('d M Y') }}
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                                {{ $training->start_time->format('H:i') }} - {{ $training->end_time->format('H:i') }}
                                            </p>
                                        </div>

                                        <!-- Peserta -->
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Peserta</p>
                                            @php
                                                $totalParticipants = $training->participants()->count();
                                                $approvedParticipants = $training->participants()->where('status', 'approved')->count();
                                                $pendingParticipants = $training->participants()->where('status', 'pending')->count();
                                                $participantPercentage = $training->max_participants > 0 ? round(($totalParticipants / $training->max_participants) * 100) : 0;
                                            @endphp
                                            <div class="flex items-center">
                                                <span class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                                    {{ $totalParticipants }}/{{ $training->max_participants }}
                                                </span>
                                                <div class="flex-1 bg-gray-200 dark:bg-gray-600 rounded-full h-2">
                                                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 h-2 rounded-full" 
                                                         style="width: {{ $participantPercentage }}%"></div>
                                                </div>
                                            </div>
                                            @if($pendingParticipants > 0)
                                                <div class="flex items-center justify-between text-xs mt-1">
                                                    <span class="text-green-600 dark:text-green-400">
                                                        {{ $approvedParticipants }} disetujui
                                                    </span>
                                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200">
                                                        {{ $pendingParticipants }} pending
                                                    </span>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Relawan -->
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-1">Relawan</p>
                                            @php
                                                $totalVolunteers = $training->volunteerRegistrations()->count();
                                                $confirmedVolunteers = $training->volunteerRegistrations()->where('status', 'confirmed')->count();
                                                $pendingVolunteers = $training->volunteerRegistrations()->where('status', 'registered')->count();
                                            @endphp
                                            <div class="flex items-center">
                                                <span class="text-sm font-medium text-gray-900 dark:text-white mr-2">
                                                    {{ $confirmedVolunteers }}/{{ $totalVolunteers }}
                                                </span>
                                                @if($pendingVolunteers > 0)
                                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium bg-orange-100 dark:bg-orange-900 text-orange-800 dark:text-orange-200">
                                                        {{ $pendingVolunteers }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center justify-end space-x-2 pt-4 border-t border-gray-100 dark:border-gray-700">
                                        <a href="{{ route('admin.trainings.show', $training) }}" 
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 hover:bg-blue-50 dark:hover:bg-blue-900/50 rounded-lg transition-all duration-200">
                                            <i class="fas fa-eye mr-1"></i>
                                            Lihat
                                        </a>
                                        
                                        <a href="{{ route('admin.trainings.show', $training) }}#volunteers" 
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 dark:hover:text-emerald-300 hover:bg-emerald-50 dark:hover:bg-emerald-900/50 rounded-lg transition-all duration-200">
                                            <i class="fas fa-users mr-1"></i>
                                            Relawan
                                        </a>
                                        
                                        <a href="{{ route('admin.trainings.edit', $training) }}" 
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 hover:bg-indigo-50 dark:hover:bg-indigo-900/50 rounded-lg transition-all duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </a>
                                        
                                        <form method="POST" action="{{ route('admin.trainings.destroy', $training) }}" 
                                              class="inline" 
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelatihan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 hover:bg-red-50 dark:hover:bg-red-900/50 rounded-lg transition-all duration-200">
                                                <i class="fas fa-trash mr-1"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        @if($trainings->hasPages())
                            <div class="bg-white dark:bg-gray-800 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                                {{ $trainings->links() }}
                            </div>
                        @endif

                    @else
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="mx-auto h-24 w-24 text-gray-400 dark:text-gray-600 mb-6">
                                <i class="fas fa-chalkboard-teacher text-6xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum ada pelatihan</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                                Mulai dengan membuat pelatihan pertama untuk program literasi Anda.
                            </p>
                            <a href="{{ route('admin.trainings.create') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-xl transition-all duration-200 shadow-lg hover:shadow-xl">
                                <i class="fas fa-plus mr-2"></i>
                                Buat Pelatihan Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Initialize Flatpickr for date inputs
        document.addEventListener('DOMContentLoaded', function() {
            // Date From Picker
            flatpickr("#date_from", {
                dateFormat: "Y-m-d",
                allowInput: true,
                placeholder: "Pilih tanggal mulai...",
                locale: "id"
            });

            // Date To Picker
            flatpickr("#date_to", {
                dateFormat: "Y-m-d",
                allowInput: true,
                placeholder: "Pilih tanggal berakhir...",
                locale: "id"
            });
        });

        // Toggle filter form on mobile
        function toggleFilterForm() {
            const filterForm = document.getElementById('filter-form');
            const filterIcon = document.getElementById('filter-icon');
            
            if (filterForm.classList.contains('hidden')) {
                filterForm.classList.remove('hidden');
                filterIcon.classList.remove('fa-chevron-down');
                filterIcon.classList.add('fa-chevron-up');
            } else {
                filterForm.classList.add('hidden');
                filterIcon.classList.remove('fa-chevron-up');
                filterIcon.classList.add('fa-chevron-down');
            }
        }

        // Auto submit form when filter changes
        document.addEventListener('DOMContentLoaded', function() {
            const filterInputs = document.querySelectorAll('#filter-form select, #filter-form input[name="search"]');
            
            filterInputs.forEach(input => {
                input.addEventListener('change', function() {
                    // Auto submit form after a short delay for better UX
                    setTimeout(() => {
                        document.getElementById('filter-form').submit();
                    }, 300);
                });
            });

            // Handle search input with debounce
            const searchInput = document.querySelector('input[name="search"]');
            if (searchInput) {
                let searchTimeout;
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        document.getElementById('filter-form').submit();
                    }, 1000); // 1 second debounce
                });
            }
        });
    </script>
    @endpush
</x-layouts.admin>
