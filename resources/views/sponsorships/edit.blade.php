<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-5xl mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-orange-600 rounded-full mb-4">
                        <i class="fas fa-edit text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        Edit Proposal Sponsorship
                    </h1>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Perbarui informasi proposal sponsorship Anda. Pastikan semua data telah diisi dengan benar.
                    </p>
                </div>

                <!-- Form Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-orange-600 p-6">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <i class="fas fa-file-edit mr-2"></i>
                            Perbarui Detail Proposal
                        </h2>
                        <p class="text-orange-100 mt-1">Hanya edit field yang perlu diubah, biarkan yang lain tetap sama</p>
                    </div>

                    <form action="{{ route('sponsorships.update', $sponsorship) }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        @method('PUT')

                        <!-- Step 1: Company Information -->
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    1
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Informasi Perusahaan</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Update informasi perusahaan jika diperlukan</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-building text-orange-500 mr-2"></i>Nama Perusahaan *
                                    </label>
                                    <input type="text" name="company_name" value="{{ old('company_name', $sponsorship->company_name) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('company_name') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="PT. Nama Perusahaan Anda" required>
                                    @error('company_name')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-user text-orange-500 mr-2"></i>Nama Kontak Person *
                                    </label>
                                    <input type="text" name="contact_person" value="{{ old('contact_person', $sponsorship->contact_person) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('contact_person') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="Nama lengkap PIC" required>
                                    @error('contact_person')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-phone text-orange-500 mr-2"></i>Nomor Telepon *
                                    </label>
                                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $sponsorship->contact_phone) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('contact_phone') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="08xxxxxxxxxx" required>
                                    @error('contact_phone')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-envelope text-orange-500 mr-2"></i>Email *
                                    </label>
                                    <input type="email" name="contact_email" value="{{ old('contact_email', $sponsorship->contact_email) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('contact_email') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="email@perusahaan.com" required>
                                    @error('contact_email')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2 space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-map-marker-alt text-orange-500 mr-2"></i>Alamat Perusahaan *
                                    </label>
                                    <textarea name="company_address" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('company_address') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="Jl. Alamat lengkap perusahaan..." required>{{ old('company_address', $sponsorship->company_address) }}</textarea>
                                    @error('company_address')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-globe text-orange-500 mr-2"></i>Website
                                    </label>
                                    <input type="url" name="website" value="{{ old('website', $sponsorship->website) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('website') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="https://www.perusahaan.com">
                                    @error('website')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="relative mb-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200 dark:border-gray-600"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-arrow-down"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Step 2: Sponsorship Details -->
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    2
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Detail Sponsorship</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Update jenis dan besaran sponsorship</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-tags text-orange-500 mr-2"></i>Jenis Sponsorship *
                                    </label>
                                    <select name="sponsorship_type"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('sponsorship_type') border-red-400 dark:border-red-500 @enderror"
                                        required>
                                        <option value="">Pilih jenis sponsorship</option>
                                        <option value="event"
                                            {{ old('sponsorship_type', $sponsorship->sponsorship_type) == 'event' ? 'selected' : '' }}>
                                            🎪 Event/Acara
                                        </option>
                                        <option value="program"
                                            {{ old('sponsorship_type', $sponsorship->sponsorship_type) == 'program' ? 'selected' : '' }}>
                                            📚 Program Literasi
                                        </option>
                                        <option value="facility"
                                            {{ old('sponsorship_type', $sponsorship->sponsorship_type) == 'facility' ? 'selected' : '' }}>
                                            🏢 Fasilitas
                                        </option>
                                        <option value="general"
                                            {{ old('sponsorship_type', $sponsorship->sponsorship_type) == 'general' ? 'selected' : '' }}>
                                            💼 Umum
                                        </option>
                                    </select>
                                    @error('sponsorship_type')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-money-bill-wave text-green-500 mr-2"></i>Nominal Sponsorship (Rp) *
                                    </label>
                                    <input type="number" name="amount" value="{{ old('amount', $sponsorship->amount) }}" min="0"
                                        step="1000"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('amount') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="5000000" required>
                                    @error('amount')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-calendar-alt text-orange-500 mr-2"></i>Tanggal Mulai
                                    </label>
                                    <input type="date" name="start_date"
                                        value="{{ old('start_date', $sponsorship->start_date?->format('Y-m-d')) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('start_date') border-red-400 dark:border-red-500 @enderror">
                                    @error('start_date')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-calendar-check text-orange-500 mr-2"></i>Tanggal Selesai
                                    </label>
                                    <input type="date" name="end_date" value="{{ old('end_date', $sponsorship->end_date?->format('Y-m-d')) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('end_date') border-red-400 dark:border-red-500 @enderror">
                                    @error('end_date')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2 space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-file-alt text-orange-500 mr-2"></i>Deskripsi Proposal *
                                    </label>
                                    <textarea name="description" rows="6"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-orange-500 dark:focus:border-orange-400 focus:ring-2 focus:ring-orange-100 dark:focus:ring-orange-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('description') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="Jelaskan secara detail tujuan, target audience, kegiatan yang akan dilakukan, dan manfaat sponsorship untuk program literasi..."
                                        required>{{ old('description', $sponsorship->description) }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Benefits Section -->
                        <div class="mb-8">
                            <div class="space-y-2 mb-6">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-gift text-yellow-500 mr-2"></i>Manfaat yang Diharapkan
                                </label>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Pilih manfaat yang Anda harapkan dari partnership ini</p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @php
                                    $benefits = [
                                        'logo_placement' => [
                                            'icon' => 'fas fa-image',
                                            'label' => 'Penempatan Logo',
                                            'desc' => 'Logo di materi promosi',
                                        ],
                                        'social_media' => [
                                            'icon' => 'fab fa-instagram',
                                            'label' => 'Promosi Media Sosial',
                                            'desc' => 'Post di social media',
                                        ],
                                        'press_release' => [
                                            'icon' => 'fas fa-newspaper',
                                            'label' => 'Press Release',
                                            'desc' => 'Siaran pers kegiatan',
                                        ],
                                        'event_participation' => [
                                            'icon' => 'fas fa-users',
                                            'label' => 'Partisipasi Event',
                                            'desc' => 'Ikut serta dalam acara',
                                        ],
                                        'branding_materials' => [
                                            'icon' => 'fas fa-palette',
                                            'label' => 'Materi Branding',
                                            'desc' => 'Banner, brosur, dll',
                                        ],
                                        'csr_report' => ['icon' => 'fas fa-chart-line', 'label' => 'Laporan CSR', 'desc' => 'Laporan untuk CSR'],
                                    ];
                                    
                                    // Handle benefits_requested - it might be array or JSON string
                                    $benefitsData = $sponsorship->benefits_requested ?? '[]';
                                    if (is_array($benefitsData)) {
                                        $selectedBenefits = old('benefits_requested', $benefitsData);
                                    } else {
                                        $selectedBenefits = old('benefits_requested', json_decode($benefitsData, true) ?? []);
                                    }
                                @endphp
                                @foreach ($benefits as $key => $benefit)
                                    <div class="relative benefit-item">
                                        <input type="checkbox" name="benefits_requested[]" value="{{ $key }}"
                                            {{ in_array($key, $selectedBenefits) ? 'checked' : '' }} id="benefit_{{ $key }}"
                                            class="benefit-checkbox absolute opacity-0" onchange="toggleBenefit(this)">
                                        <label for="benefit_{{ $key }}"
                                            class="benefit-label flex flex-col items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-yellow-400 dark:hover:border-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition-all bg-white dark:bg-gray-700">
                                            <i class="{{ $benefit['icon'] }} benefit-icon text-2xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                            <span
                                                class="font-medium text-gray-700 dark:text-gray-300 text-sm text-center">{{ $benefit['label'] }}</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400 text-center mt-1">{{ $benefit['desc'] }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="relative mb-8">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200 dark:border-gray-600"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-4 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-arrow-down"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Step 3: File Uploads -->
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 bg-orange-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    3
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Update Lampiran Dokumen</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Upload file baru jika ingin mengganti dokumen yang ada</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Current Proposal File -->
                                @if ($sponsorship->proposal_file)
                                    <div
                                        class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-4 lg:col-span-2">
                                        <div class="flex items-center">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl mr-3"></i>
                                            <div>
                                                <p class="font-medium text-gray-900 dark:text-gray-100">File Proposal Saat Ini:</p>
                                                <a href="{{ Storage::url($sponsorship->proposal_file) }}" target="_blank"
                                                    class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                                                    {{ basename($sponsorship->proposal_file) }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Proposal File Upload -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-file-pdf text-red-500 mr-2"></i>Proposal File Baru (PDF)
                                    </label>
                                    <div class="relative">
                                        <input type="file" name="proposal_file" accept=".pdf" class="hidden" id="proposal_file">
                                        <label for="proposal_file"
                                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-red-400 dark:hover:border-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all bg-white dark:bg-gray-700 @error('proposal_file') border-red-400 dark:border-red-500 bg-red-50 dark:bg-red-900/20 @enderror">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Upload Proposal PDF Baru</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">Maksimal 3MB (opsional)</span>
                                        </label>
                                    </div>
                                    @error('proposal_file')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Company Profile Upload -->
                                <div class="space-y-2">
                                    @if ($sponsorship->company_profile)
                                        <div
                                            class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-lg p-3 mb-2">
                                            <div class="flex items-center">
                                                <i class="fas fa-building text-blue-500 text-lg mr-2"></i>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Profile Saat Ini:</p>
                                                    <a href="{{ Storage::url($sponsorship->company_profile) }}" target="_blank"
                                                        class="text-blue-600 dark:text-blue-400 hover:underline text-xs">
                                                        {{ basename($sponsorship->company_profile) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-building text-blue-500 mr-2"></i>Company Profile Baru
                                    </label>
                                    <div class="relative">
                                        <input type="file" name="company_profile" accept=".pdf,.jpg,.jpeg,.png" class="hidden"
                                            id="company_profile">
                                        <label for="company_profile"
                                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-blue-400 dark:hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all bg-white dark:bg-gray-700 @error('company_profile') border-red-400 dark:border-red-500 bg-red-50 dark:bg-red-900/20 @enderror">
                                            <i class="fas fa-image text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Upload Company Profile Baru</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">PDF/Image, maksimal 1MB (opsional)</span>
                                        </label>
                                    </div>
                                    @error('company_profile')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="bg-gray-50 dark:bg-gray-700 -mx-6 -mb-6 px-6 py-6 rounded-b-lg">
                            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                                <a href="{{ route('sponsorships.show', $sponsorship) }}"
                                    class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 hover:border-gray-400 dark:hover:border-gray-500 transition-all font-medium">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Kembali ke Detail
                                </a>

                                <div class="flex items-center space-x-4">
                                    <div class="hidden sm:flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Pastikan perubahan sudah benar
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center px-8 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-all font-medium shadow-md hover:shadow-lg">
                                        <i class="fas fa-save mr-2"></i>
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Enhanced UX -->
    <script>
        // Function to handle benefit selection
        function toggleBenefit(checkbox) {
            const label = checkbox.nextElementSibling;
            const icon = label.querySelector('.benefit-icon');

            if (checkbox.checked) {
                // Selected state
                label.classList.remove('border-gray-300', 'dark:border-gray-600', 'bg-white', 'dark:bg-gray-700');
                label.classList.add('border-yellow-500', 'bg-yellow-50', 'dark:bg-yellow-900/20', 'dark:border-yellow-400');
                icon.classList.remove('text-gray-400', 'dark:text-gray-500');
                icon.classList.add('text-yellow-500');
            } else {
                // Unselected state
                label.classList.remove('border-yellow-500', 'bg-yellow-50', 'dark:bg-yellow-900/20', 'dark:border-yellow-400');
                label.classList.add('border-gray-300', 'dark:border-gray-600', 'bg-white', 'dark:bg-gray-700');
                icon.classList.remove('text-yellow-500');
                icon.classList.add('text-gray-400', 'dark:text-gray-500');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize benefit selections for checked items
            document.querySelectorAll('.benefit-checkbox').forEach(checkbox => {
                if (checkbox.checked) {
                    toggleBenefit(checkbox);
                }
            });

            // File upload preview and validation
            const fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const label = document.querySelector(`label[for="${this.id}"]`);
                    const maxSize = this.id === 'proposal_file' ? 3 : 1; // MB

                    if (this.files.length > 0) {
                        const file = this.files[0];
                        const fileName = file.name;
                        const fileSize = (file.size / 1024 / 1024).toFixed(2);

                        // Check file size
                        if (parseFloat(fileSize) > maxSize) {
                            label.innerHTML = `
                        <i class="fas fa-exclamation-triangle text-3xl text-red-500 mb-2"></i>
                        <span class="text-sm font-medium text-red-700 dark:text-red-300">File terlalu besar!</span>
                        <span class="text-xs text-red-600 dark:text-red-400">${fileSize} MB (maks ${maxSize} MB)</span>
                    `;
                            label.classList.add('border-red-400', 'bg-red-50', 'dark:bg-red-900/20');
                            label.classList.remove('border-gray-300', 'dark:border-gray-600', 'border-green-400', 'bg-green-50',
                                'dark:bg-green-900/20');
                            this.value = ''; // Clear the input
                            return;
                        }

                        // File is valid
                        label.innerHTML = `
                    <i class="fas fa-check-circle text-3xl text-green-500 mb-2"></i>
                    <span class="text-sm font-medium text-green-700 dark:text-green-300">${fileName}</span>
                    <span class="text-xs text-green-600 dark:text-green-400">${fileSize} MB</span>
                `;
                        label.classList.add('border-green-400', 'bg-green-50', 'dark:bg-green-900/20');
                        label.classList.remove('border-gray-300', 'dark:border-gray-600', 'border-red-400', 'bg-red-50',
                            'dark:bg-red-900/20');
                    }
                });
            });

            // Form validation feedback
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = `
            <i class="fas fa-spinner fa-spin mr-2"></i>
            Menyimpan...
        `;
                submitBtn.disabled = true;
            });

            // Smooth scroll to sections on validation errors
            const errorElements = document.querySelectorAll('.text-red-500');
            if (errorElements.length > 0) {
                errorElements[0].scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    </script>
</x-layouts.app>
