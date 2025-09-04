<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto">
                <!-- Header -->
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                        <i class="fas fa-file-contract text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        Detail Proposal Sponsorship
                    </h1>
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-300">{{ $sponsorship->company_name }}</p>

                    <div class="flex items-center justify-center space-x-3 mt-4">
                        @if ($sponsorship->status === 'pending')
                            <a href="{{ route('sponsorships.edit', $sponsorship) }}"
                                class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors font-medium">
                                <i class="fas fa-edit mr-2"></i>Edit Proposal
                            </a>
                        @endif
                        <a href="{{ route('sponsorships.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors font-medium">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar
                        </a>
                    </div>
                </div>

                <!-- Status Banner -->
                <div
                    class="mb-6 p-4 rounded-lg border-l-4 
                @if ($sponsorship->status === 'pending') bg-yellow-50 dark:bg-yellow-900/20 border-yellow-400
                @elseif($sponsorship->status === 'approved') bg-blue-50 dark:bg-blue-900/20 border-blue-400
                @elseif($sponsorship->status === 'active') bg-green-50 dark:bg-green-900/20 border-green-400
                @elseif($sponsorship->status === 'completed') bg-gray-50 dark:bg-gray-800/20 border-gray-400
                @else bg-red-50 dark:bg-red-900/20 border-red-400 @endif">
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center mr-3
                        @if ($sponsorship->status === 'pending') bg-yellow-100 dark:bg-yellow-800/30
                        @elseif($sponsorship->status === 'approved') bg-blue-100 dark:bg-blue-800/30
                        @elseif($sponsorship->status === 'active') bg-green-100 dark:bg-green-800/30
                        @elseif($sponsorship->status === 'completed') bg-gray-100 dark:bg-gray-700
                        @else bg-red-100 dark:bg-red-800/30 @endif">
                            @if ($sponsorship->status === 'pending')
                                <i class="fas fa-clock text-yellow-600 dark:text-yellow-400"></i>
                            @elseif($sponsorship->status === 'approved')
                                <i class="fas fa-check text-blue-600 dark:text-blue-400"></i>
                            @elseif($sponsorship->status === 'active')
                                <i class="fas fa-play-circle text-green-600 dark:text-green-400"></i>
                            @elseif($sponsorship->status === 'completed')
                                <i class="fas fa-check-circle text-gray-600 dark:text-gray-400"></i>
                            @else
                                <i class="fas fa-times-circle text-red-600 dark:text-red-400"></i>
                            @endif
                        </div>
                        <div>
                            <h3
                                class="text-lg font-semibold mb-1
                            @if ($sponsorship->status === 'pending') text-yellow-800 dark:text-yellow-200
                            @elseif($sponsorship->status === 'approved') text-blue-800 dark:text-blue-200
                            @elseif($sponsorship->status === 'active') text-green-800 dark:text-green-200
                            @elseif($sponsorship->status === 'completed') text-gray-800 dark:text-gray-200
                            @else text-red-800 dark:text-red-200 @endif">
                                Status: {{ $sponsorship->status_label }}
                            </h3>
                            <p
                                class="text-sm
                            @if ($sponsorship->status === 'pending') text-yellow-700 dark:text-yellow-300
                            @elseif($sponsorship->status === 'approved') text-blue-700 dark:text-blue-300
                            @elseif($sponsorship->status === 'active') text-green-700 dark:text-green-300
                            @elseif($sponsorship->status === 'completed') text-gray-700 dark:text-gray-300
                            @else text-red-700 dark:text-red-300 @endif">
                                @if ($sponsorship->status === 'pending')
                                    Proposal sedang menunggu review dari admin
                                @elseif($sponsorship->status === 'approved')
                                    Proposal telah disetujui, menunggu aktivasi
                                @elseif($sponsorship->status === 'active')
                                    Sponsorship sedang berjalan
                                @elseif($sponsorship->status === 'completed')
                                    Sponsorship telah selesai
                                @else
                                    Proposal ditolak - {{ $sponsorship->rejection_reason }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-4 gap-6">
                    <!-- Main Content -->
                    <div class="xl:col-span-3 space-y-6">
                        <!-- Company Information -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                            <div class="bg-blue-600 px-6 py-4">
                                <h2 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-building mr-2"></i>Informasi Perusahaan
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Nama Perusahaan</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->company_name }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Kontak Person</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->contact_person }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Telepon</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->contact_phone }}</p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Email</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->contact_email }}</p>
                                    </div>
                                    <div class="md:col-span-2">
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Alamat</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->company_address }}</p>
                                    </div>
                                    @if ($sponsorship->website)
                                        <div class="md:col-span-2">
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Website</h4>
                                            <a href="{{ $sponsorship->website }}" target="_blank"
                                                class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                                                {{ $sponsorship->website }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Sponsorship Details -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                            <div class="bg-orange-600 px-6 py-4">
                                <h2 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-handshake mr-2"></i>Detail Sponsorship
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Jenis Sponsorship</h4>
                                        <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $sponsorship->sponsorship_type_label }}
                                        </p>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Nominal</h4>
                                        <p class="text-2xl font-bold text-orange-600 dark:text-orange-400">
                                            Rp {{ number_format($sponsorship->amount, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    @if ($sponsorship->start_date)
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Tanggal Mulai</h4>
                                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ $sponsorship->start_date->format('d M Y') }}
                                            </p>
                                        </div>
                                    @endif
                                    @if ($sponsorship->end_date)
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Tanggal Selesai</h4>
                                            <p class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ $sponsorship->end_date->format('d M Y') }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-6">
                                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Deskripsi Proposal</h4>
                                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                                        <p class="text-gray-900 dark:text-gray-100 leading-relaxed">{{ $sponsorship->description }}</p>
                                    </div>
                                </div>

                                @if ($sponsorship->benefits_requested && count($sponsorship->benefits_requested) > 0)
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Manfaat yang Diharapkan</h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($sponsorship->benefits_requested as $benefit)
                                                <span
                                                    class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300 rounded-full">
                                                    {{ $benefit }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Files -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                            <div class="bg-green-600 px-6 py-4">
                                <h2 class="text-xl font-semibold text-white flex items-center">
                                    <i class="fas fa-paperclip mr-2"></i>Lampiran
                                </h2>
                            </div>
                            <div class="p-6">
                                <div class="space-y-3">
                                    @if ($sponsorship->proposal_file)
                                        <div
                                            class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg hover:border-red-300 dark:hover:border-red-500 transition-colors bg-red-50 dark:bg-red-900/10">
                                            <div class="flex items-center">
                                                <i class="fas fa-file-pdf text-red-600 text-xl mr-3"></i>
                                                <div>
                                                    <p class="font-medium text-gray-900 dark:text-gray-800">Proposal File</p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">PDF Document</p>
                                                </div>
                                            </div>
                                            <a href="{{ $sponsorship->proposal_url }}" target="_blank"
                                                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                                <i class="fas fa-download mr-1"></i>Download
                                            </a>
                                        </div>
                                    @endif

                                    @if ($sponsorship->company_profile)
                                        <div
                                            class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-600 rounded-lg hover:border-blue-300 dark:hover:border-blue-500 transition-colors bg-blue-50 dark:bg-blue-900/10">
                                            <div class="flex items-center">
                                                <i class="fas fa-file-alt text-blue-600 text-xl mr-3"></i>
                                                <div>
                                                    <p class="font-medium text-gray-900 dark:text-gray-100">Company Profile</p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">PDF Document</p>
                                                </div>
                                            </div>
                                            <a href="{{ $sponsorship->company_profile_url }}" target="_blank"
                                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                                <i class="fas fa-download mr-1"></i>Download
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Timeline -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                            <div class="bg-purple-600 px-4 py-3">
                                <h2 class="text-lg font-semibold text-white flex items-center">
                                    <i class="fas fa-history mr-2"></i>Timeline
                                </h2>
                            </div>
                            <div class="p-4">
                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-paper-plane text-white text-xs"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">Proposal Diajukan</h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">{{ $sponsorship->created_at->format('d M Y H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    @if ($sponsorship->updated_at > $sponsorship->created_at)
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-edit text-white text-xs"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">Proposal Diperbarui</h4>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    {{ $sponsorship->updated_at->format('d M Y H:i') }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($sponsorship->verified_at)
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-check text-white text-xs"></i>
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-medium text-gray-900 dark:text-gray-100">Proposal Diverifikasi</h4>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    {{ $sponsorship->verified_at->format('d M Y H:i') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Contact Admin -->
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg border border-purple-200 dark:border-purple-700 p-4">
                            <div class="text-center">
                                <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-question-circle text-white"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-purple-900 dark:text-purple-100 mb-2">Butuh Bantuan?</h3>
                                <p class="text-sm text-purple-700 dark:text-purple-300 mb-3">
                                    Jika Anda memiliki pertanyaan tentang proposal ini, silakan hubungi admin.
                                </p>
                                <a href="mailto:admin@rumahliterasi.org"
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors font-medium">
                                    <i class="fas fa-envelope mr-2"></i>Hubungi Admin
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
