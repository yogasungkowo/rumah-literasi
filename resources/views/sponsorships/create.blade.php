<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-5xl mx-auto">
                <!-- Header Section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        Buat Proposal Sponsorship
                    </h1>
                    <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Mari bergabung dalam membangun masa depan literasi Indonesia. Ajukan proposal sponsorship Anda dan berikan dampak positif
                        untuk masyarakat.
                    </p>
                </div>

                <!-- Progress Steps -->
                <div class="mb-6">
                    <div class="flex items-center justify-center space-x-4 mb-6">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium">1</div>
                            <span class="ml-2 text-blue-600 dark:text-blue-400 font-medium">Informasi Perusahaan</span>
                        </div>
                        <div class="w-16 h-0.5 bg-gray-300 dark:bg-gray-600"></div>
                        <div class="flex items-center">
                            <div
                                class="w-8 h-8 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 text-sm font-medium">
                                2</div>
                            <span class="ml-2 text-gray-600 dark:text-gray-400">Detail Sponsorship</span>
                        </div>
                        <div class="w-16 h-0.5 bg-gray-300 dark:bg-gray-600"></div>
                        <div class="flex items-center">
                            <div
                                class="w-8 h-8 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center text-gray-600 dark:text-gray-400 text-sm font-medium">
                                3</div>
                            <span class="ml-2 text-gray-600 dark:text-gray-400">Lampiran</span>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-blue-600 p-6">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <i class="fas fa-file-alt mr-2"></i>
                            Detail Proposal Sponsorship
                        </h2>
                        <p class="text-blue-100 mt-1">Lengkapi informasi berikut untuk mengajukan proposal sponsorship</p>
                    </div>

                    <form action="{{ route('sponsorships.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf

                        <!-- Step 1: Company Information -->
                        <div class="mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    1
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Informasi Perusahaan</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Berikan detail lengkap tentang perusahaan Anda</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-building text-blue-500 mr-2"></i>Nama Perusahaan *
                                    </label>
                                    <input type="text" name="company_name"
                                        value="{{ old('company_name', auth()->user()->investor?->company_name) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('company_name') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="PT. Nama Perusahaan Anda" required>
                                    @error('company_name')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-user text-blue-500 mr-2"></i>Nama Kontak Person *
                                    </label>
                                    <input type="text" name="contact_person" value="{{ old('contact_person', auth()->user()->name) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('contact_person') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="Nama lengkap PIC" required>
                                    @error('contact_person')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-phone text-blue-500 mr-2"></i>Nomor Telepon *
                                    </label>
                                    <input type="text" name="contact_phone" value="{{ old('contact_phone', auth()->user()->phone) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('contact_phone') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="08xxxxxxxxxx" required>
                                    @error('contact_phone')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-envelope text-blue-500 mr-2"></i>Email *
                                    </label>
                                    <input type="email" name="contact_email" value="{{ old('contact_email', auth()->user()->email) }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('contact_email') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="email@perusahaan.com" required>
                                    @error('contact_email')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2 space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-map-marker-alt text-blue-500 mr-2"></i>Alamat Perusahaan *
                                    </label>
                                    <textarea name="company_address" rows="3"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('company_address') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="Jl. Alamat lengkap perusahaan..." required>{{ old('company_address', auth()->user()->address) }}</textarea>
                                    @error('company_address')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-globe text-blue-500 mr-2"></i>Website
                                    </label>
                                    <input type="url" name="website" value="{{ old('website') }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('website') border-red-400 dark:border-red-500 @enderror"
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
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    2
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Detail Sponsorship</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Tentukan jenis dan besaran sponsorship yang akan diberikan
                                    </p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-tags text-blue-500 mr-2"></i>Jenis Sponsorship *
                                    </label>
                                    <select name="sponsorship_type"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('sponsorship_type') border-red-400 dark:border-red-500 @enderror"
                                        required>
                                        <option value="">Pilih jenis sponsorship</option>
                                        <option value="event" {{ old('sponsorship_type') == 'event' ? 'selected' : '' }}>
                                            🎪 Event/Acara
                                        </option>
                                        <option value="program" {{ old('sponsorship_type') == 'program' ? 'selected' : '' }}>
                                            📚 Program Literasi
                                        </option>
                                        <option value="facility" {{ old('sponsorship_type') == 'facility' ? 'selected' : '' }}>
                                            🏢 Fasilitas
                                        </option>
                                        <option value="general" {{ old('sponsorship_type') == 'general' ? 'selected' : '' }}>
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
                                    <input type="number" name="amount" value="{{ old('amount') }}" min="0" step="1000"
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
                                        <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>Tanggal Mulai
                                    </label>
                                    <input type="date" name="start_date" value="{{ old('start_date') }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('start_date') border-red-400 dark:border-red-500 @enderror">
                                    @error('start_date')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-calendar-check text-blue-500 mr-2"></i>Tanggal Selesai
                                    </label>
                                    <input type="date" name="end_date" value="{{ old('end_date') }}"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('end_date') border-red-400 dark:border-red-500 @enderror">
                                    @error('end_date')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2 space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>Deskripsi Proposal *
                                    </label>
                                    <textarea name="description" rows="6"
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-100 dark:focus:ring-blue-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('description') border-red-400 dark:border-red-500 @enderror"
                                        placeholder="Jelaskan secara detail tujuan, target audience, kegiatan yang akan dilakukan, dan manfaat sponsorship untuk program literasi..."
                                        required>{{ old('description') }}</textarea>
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
                                @endphp
                                @foreach ($benefits as $key => $benefit)
                                    <div class="relative benefit-item">
                                        <input type="checkbox" name="benefits_requested[]" value="{{ $key }}"
                                            {{ in_array($key, old('benefits_requested', [])) ? 'checked' : '' }} id="benefit_{{ $key }}"
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
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center text-white text-sm font-medium mr-3">
                                    3
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Lampiran Dokumen</h3>
                                    <p class="text-gray-600 dark:text-gray-400 text-sm">Upload dokumen pendukung proposal sponsorship</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Proposal File -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-file-pdf text-red-500 mr-2"></i>Proposal File (PDF) *
                                    </label>
                                    <div class="relative">
                                        <input type="file" name="proposal_file" accept=".pdf" class="hidden" id="proposal_file" required>
                                        <label for="proposal_file"
                                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-red-400 dark:hover:border-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all bg-white dark:bg-gray-700 @error('proposal_file') border-red-400 dark:border-red-500 bg-red-50 dark:bg-red-900/20 @enderror">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Upload Proposal PDF</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">Maksimal 3MB</span>
                                        </label>
                                    </div>
                                    @error('proposal_file')
                                        <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Company Profile -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <i class="fas fa-building text-blue-500 mr-2"></i>Company Profile
                                    </label>
                                    <div class="relative">
                                        <input type="file" name="company_profile" accept=".pdf,.jpg,.jpeg,.png" class="hidden"
                                            id="company_profile">
                                        <label for="company_profile"
                                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-blue-400 dark:hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all bg-white dark:bg-gray-700 @error('company_profile') border-red-400 dark:border-red-500 bg-red-50 dark:bg-red-900/20 @enderror">
                                            <i class="fas fa-image text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Upload Company Profile</span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">PDF/Image, maksimal 1MB</span>
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
                                <a href="{{ route('sponsorships.index') }}"
                                    class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 hover:border-gray-400 dark:hover:border-gray-500 transition-all font-medium">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Kembali ke Daftar
                                </a>

                                <div class="flex items-center space-x-4">
                                    <div class="hidden sm:flex items-center text-sm text-gray-600 dark:text-gray-400">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Pastikan semua data sudah benar
                                    </div>
                                    <button type="submit"
                                        class="inline-flex items-center px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all font-medium shadow-md hover:shadow-lg">
                                        <i class="fas fa-paper-plane mr-2"></i>
                                        Ajukan Proposal Sponsorship
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Info Cards -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-purple-50 dark:bg-purple-900/20 p-6 rounded-lg border border-purple-200 dark:border-purple-700">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <h3 class="ml-3 font-semibold text-purple-900 dark:text-purple-100">Proses Review</h3>
                        </div>
                        <p class="text-purple-700 dark:text-purple-200 text-sm">
                            Proposal akan direview dalam 3-5 hari kerja oleh tim kami
                        </p>
                    </div>

                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg border border-blue-200 dark:border-blue-700">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-handshake text-white"></i>
                            </div>
                            <h3 class="ml-3 font-semibold text-blue-900 dark:text-blue-100">Partnership</h3>
                        </div>
                        <p class="text-blue-700 dark:text-blue-200 text-sm">
                            Berkolaborasi untuk membangun ekosistem literasi yang berkelanjutan
                        </p>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-lg border border-green-200 dark:border-green-700">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-heart text-white"></i>
                            </div>
                            <h3 class="ml-3 font-semibold text-green-900 dark:text-green-100">Dampak Sosial</h3>
                        </div>
                        <p class="text-green-700 dark:text-green-200 text-sm">
                            Kontribusi nyata untuk meningkatkan literasi masyarakat Indonesia
                        </p>
                    </div>
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
            // Initialize benefit selections for old values
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
                // Check file sizes before submit
                const proposalFile = document.getElementById('proposal_file').files[0];
                const companyProfile = document.getElementById('company_profile').files[0];

                let hasError = false;

                if (proposalFile && proposalFile.size > 3 * 1024 * 1024) { // 3MB
                    alert('File proposal terlalu besar. Maksimal 3MB.');
                    hasError = true;
                }

                if (companyProfile && companyProfile.size > 1 * 1024 * 1024) { // 1MB
                    alert('File company profile terlalu besar. Maksimal 1MB.');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();
                    return false;
                }

                const submitBtn = form.querySelector('button[type="submit"]');
                submitBtn.innerHTML = `
            <i class="fas fa-spinner fa-spin mr-2"></i>
            Mengirim Proposal...
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
