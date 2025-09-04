@php
    $title = 'Sponsorship Management';
    $description = 'Kelola dan review proposal sponsorship dari mitra dan donatur';
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

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-7 gap-4 mb-8">
                <div class="bg-blue-500 dark:bg-blue-600 rounded-2xl p-4 text-white shadow-lg border border-blue-600 dark:border-blue-500 hover:bg-blue-600 dark:hover:bg-blue-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-blue-100 dark:text-blue-200 text-xs font-medium truncate">Total</p>
                            <p class="text-xl font-bold truncate text-white">{{ number_format($stats['total']) }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-chart-bar text-2xl text-blue-200 dark:text-blue-300"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-orange-500 dark:bg-orange-600 rounded-2xl p-4 text-white shadow-lg border border-orange-600 dark:border-orange-500 hover:bg-orange-600 dark:hover:bg-orange-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-orange-100 dark:text-orange-200 text-xs font-medium truncate">Pending</p>
                            <p class="text-xl font-bold truncate text-white">{{ number_format($stats['pending']) }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-clock text-2xl text-orange-200 dark:text-orange-300"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-indigo-500 dark:bg-indigo-600 rounded-2xl p-4 text-white shadow-lg border border-indigo-600 dark:border-indigo-500 hover:bg-indigo-600 dark:hover:bg-indigo-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-indigo-100 dark:text-indigo-200 text-xs font-medium truncate">Approved</p>
                            <p class="text-xl font-bold truncate text-white">{{ number_format($stats['approved']) }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-check text-2xl text-indigo-200 dark:text-indigo-300"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-green-500 dark:bg-green-600 rounded-2xl p-4 text-white shadow-lg border border-green-600 dark:border-green-500 hover:bg-green-600 dark:hover:bg-green-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-green-100 dark:text-green-200 text-xs font-medium truncate">Active</p>
                            <p class="text-xl font-bold truncate text-white">{{ number_format($stats['active']) }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-play text-2xl text-green-200 dark:text-green-300"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-500 dark:bg-gray-600 rounded-2xl p-4 text-white shadow-lg border border-gray-600 dark:border-gray-500 hover:bg-gray-600 dark:hover:bg-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-100 dark:text-gray-200 text-xs font-medium truncate">Completed</p>
                            <p class="text-xl font-bold truncate text-white">{{ number_format($stats['completed']) }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-flag-checkered text-2xl text-gray-200 dark:text-gray-300"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-red-500 dark:bg-red-600 rounded-2xl p-4 text-white shadow-lg border border-red-600 dark:border-red-500 hover:bg-red-600 dark:hover:bg-red-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-red-100 dark:text-red-200 text-xs font-medium truncate">Rejected</p>
                            <p class="text-xl font-bold truncate text-white">{{ number_format($stats['rejected']) }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-times text-2xl text-red-200 dark:text-red-300"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-purple-500 dark:bg-purple-600 rounded-2xl p-4 text-white shadow-lg border border-purple-600 dark:border-purple-500 hover:bg-purple-600 dark:hover:bg-purple-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-200 cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 min-w-0">
                            <p class="text-purple-100 dark:text-purple-200 text-xs font-medium truncate">Total Value</p>
                            <p class="text-lg font-bold truncate text-white">{{ 'Rp ' . number_format($stats['total_amount'], 0, ',', '.') }}</p>
                        </div>
                        <div class="ml-3 flex-shrink-0">
                            <i class="fas fa-money-bill-wave text-xl text-purple-200 dark:text-purple-300"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Search -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg mb-8 overflow-hidden border border-gray-200 dark:border-gray-700">
                <div class="bg-gray-600 px-8 py-6">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-filter mr-3"></i>Filter & Search
                    </h3>
                </div>
                <div class="p-8">
                    <form method="GET" action="{{ route('admin.sponsorships.index') }}" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <!-- Search -->
                            <div class="lg:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-search mr-2"></i>Search
                                </label>
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Cari nama perusahaan, kontak, atau email..."
                                       class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 outline-none transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>

                            <!-- Status Filter -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-flag mr-2"></i>Status
                                </label>
                                <select name="status" class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 outline-none transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                                    <option value="">Semua Status</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>

                            <!-- Amount Range -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                    <i class="fas fa-money-bill-wave mr-2"></i>Min Amount
                                </label>
                                <input type="number" name="min_amount" value="{{ request('min_amount') }}" 
                                       placeholder="Rp 0"
                                       class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-xl focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800 outline-none transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <button type="submit" 
                                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    <i class="fas fa-search mr-2"></i>Filter
                                </button>
                                <a href="{{ route('admin.sponsorships.index') }}" 
                                   class="inline-flex items-center px-6 py-3 border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 font-medium">
                                    <i class="fas fa-undo mr-2"></i>Reset
                                </a>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-info-circle mr-1"></i>
                                {{ $sponsorships->total() }} sponsorship ditemukan
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sponsorships Table -->
            @if($sponsorships->count() > 0)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Company</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Contact</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Type & Amount</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-200 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-200 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($sponsorships as $sponsorship)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                                                    <i class="fas fa-building text-white text-sm"></i>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $sponsorship->company_name }}</div>
                                                    @if($sponsorship->website)
                                                        <div class="text-xs text-blue-600 dark:text-blue-400">
                                                            <a href="{{ $sponsorship->website }}" target="_blank" class="hover:underline">
                                                                <i class="fas fa-globe mr-1"></i>{{ Str::limit($sponsorship->website, 30) }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ $sponsorship->contact_person }}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->contact_email }}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->contact_phone }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->sponsorship_type_label }}</div>
                                            <div class="text-sm font-bold text-green-600 dark:text-green-400">Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                                @if($sponsorship->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-300
                                                @elseif($sponsorship->status === 'approved') bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300
                                                @elseif($sponsorship->status === 'active') bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300
                                                @elseif($sponsorship->status === 'completed') bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300
                                                @else bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300
                                                @endif">
                                                @if($sponsorship->status === 'pending')
                                                    <i class="fas fa-clock mr-1"></i>
                                                @elseif($sponsorship->status === 'approved')
                                                    <i class="fas fa-check mr-1"></i>
                                                @elseif($sponsorship->status === 'active')
                                                    <i class="fas fa-play mr-1"></i>
                                                @elseif($sponsorship->status === 'completed')
                                                    <i class="fas fa-flag-checkered mr-1"></i>
                                                @else
                                                    <i class="fas fa-times mr-1"></i>
                                                @endif
                                                {{ $sponsorship->status_label }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ $sponsorship->created_at->format('d M Y') }}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->created_at->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('admin.sponsorships.show', $sponsorship) }}" 
                                                   class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-medium transition-colors duration-200">
                                                    <i class="fas fa-eye mr-1"></i>View
                                                </a>
                                                
                                                @if($sponsorship->status === 'pending')
                                                    <button onclick="showApproveModal({{ $sponsorship->id }})" 
                                                            class="inline-flex items-center px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded-lg text-xs font-medium transition-colors duration-200">
                                                        <i class="fas fa-check mr-1"></i>Approve
                                                    </button>
                                                    <button onclick="showRejectModal({{ $sponsorship->id }})" 
                                                            class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg text-xs font-medium transition-colors duration-200">
                                                        <i class="fas fa-times mr-1"></i>Reject
                                                    </button>
                                                @elseif($sponsorship->status === 'approved')
                                                    <button onclick="showActivateModal({{ $sponsorship->id }})" 
                                                            class="inline-flex items-center px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-xs font-medium transition-colors duration-200">
                                                        <i class="fas fa-play mr-1"></i>Activate
                                                    </button>
                                                @elseif($sponsorship->status === 'active')
                                                    <button onclick="showCompleteModal({{ $sponsorship->id }})" 
                                                            class="inline-flex items-center px-3 py-1 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-xs font-medium transition-colors duration-200">
                                                        <i class="fas fa-flag-checkered mr-1"></i>Complete
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Enhanced Pagination -->
                    <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                        {{ $sponsorships->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <!-- Enhanced Empty State -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg text-center py-16 border border-gray-200 dark:border-gray-700">
                    <div class="w-32 h-32 bg-purple-100 dark:bg-purple-900/20 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="fas fa-handshake text-purple-500 dark:text-purple-400 text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Tidak Ada Data Sponsorship</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto leading-relaxed">
                        Belum ada proposal sponsorship yang masuk. Data akan muncul ketika ada pengajuan baru dari mitra.
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modals -->
<!-- Approve Modal -->
<div id="approveModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full mx-4">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-green-600 dark:text-green-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Approve Sponsorship</h3>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Apakah Anda yakin ingin menyetujui proposal sponsorship ini?</p>
        </div>
        <form id="approveForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Admin Notes (Opsional)</label>
                <textarea name="admin_notes" rows="3" 
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 dark:focus:ring-green-400 focus:border-transparent outline-none transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                          placeholder="Tambahkan catatan admin..."></textarea>
            </div>
            <div class="flex items-center space-x-4">
                <button type="button" onclick="hideApproveModal()" 
                        class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl transition-colors duration-200">
                    Approve
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full mx-4">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-red-100 dark:bg-red-900/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-times text-red-600 dark:text-red-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Reject Sponsorship</h3>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Berikan alasan penolakan proposal sponsorship ini.</p>
        </div>
        <form id="rejectForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Alasan Penolakan *</label>
                <textarea name="rejection_reason" rows="3" required
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-transparent outline-none transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                          placeholder="Jelaskan alasan penolakan..."></textarea>
            </div>
            <div class="flex items-center space-x-4">
                <button type="button" onclick="hideRejectModal()" 
                        class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors duration-200">
                    Reject
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Activate Modal -->
<div id="activateModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full mx-4">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-play text-indigo-600 dark:text-indigo-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Activate Sponsorship</h3>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Sponsorship akan diaktifkan dan dimulai sekarang.</p>
        </div>
        <form id="activateForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="flex items-center space-x-4">
                <button type="button" onclick="hideActivateModal()" 
                        class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition-colors duration-200">
                    Activate
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Complete Modal -->
<div id="completeModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 max-w-md w-full mx-4">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-flag-checkered text-purple-600 dark:text-purple-400 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Complete Sponsorship</h3>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Tandai sponsorship ini sebagai selesai.</p>
        </div>
        <form id="completeForm" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Completion Notes (Opsional)</label>
                <textarea name="completion_notes" rows="3" 
                          class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-transparent outline-none transition-all duration-300 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                          placeholder="Tambahkan catatan penyelesaian..."></textarea>
            </div>
            <div class="flex items-center space-x-4">
                <button type="button" onclick="hideCompleteModal()" 
                        class="flex-1 px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Batal
                </button>
                <button type="submit" 
                        class="flex-1 px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl transition-colors duration-200">
                    Complete
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script>
// Modal functions
function showApproveModal(sponsorshipId) {
    document.getElementById('approveForm').action = `/admin/sponsorships/${sponsorshipId}/approve`;
    document.getElementById('approveModal').classList.remove('hidden');
}

function hideApproveModal() {
    document.getElementById('approveModal').classList.add('hidden');
}

function showRejectModal(sponsorshipId) {
    document.getElementById('rejectForm').action = `/admin/sponsorships/${sponsorshipId}/reject`;
    document.getElementById('rejectModal').classList.remove('hidden');
}

function hideRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
}

function showActivateModal(sponsorshipId) {
    document.getElementById('activateForm').action = `/admin/sponsorships/${sponsorshipId}/activate`;
    document.getElementById('activateModal').classList.remove('hidden');
}

function hideActivateModal() {
    document.getElementById('activateModal').classList.add('hidden');
}

function showCompleteModal(sponsorshipId) {
    document.getElementById('completeForm').action = `/admin/sponsorships/${sponsorshipId}/complete`;
    document.getElementById('completeModal').classList.remove('hidden');
}

function hideCompleteModal() {
    document.getElementById('completeModal').classList.add('hidden');
}

// Close modals on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        hideApproveModal();
        hideRejectModal();
        hideActivateModal();
        hideCompleteModal();
    }
});

// Close modals on background click
document.querySelectorAll('[id$="Modal"]').forEach(modal => {
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
});
</script>
</x-layouts.admin>
