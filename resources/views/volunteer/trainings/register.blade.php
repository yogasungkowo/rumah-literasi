<x-layouts.app>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-600 via-green-700 to-emerald-600 py-12">
            <div class="container mx-auto px-4">
                <div class="text-center text-white">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-4 backdrop-blur-sm">
                        <i class="fas fa-hand-paper text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold mb-2">Daftar sebagai Relawan</h1>
                    <p class="text-green-100 max-w-2xl mx-auto">
                        Isi formulir di bawah untuk mendaftar sebagai relawan dalam pelatihan ini
                    </p>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <!-- Navigation -->
            <div class="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400 mb-6">
                <a href="{{ route('dashboard.relawan') }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    <i class="fas fa-home mr-1"></i>Dashboard
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('volunteer.trainings.index') }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    Pelatihan Relawan
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('volunteer.trainings.show', $training) }}" class="hover:text-green-600 dark:hover:text-green-400 transition-colors">
                    {{ $training->title }}
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-900 dark:text-white font-medium">Daftar Relawan</span>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- Training Info Card -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-8">
                    <div class="flex flex-col md:flex-row md:items-center md:space-x-6">
                        <!-- Training Image -->
                        <div class="flex-shrink-0 mb-4 md:mb-0">
                            <div class="w-full md:w-32 h-32 bg-gradient-to-br from-green-400 to-blue-500 rounded-lg overflow-hidden">
                                @if($training->image)
                                    <img src="{{ $training->image_url }}" 
                                         alt="{{ $training->title }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="flex items-center justify-center h-full">
                                        <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Training Details -->
                        <div class="flex-1">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">{{ $training->title }}</h2>
                            <div class="space-y-3">
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center mr-3 bg-green-50 dark:bg-green-900/30 rounded-md">
                                        <i class="fas fa-user-tie text-green-500 text-xs"></i>
                                    </div>
                                    <span class="flex-1 leading-relaxed">{{ $training->instructor_name }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center mr-3 bg-green-50 dark:bg-green-900/30 rounded-md">
                                        <i class="fas fa-calendar text-green-500 text-xs"></i>
                                    </div>
                                    <span class="flex-1 leading-relaxed">{{ $training->start_date->format('d M Y') }} - {{ $training->end_date->format('d M Y') }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex-shrink-0 w-6 h-6 flex items-center justify-center mr-3 bg-green-50 dark:bg-green-900/30 rounded-md">
                                        <i class="fas fa-map-marker-alt text-green-500 text-xs"></i>
                                    </div>
                                    <span class="flex-1 leading-relaxed">{{ $training->location ?: 'Online' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registration Form -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-600 p-6 border-b border-gray-200 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <i class="fas fa-file-alt text-green-600 dark:text-green-400 mr-2"></i>
                            Formulir Pendaftaran Relawan
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                            Ceritakan motivasi dan keahlian Anda untuk menjadi relawan
                        </p>
                    </div>

                    <form method="POST" action="{{ route('volunteer.trainings.store', $training) }}" class="p-6 space-y-6">
                        @csrf

                        <!-- Motivation -->
                        <div>
                            <label for="motivation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-heart text-red-500 mr-1"></i>
                                Motivasi *
                            </label>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                Jelaskan mengapa Anda ingin menjadi relawan untuk pelatihan ini dan bagaimana hal ini sejalan dengan nilai-nilai Anda.
                            </p>
                            <textarea name="motivation" id="motivation" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('motivation') border-red-400 dark:border-red-500 @enderror"
                                      placeholder="Contoh: Saya ingin berkontribusi dalam meningkatkan literasi masyarakat karena..."
                                      required>{{ old('motivation') }}</textarea>
                            @error('motivation')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                Maksimal 1000 karakter
                            </p>
                        </div>

                        <!-- Skills -->
                        <div>
                            <label for="skills" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-tools text-blue-500 mr-1"></i>
                                Keahlian *
                            </label>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                Sebutkan keahlian atau kemampuan yang Anda miliki yang relevan dengan pelatihan ini.
                            </p>
                            <textarea name="skills" id="skills" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('skills') border-red-400 dark:border-red-500 @enderror"
                                      placeholder="Contoh: Komunikasi publik, desain grafis, manajemen acara, teknologi informasi..."
                                      required>{{ old('skills') }}</textarea>
                            @error('skills')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                Maksimal 500 karakter
                            </p>
                        </div>

                        <!-- Experience -->
                        <div>
                            <label for="experience" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                <i class="fas fa-history text-purple-500 mr-1"></i>
                                Pengalaman (Opsional)
                            </label>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                Ceritakan pengalaman Anda sebagai relawan atau dalam bidang pendidikan/literasi (jika ada).
                            </p>
                            <textarea name="experience" id="experience" rows="3"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:border-green-500 dark:focus:border-green-400 focus:ring-2 focus:ring-green-100 dark:focus:ring-green-900 transition-all bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 @error('experience') border-red-400 dark:border-red-500 @enderror"
                                      placeholder="Contoh: Pernah menjadi volunteer di Taman Bacaan Masyarakat selama 2 tahun...">{{ old('experience') }}</textarea>
                            @error('experience')
                                <p class="text-red-500 dark:text-red-400 text-xs mt-1 flex items-center">
                                    <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                                </p>
                            @enderror
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                Maksimal 500 karakter
                            </p>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" type="checkbox" 
                                           class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 rounded" 
                                           required>
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="text-gray-700 dark:text-gray-300">
                                        Saya setuju untuk menjadi relawan dalam pelatihan ini dan bersedia mengikuti semua ketentuan yang berlaku. 
                                        Saya memahami bahwa pendaftaran ini perlu dikonfirmasi oleh admin.
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200 dark:border-gray-600">
                            <button type="submit" 
                                    class="flex-1 inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Kirim Pendaftaran
                            </button>
                            
                            <a href="{{ route('volunteer.trainings.show', $training) }}" 
                               class="inline-flex items-center justify-center px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Additional Info -->
                <div class="mt-8 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <i class="fas fa-info-circle text-blue-500 text-xl mt-1"></i>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-sm font-medium text-blue-800 dark:text-blue-300 mb-2">Informasi Penting</h4>
                            <ul class="text-sm text-blue-700 dark:text-blue-300 space-y-1">
                                <li>• Pendaftaran Anda akan direview oleh admin dalam 1-3 hari kerja</li>
                                <li>• Setelah terkonfirmasi, Anda akan mendapat informasi lebih lanjut via email</li>
                                <li>• Pastikan data kontak Anda di profil sudah benar dan aktif</li>
                                <li>• Anda dapat membatalkan pendaftaran sebelum dikonfirmasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Character Counter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Character counter for textareas
            const textareas = [
                { id: 'motivation', max: 1000 },
                { id: 'skills', max: 500 },
                { id: 'experience', max: 500 }
            ];

            textareas.forEach(function(textarea) {
                const element = document.getElementById(textarea.id);
                const counter = element.nextElementSibling?.nextElementSibling;
                
                if (element && counter) {
                    element.addEventListener('input', function() {
                        const remaining = textarea.max - this.value.length;
                        const color = remaining < 50 ? 'text-red-500' : 'text-gray-500 dark:text-gray-400';
                        counter.className = `text-xs mt-1 ${color}`;
                        counter.textContent = `${this.value.length}/${textarea.max} karakter`;
                    });
                    
                    // Initial count
                    element.dispatchEvent(new Event('input'));
                }
            });
        });
    </script>
</x-layouts.app>
