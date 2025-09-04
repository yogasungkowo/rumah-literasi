@php
    $title = 'Review Proposal Sponsorship';
    $description = 'Detail dan review proposal sponsorship dari ' . $sponsorship->company_name;
@endphp

<x-layouts.admin :title="$title" :description="$description">
<!-- Page Background -->
<div class="min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
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

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('admin.sponsorships.index') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                </a>
            </div>

            <!-- Enhanced Status Banner -->
            <div class="mb-8 p-6 rounded-2xl border-l-4 shadow-lg
                @if($sponsorship->status === 'pending') bg-yellow-50 dark:bg-yellow-900/20 border-yellow-500
                @elseif($sponsorship->status === 'approved') bg-blue-50 dark:bg-blue-900/20 border-blue-500
                @elseif($sponsorship->status === 'active') bg-green-50 dark:bg-green-900/20 border-green-500
                @elseif($sponsorship->status === 'completed') bg-gray-50 dark:bg-gray-800/20 border-gray-500
                @else bg-red-50 dark:bg-red-900/20 border-red-500
                @endif">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center mr-4
                            @if($sponsorship->status === 'pending') bg-yellow-100 dark:bg-yellow-800/30
                            @elseif($sponsorship->status === 'approved') bg-blue-100 dark:bg-blue-800/30
                            @elseif($sponsorship->status === 'active') bg-green-100 dark:bg-green-800/30
                            @elseif($sponsorship->status === 'completed') bg-gray-100 dark:bg-gray-700
                            @else bg-red-100 dark:bg-red-800/30
                            @endif">
                            @if($sponsorship->status === 'pending')
                                <i class="fas fa-clock text-yellow-600 dark:text-yellow-400 text-xl"></i>
                            @elseif($sponsorship->status === 'approved')
                                <i class="fas fa-check text-blue-600 dark:text-blue-400 text-xl"></i>
                            @elseif($sponsorship->status === 'active')
                                <i class="fas fa-play-circle text-green-600 dark:text-green-400 text-xl"></i>
                            @elseif($sponsorship->status === 'completed')
                                <i class="fas fa-check-circle text-gray-600 dark:text-gray-400 text-xl"></i>
                            @else
                                <i class="fas fa-times-circle text-red-600 dark:text-red-400 text-xl"></i>
                            @endif
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-1
                                @if($sponsorship->status === 'pending') text-yellow-800 dark:text-yellow-200
                                @elseif($sponsorship->status === 'approved') text-blue-800 dark:text-blue-200
                                @elseif($sponsorship->status === 'active') text-green-800 dark:text-green-200
                                @elseif($sponsorship->status === 'completed') text-gray-800 dark:text-gray-200
                                @else text-red-800 dark:text-red-200
                                @endif">
                                Status: {{ $sponsorship->status_label }}
                            </h3>
                            <p class="text-sm
                                @if($sponsorship->status === 'pending') text-yellow-700 dark:text-yellow-300
                                @elseif($sponsorship->status === 'approved') text-blue-700 dark:text-blue-300
                                @elseif($sponsorship->status === 'active') text-green-700 dark:text-green-300
                                @elseif($sponsorship->status === 'completed') text-gray-700 dark:text-gray-300
                                @else text-red-700 dark:text-red-300
                                @endif">
                                @if($sponsorship->status === 'pending')
                                    Proposal menunggu review admin
                                @elseif($sponsorship->status === 'approved')
                                    Proposal telah disetujui, siap untuk diaktifkan
                                @elseif($sponsorship->status === 'active')
                                    Sponsorship sedang berjalan
                                @elseif($sponsorship->status === 'completed')
                                    Sponsorship telah selesai
                                @else
                                    Proposal ditolak: {{ $sponsorship->rejection_reason }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-3">
                        @if($sponsorship->status === 'pending')
                            <button onclick="showApproveModal({{ $sponsorship->id }})" 
                                    class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-xl transition-colors duration-200 font-medium shadow-md hover:shadow-lg">
                                <i class="fas fa-check mr-2"></i>Approve
                            </button>
                            <button onclick="showRejectModal({{ $sponsorship->id }})" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl transition-colors duration-200 font-medium shadow-md hover:shadow-lg">
                                <i class="fas fa-times mr-2"></i>Reject
                            </button>
                        @elseif($sponsorship->status === 'approved')
                            <button onclick="showActivateModal({{ $sponsorship->id }})" 
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition-colors duration-200 font-medium shadow-md hover:shadow-lg">
                                <i class="fas fa-play mr-2"></i>Activate
                            </button>
                        @elseif($sponsorship->status === 'active')
                            <button onclick="showCompleteModal({{ $sponsorship->id }})" 
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl transition-colors duration-200 font-medium shadow-md hover:shadow-lg">
                                <i class="fas fa-flag-checkered mr-2"></i>Complete
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
                <!-- Main Content -->
                <div class="xl:col-span-3 space-y-8">
                    <!-- Company Information -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="bg-blue-600 px-8 py-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <i class="fas fa-building mr-3"></i>Informasi Perusahaan
                            </h2>
                        </div>
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Nama Perusahaan</h4>
                                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->company_name }}</p>
                                </div>
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kontak Person</h4>
                                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->contact_person }}</p>
                                </div>
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Telepon</h4>
                                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                        <i class="fas fa-phone text-blue-500 mr-2"></i>
                                        <a href="tel:{{ $sponsorship->contact_phone }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                            {{ $sponsorship->contact_phone }}
                                        </a>
                                    </p>
                                </div>
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Email</h4>
                                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                        <i class="fas fa-envelope text-purple-500 mr-2"></i>
                                        <a href="mailto:{{ $sponsorship->contact_email }}" class="hover:text-purple-600 dark:hover:text-purple-400">
                                            {{ $sponsorship->contact_email }}
                                        </a>
                                    </p>
                                </div>
                                <div class="md:col-span-2 space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Alamat</h4>
                                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-start">
                                        <i class="fas fa-map-marker-alt text-green-500 mr-2 mt-1"></i>{{ $sponsorship->company_address }}
                                    </p>
                                </div>
                                @if($sponsorship->website)
                                    <div class="md:col-span-2 space-y-1">
                                        <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Website</h4>
                                        <p class="text-lg font-medium">
                                            <a href="{{ $sponsorship->website }}" target="_blank" 
                                               class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-200 underline flex items-center">
                                                <i class="fas fa-globe text-blue-500 mr-2"></i>{{ $sponsorship->website }}
                                            </a>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Sponsorship Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="bg-orange-600 px-8 py-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <i class="fas fa-handshake mr-3"></i>Detail Sponsorship
                            </h2>
                        </div>
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Jenis Sponsorship</h4>
                                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->sponsorship_type_label }}</p>
                                </div>
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Nominal</h4>
                                    <p class="text-3xl font-bold text-orange-600 dark:text-orange-400">
                                        Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}
                                    </p>
                                </div>
                                @if($sponsorship->start_date)
                                    <div class="space-y-1">
                                        <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Tanggal Mulai</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                            <i class="fas fa-calendar-plus text-green-500 mr-2"></i>{{ $sponsorship->start_date->format('d F Y') }}
                                        </p>
                                    </div>
                                @endif
                                @if($sponsorship->end_date)
                                    <div class="space-y-1">
                                        <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Tanggal Selesai</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100 flex items-center">
                                            <i class="fas fa-calendar-check text-red-500 mr-2"></i>{{ $sponsorship->end_date->format('d F Y') }}
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <div class="space-y-1 mb-8">
                                <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Deskripsi Proposal</h4>
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6">
                                    <p class="text-gray-900 dark:text-gray-100 leading-relaxed text-lg">{{ $sponsorship->description }}</p>
                                </div>
                            </div>

                            @if($sponsorship->benefits_requested && count($sponsorship->benefits_requested) > 0)
                                <div class="space-y-1">
                                    <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Manfaat yang Diharapkan</h4>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach($sponsorship->benefits_requested as $benefit)
                                            <span class="inline-flex items-center px-4 py-2 bg-purple-100 dark:bg-purple-900/20 text-purple-800 dark:text-purple-200 text-sm font-medium rounded-xl border border-purple-200 dark:border-purple-700">
                                                <i class="fas fa-star text-yellow-500 mr-2"></i>{{ $sponsorship->getBenefitLabel($benefit) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Files -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="bg-emerald-600 px-8 py-6">
                            <h2 class="text-2xl font-bold text-white flex items-center">
                                <i class="fas fa-paperclip mr-3"></i>Lampiran
                            </h2>
                        </div>
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @if($sponsorship->proposal_file)
                                    <div class="group relative overflow-hidden rounded-2xl border-2 border-red-200 dark:border-red-800 hover:border-red-300 dark:hover:border-red-600 transition-all duration-300 bg-white dark:bg-gray-700 hover:shadow-xl">
                                        <div class="absolute top-0 left-0 w-full h-2 bg-red-500"></div>
                                        <div class="p-6">
                                            <div class="flex items-start justify-between mb-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                                        <i class="fas fa-file-pdf text-white text-2xl"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-1">Proposal File</h4>
                                                        <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                                            <i class="fas fa-file-pdf mr-2 text-red-500"></i>PDF Document
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200">
                                                        <i class="fas fa-star mr-1"></i>Required
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="space-y-3">
                                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                                    <i class="fas fa-info-circle mr-2 text-red-500"></i>
                                                    Proposal lengkap sponsorship
                                                </div>
                                                <a href="{{ $sponsorship->proposal_url }}" target="_blank" 
                                                   class="w-full inline-flex items-center justify-center px-6 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1 group-hover:scale-105">
                                                    <i class="fas fa-download mr-2"></i>Download Proposal
                                                    <i class="fas fa-external-link-alt ml-2 text-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($sponsorship->company_profile)
                                    <div class="group relative overflow-hidden rounded-2xl border-2 border-blue-200 dark:border-blue-800 hover:border-blue-300 dark:hover:border-blue-600 transition-all duration-300 bg-white dark:bg-gray-700 hover:shadow-xl">
                                        <div class="absolute top-0 left-0 w-full h-2 bg-blue-500"></div>
                                        <div class="p-6">
                                            <div class="flex items-start justify-between mb-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                                        <i class="fas fa-building text-white text-2xl"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-1">Company Profile</h4>
                                                        <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                                            <i class="fas fa-file-alt mr-2 text-blue-500"></i>Company Document
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-200">
                                                        <i class="fas fa-building mr-1"></i>Profile
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="space-y-3">
                                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                                    <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                                                    Profil lengkap perusahaan
                                                </div>
                                                <a href="{{ $sponsorship->company_profile_url }}" target="_blank" 
                                                   class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl transition-all duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1 group-hover:scale-105">
                                                    <i class="fas fa-download mr-2"></i>Download Profile
                                                    <i class="fas fa-external-link-alt ml-2 text-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(!$sponsorship->proposal_file && !$sponsorship->company_profile)
                                    <div class="md:col-span-2">
                                        <div class="text-center py-12 bg-gray-50 dark:bg-gray-700/50 rounded-2xl border-2 border-dashed border-gray-300 dark:border-gray-600">
                                            <div class="w-20 h-20 bg-gray-200 dark:bg-gray-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <i class="fas fa-file-upload text-gray-400 dark:text-gray-500 text-2xl"></i>
                                            </div>
                                            <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400 mb-2">Tidak Ada Lampiran</h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-500">Belum ada file yang diunggah untuk proposal ini</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @if($sponsorship->proposal_file || $sponsorship->company_profile)
                                <div class="mt-8 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-shield-alt text-emerald-500 mr-2"></i>
                                        <span class="font-medium">File Security:</span>
                                        <span class="ml-2">Semua file disimpan dengan aman dan hanya dapat diakses oleh admin yang berwenang.</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Admin Notes -->
                    @if($sponsorship->admin_notes || $sponsorship->completion_notes)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div class="bg-indigo-600 px-8 py-6">
                                <h2 class="text-2xl font-bold text-white flex items-center">
                                    <i class="fas fa-sticky-note mr-3"></i>Admin Notes
                                </h2>
                            </div>
                            <div class="p-8 space-y-6">
                                @if($sponsorship->admin_notes)
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">Approval Notes</h4>
                                        <div class="bg-blue-50 dark:bg-blue-900/10 rounded-xl p-4">
                                            <p class="text-gray-900 dark:text-gray-100">{{ $sponsorship->admin_notes }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if($sponsorship->completion_notes)
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-2">Completion Notes</h4>
                                        <div class="bg-green-50 dark:bg-green-900/10 rounded-xl p-4">
                                            <p class="text-gray-900 dark:text-gray-100">{{ $sponsorship->completion_notes }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Enhanced Sidebar -->
                <div class="space-y-6">
                    <!-- Timeline -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                        <div class="bg-purple-600 px-6 py-4">
                            <h2 class="text-xl font-bold text-white flex items-center">
                                <i class="fas fa-history mr-2"></i>Timeline
                            </h2>
                        </div>
                        <div class="p-6">
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                                        <i class="fas fa-paper-plane text-white text-sm"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Proposal Diajukan</h4>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->created_at->format('d M Y, H:i') }}</p>
                                        @if($sponsorship->sponsor)
                                            <p class="text-xs text-blue-600 dark:text-blue-400">oleh {{ $sponsorship->sponsor->name }}</p>
                                        @endif
                                    </div>
                                </div>

                                @if($sponsorship->updated_at > $sponsorship->created_at)
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-edit text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Proposal Diperbarui</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->updated_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if($sponsorship->verified_at)
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-check text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Diverifikasi</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->verified_at->format('d M Y, H:i') }}</p>
                                            @if($sponsorship->verifier)
                                                <p class="text-xs text-green-600 dark:text-green-400">oleh {{ $sponsorship->verifier->name }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                @if($sponsorship->started_at)
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-indigo-500 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-play text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Diaktifkan</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->started_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if($sponsorship->completed_at)
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-10 h-10 bg-gray-500 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-flag-checkered text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">Diselesaikan</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->completed_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Sponsor Information -->
                    @if($sponsorship->sponsor)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                            <div class="bg-pink-600 px-6 py-4">
                                <h2 class="text-xl font-bold text-white flex items-center">
                                    <i class="fas fa-user mr-2"></i>Sponsor Info
                                </h2>
                            </div>
                            <div class="p-6">
                                <!-- Profile Header -->
                                <div class="flex items-center mb-6">
                                    @if($sponsorship->sponsor->avatar)
                                        <div class="w-16 h-16 rounded-full overflow-hidden border-4 border-pink-200 dark:border-pink-700 mr-4 flex-shrink-0">
                                            <img src="{{ asset('storage/' . $sponsorship->sponsor->avatar) }}" 
                                                 alt="{{ $sponsorship->sponsor->name }}"
                                                 class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="w-16 h-16 bg-pink-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0 border-4 border-pink-200 dark:border-pink-700">
                                            <span class="text-white text-xl font-bold">
                                                {{ strtoupper(substr($sponsorship->sponsor->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-lg font-bold text-gray-900 dark:text-gray-100 truncate">{{ $sponsorship->sponsor->name }}</h4>
                                        <p class="text-sm text-pink-600 dark:text-pink-400 flex items-center">
                                            <i class="fas fa-envelope mr-2"></i>{{ $sponsorship->sponsor->email }}
                                        </p>
                                        @if($sponsorship->sponsor->phone)
                                            <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center mt-1">
                                                <i class="fas fa-phone mr-2"></i>{{ $sponsorship->sponsor->phone }}
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Sponsor Details -->
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="bg-pink-50 dark:bg-pink-900/20 rounded-xl p-4 border border-pink-200 dark:border-pink-800">
                                        <div class="grid grid-cols-2 gap-4 text-sm">
                                            <div>
                                                <span class="font-semibold text-gray-700 dark:text-gray-300">Bergabung:</span>
                                                <p class="text-gray-600 dark:text-gray-400 mt-1">
                                                    <i class="fas fa-calendar-alt mr-2 text-pink-500"></i>
                                                    {{ $sponsorship->sponsor->created_at->format('d M Y') }}
                                                </p>
                                            </div>
                                            <div>
                                                <span class="font-semibold text-gray-700 dark:text-gray-300">Role:</span>
                                                <p class="text-gray-600 dark:text-gray-400 mt-1">
                                                    <i class="fas fa-user-tag mr-2 text-pink-500"></i>
                                                    {{ $sponsorship->sponsor->role ?? 'User' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    @if($sponsorship->sponsor->address)
                                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-200 dark:border-gray-600">
                                            <span class="font-semibold text-gray-700 dark:text-gray-300 text-sm">Alamat:</span>
                                            <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">
                                                <i class="fas fa-map-marker-alt mr-2 text-pink-500"></i>
                                                {{ $sponsorship->sponsor->address }}
                                            </p>
                                        </div>
                                    @endif

                                    <!-- Sponsor Stats -->
                                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-4 border border-gray-200 dark:border-gray-600">
                                        <h5 class="font-semibold text-gray-700 dark:text-gray-300 text-sm mb-3">Statistik Sponsor</h5>
                                        <div class="grid grid-cols-2 gap-4 text-sm">
                                            <div class="text-center">
                                                <div class="w-8 h-8 bg-pink-100 dark:bg-pink-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                                                    <i class="fas fa-handshake text-pink-600 dark:text-pink-400 text-sm"></i>
                                                </div>
                                                <p class="font-bold text-gray-900 dark:text-gray-100">
                                                    {{ $sponsorship->sponsor->sponsorships()->count() }}
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400 text-xs">Total Proposal</p>
                                            </div>
                                            <div class="text-center">
                                                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-2">
                                                    <i class="fas fa-check-circle text-green-600 dark:text-green-400 text-sm"></i>
                                                </div>
                                                <p class="font-bold text-gray-900 dark:text-gray-100">
                                                    {{ $sponsorship->sponsor->sponsorships()->whereIn('status', ['active', 'completed'])->count() }}
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400 text-xs">Sukses</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals (Same as index page) -->
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
        <form id="approveForm" method="POST" action="{{ route('admin.sponsorships.approve', $sponsorship) }}">
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
        <form id="rejectForm" method="POST" action="{{ route('admin.sponsorships.reject', $sponsorship) }}">
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
        <form id="activateForm" method="POST" action="{{ route('admin.sponsorships.activate', $sponsorship) }}">
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
        <form id="completeForm" method="POST" action="{{ route('admin.sponsorships.complete', $sponsorship) }}">
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
    document.getElementById('approveModal').classList.remove('hidden');
}

function hideApproveModal() {
    document.getElementById('approveModal').classList.add('hidden');
}

function showRejectModal(sponsorshipId) {
    document.getElementById('rejectModal').classList.remove('hidden');
}

function hideRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
}

function showActivateModal(sponsorshipId) {
    document.getElementById('activateModal').classList.remove('hidden');
}

function hideActivateModal() {
    document.getElementById('activateModal').classList.add('hidden');
}

function showCompleteModal(sponsorshipId) {
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
