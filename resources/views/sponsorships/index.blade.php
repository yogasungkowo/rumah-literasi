<x-layouts.app>
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                    Sponsorship Management
                </h1>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto mb-6">
                    Kelola dan pantau semua proposal sponsorship Anda dalam satu tempat
                </p>
                <a href="{{ route('sponsorships.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <i class="fas fa-plus mr-2"></i>
                    Buat Proposal Baru
                </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 text-green-800 dark:text-green-200 px-4 py-3 rounded-lg" role="alert">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-600 mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Filter Tabs -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow mb-6 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-3">Filter Status</h3>
                    <div class="flex flex-wrap gap-2">
                        <button class="filter-tab active px-4 py-2 rounded-lg font-medium transition-colors border" data-status="all">
                            Semua
                        </button>
                        <button class="filter-tab px-4 py-2 rounded-lg font-medium transition-colors border" data-status="pending">
                            Pending
                        </button>
                        <button class="filter-tab px-4 py-2 rounded-lg font-medium transition-colors border" data-status="approved">
                            Disetujui
                        </button>
                        <button class="filter-tab px-4 py-2 rounded-lg font-medium transition-colors border" data-status="active">
                            Aktif
                        </button>
                        <button class="filter-tab px-4 py-2 rounded-lg font-medium transition-colors border" data-status="completed">
                            Selesai
                        </button>
                        <button class="filter-tab px-4 py-2 rounded-lg font-medium transition-colors border" data-status="rejected">
                            Ditolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sponsorship List -->
            @if($sponsorships->count() > 0)
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($sponsorships as $sponsorship)
                        <div class="sponsorship-item bg-white dark:bg-gray-800 rounded-lg shadow hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700" 
                             data-status="{{ $sponsorship->status }}">
                            <!-- Card Header -->
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">
                                            {{ $sponsorship->company_name }}
                                        </h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $sponsorship->contact_person }}
                                        </p>
                                    </div>
                                    <span class="px-3 py-1 text-xs font-medium rounded-full
                                        @if($sponsorship->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                        @elseif($sponsorship->status === 'approved') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300
                                        @elseif($sponsorship->status === 'active') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                        @elseif($sponsorship->status === 'completed') bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300
                                        @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                        @endif">
                                        {{ $sponsorship->status_label }}
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="px-6 py-4">
                                <div class="space-y-3">
                                    <!-- Amount -->
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Nominal:</span>
                                        <span class="text-lg font-bold text-blue-600 dark:text-blue-400">
                                            Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <!-- Duration -->
                                    @if($sponsorship->start_date && $sponsorship->end_date)
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Durasi:</span>
                                            <span class="text-sm text-gray-900 dark:text-gray-100">
                                                {{ $sponsorship->start_date->format('M Y') }} - {{ $sponsorship->end_date->format('M Y') }}
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Description -->
                                    <div>
                                        <span class="text-sm font-medium text-gray-600 dark:text-gray-400 block mb-1">Deskripsi:</span>
                                        <p class="text-sm text-gray-700 dark:text-gray-300 line-clamp-3">
                                            {{ $sponsorship->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-600">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        @if($sponsorship->status === 'pending')
                                            <a href="{{ route('sponsorships.edit', $sponsorship) }}" 
                                               class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-medium transition-colors">
                                                <i class="fas fa-edit mr-1"></i>Edit
                                            </a>
                                        @endif
                                        <a href="{{ route('sponsorships.show', $sponsorship) }}" 
                                           class="text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 font-medium transition-colors">
                                            <i class="fas fa-eye mr-1"></i>Detail
                                        </a>
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $sponsorship->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-4xl text-gray-400 dark:text-gray-500"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Belum Ada Proposal</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-8">Mulai dengan membuat proposal sponsorship pertama Anda</p>
                    <a href="{{ route('sponsorships.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        Buat Proposal Baru
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.filter-tab {
    background: white;
    color: #6b7280;
    border-color: #d1d5db;
}

.filter-tab.active {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
}

.filter-tab:hover:not(.active) {
    background: #f3f4f6;
    border-color: #9ca3af;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.dark .filter-tab {
    background: #374151;
    color: #d1d5db;
    border: 1px solid #6b7280;
}

.dark .filter-tab.active {
    background: #2563eb;
    color: white;
    border-color: #2563eb;
}

.dark .filter-tab:hover:not(.active) {
    background: #4b5563;
    color: #d1d5db;
    border: 1px solid #6b7280;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterTabs = document.querySelectorAll('.filter-tab');
    const sponsorshipItems = document.querySelectorAll('.sponsorship-item');

    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const status = this.dataset.status;
            
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            sponsorshipItems.forEach(item => {
                if (status === 'all' || item.dataset.status === status) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
</x-layouts.app>
