<x-layouts.integrated-dashboard title="Daftar Pelatihan - {{ $training->title }}">
    <!-- Header Section -->
    <div class="mb-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 text-sm">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.peserta') }}" 
                       class="inline-flex items-center px-2 py-1 rounded-md font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-indigo-400 dark:hover:bg-gray-800 transition-colors duration-200">
                        <i class="fas fa-home mr-2 text-xs"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <a href="{{ route('participant.trainings.index') }}" 
                           class="px-2 py-1 rounded-md font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-indigo-400 dark:hover:bg-gray-800 transition-colors duration-200">
                            Daftar Pelatihan
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <a href="{{ route('participant.trainings.show', $training) }}" 
                           class="px-2 py-1 rounded-md font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-indigo-400 dark:hover:bg-gray-800 transition-colors duration-200">
                            {{ Str::limit($training->title, 30) }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-300 dark:text-gray-600 mx-2 text-xs"></i>
                        <span class="px-2 py-1 font-medium text-gray-500 dark:text-gray-500">Formulir Pendaftaran</span>
                    </div>
                </li>
            </ol>
        </nav>
        
        <!-- Page Title -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 dark:from-indigo-600 dark:to-purple-700 rounded-xl p-6 text-white shadow-lg">
            <h1 class="text-3xl font-bold mb-2">Formulir Pendaftaran Pelatihan</h1>
            <p class="text-indigo-100 dark:text-indigo-200">{{ $training->title }}</p>
        </div>
    </div>

    <!-- Alert Messages -->
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

    @if ($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-400 text-red-800 px-6 py-4 rounded-r-lg dark:bg-red-900/20 dark:border-red-600 dark:text-red-300 shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                </div>
                <div class="ml-3">
                    <p class="font-medium mb-2">Terdapat kesalahan pada formulir:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Training Info Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden sticky top-6">
                @if($training->image)
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $training->image) }}" 
                             class="w-full h-full object-cover" 
                             alt="{{ $training->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-4xl text-gray-400 dark:text-gray-500"></i>
                    </div>
                @endif
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">{{ $training->title }}</h3>
                    
                    <!-- Training Details -->
                    <div class="space-y-4">
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-user-tie text-indigo-500 mr-3 w-5"></i>
                            <div>
                                <div class="text-sm font-medium">Instruktur</div>
                                <div class="text-sm">{{ $training->instructor_name }}</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-users text-emerald-500 mr-3 w-5"></i>
                            <div>
                                <div class="text-sm font-medium">Kapasitas</div>
                                <div class="text-sm">{{ $training->participants->count() }}/{{ $training->max_participants ?? '∞' }} peserta</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-calendar text-blue-500 mr-3 w-5"></i>
                            <div>
                                <div class="text-sm font-medium">Jadwal</div>
                                <div class="text-sm">
                                    @if($training->schedules->count() > 0)
                                        {{ $training->schedules->first()->date->format('d M Y') }}
                                        @if($training->schedules->count() > 1)
                                            <br><span class="text-xs text-gray-500">({{ $training->schedules->count() }} pertemuan)</span>
                                        @endif
                                    @else
                                        Jadwal belum ditentukan
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check text-emerald-500 mr-3 w-5"></i>
                            <div>
                                <div class="text-sm font-medium">Status</div>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                    <i class="fas fa-check mr-1"></i> Terbuka untuk Pendaftaran
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Description Preview -->
                    @if($training->description)
                        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-2">Deskripsi Singkat</h4>
                            <div class="text-sm text-gray-600 dark:text-gray-300 line-clamp-4">
                                {!! Str::limit(strip_tags($training->description), 150) !!}
                            </div>
                            <a href="{{ route('participant.trainings.show', $training) }}" 
                               class="inline-flex items-center mt-2 text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                                <i class="fas fa-external-link-alt mr-1"></i> Lihat detail lengkap
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Registration Form -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                        <i class="fas fa-user-plus text-indigo-500 mr-3"></i>
                        Formulir Pendaftaran
                    </h2>
                </div>
                
                <form action="{{ route('participant.trainings.store', $training) }}" method="POST" class="p-6">
                    @csrf
                    <div class="space-y-6">
                        <!-- Personal Info Section -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                <i class="fas fa-user text-indigo-500 mr-2"></i>
                                Informasi Pribadi
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
                                    <input type="text" value="{{ auth()->user()->name }}" readonly 
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                                    <input type="email" value="{{ auth()->user()->email }}" readonly 
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300">
                                </div>
                            </div>
                        </div>

                        <!-- Motivation Section -->
                        <div>
                            <label for="motivation" class="block text-sm font-bold text-gray-900 dark:text-white mb-2">
                                Motivasi Mengikuti Pelatihan <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white resize-none" 
                                      id="motivation" 
                                      name="motivation" 
                                      rows="4" 
                                      required 
                                      placeholder="Jelaskan motivasi Anda mengikuti pelatihan ini...">{{ old('motivation') }}</textarea>
                            @error('motivation')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Expectations Section -->
                        <div>
                            <label for="expectations" class="block text-sm font-bold text-gray-900 dark:text-white mb-2">
                                Harapan dari Pelatihan <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white resize-none" 
                                      id="expectations" 
                                      name="expectations" 
                                      rows="4" 
                                      required 
                                      placeholder="Apa yang Anda harapkan dari pelatihan ini...">{{ old('expectations') }}</textarea>
                            @error('expectations')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Experience Level Section -->
                        <div>
                            <label for="experience_level" class="block text-sm font-bold text-gray-900 dark:text-white mb-2">
                                Tingkat Pengalaman <span class="text-red-500">*</span>
                            </label>
                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white" 
                                    id="experience_level" 
                                    name="experience_level" 
                                    required>
                                <option value="">Pilih tingkat pengalaman...</option>
                                <option value="beginner" {{ old('experience_level') == 'beginner' ? 'selected' : '' }}>Pemula</option>
                                <option value="intermediate" {{ old('experience_level') == 'intermediate' ? 'selected' : '' }}>Menengah</option>
                                <option value="advanced" {{ old('experience_level') == 'advanced' ? 'selected' : '' }}>Lanjutan</option>
                            </select>
                            @error('experience_level')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Additional Info Section -->
                        <div>
                            <label for="additional_info" class="block text-sm font-bold text-gray-900 dark:text-white mb-2">
                                Informasi Tambahan
                            </label>
                            <textarea class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white resize-none" 
                                      id="additional_info" 
                                      name="additional_info" 
                                      rows="3" 
                                      placeholder="Informasi tambahan yang ingin Anda sampaikan (opsional)...">{{ old('additional_info') }}</textarea>
                            @error('additional_info')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Info Alert -->
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-l-4 border-blue-400 text-blue-800 px-6 py-4 rounded-lg dark:from-blue-900/20 dark:to-indigo-900/20 dark:border-blue-600 dark:text-blue-300">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-info-circle text-blue-600 dark:text-blue-400 text-lg"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="font-bold">Catatan Penting:</div>
                                    <div class="text-sm mt-2 space-y-1">
                                        <p>• Pendaftaran Anda akan ditinjau oleh administrator</p>
                                        <p>• Anda akan mendapat notifikasi melalui email setelah pendaftaran disetujui atau ditolak</p>
                                        <p>• Pastikan data yang Anda masukkan benar dan lengkap</p>
                                        <p>• Pelatihan akan dimulai sesuai jadwal yang telah ditentukan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('participant.trainings.show', $training) }}" 
                           class="flex-1 sm:flex-none px-6 py-3 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-300 rounded-xl font-medium transition-colors text-center">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Detail
                        </a>
                        <button type="submit" 
                                class="flex-1 px-8 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.integrated-dashboard>
