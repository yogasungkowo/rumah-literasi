<x-layouts.app title="Daftar - Rumah Literasi">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900">
                    <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Daftar akun baru
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    Sudah punya akun?
                    <a href="/login" class="font-medium text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors">
                        Masuk di sini
                    </a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="nama-lengkap" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nama Lengkap
                        </label>
                        <input id="nama-lengkap" name="name" type="text" autocomplete="name" required value="{{ old('name') }}"
                               class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" 
                               placeholder="Masukkan nama lengkap Anda">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Daftar dengan</p>
                        <div class="relative inline-flex w-full rounded-xl bg-gray-100 dark:bg-gray-800 p-1 shadow-inner">
                            <div id="register-switch-indicator" class="absolute top-1 bottom-1 w-1/2 bg-white dark:bg-gray-700 rounded-lg shadow-md transition-transform duration-300 ease-in-out transform"></div>
                            <label class="relative z-10 flex-1 cursor-pointer">
                                <input type="radio" name="register_method" value="email" checked class="sr-only register-method-radio">
                                <span class="flex items-center justify-center px-4 py-3 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Email
                                </span>
                            </label>
                            <label class="relative z-10 flex-1 cursor-pointer">
                                <input type="radio" name="register_method" value="phone" class="sr-only register-method-radio">
                                <span class="flex items-center justify-center px-4 py-3 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Nomor HP
                                </span>
                            </label>
                        </div>
                    </div>

                    <div id="register-email-group" class="transition-all duration-300 ease-in-out">
                        <label for="email-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email
                        </label>
                        <input id="email-address" name="email" type="email" autocomplete="email" value="{{ old('email') }}"
                               class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" 
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="register-phone-group" class="transition-all duration-300 ease-in-out" style="display:none;">
                        <label for="phone-number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nomor HP
                        </label>
                        <input id="phone-number" name="phone" type="text" autocomplete="tel" value="{{ old('phone') }}"
                               class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan nomor HP Anda">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                   class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                                   placeholder="Buat password Anda">
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                <svg id="toggle-password-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3C6 3 2.7 5.4 1 9c1.7 3.6 5 6 9 6s7.3-2.4 9-6c-1.7-3.6-5-6-9-6zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Password</label>
                        <div class="relative">
                            <input id="password-confirm" name="password_confirmation" type="password" autocomplete="new-password" required
                                   class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-300' }}"
                                   placeholder="Konfirmasi password Anda">
                            <button type="button" id="toggle-password-confirm" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                <svg id="toggle-password-confirm-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 3C6 3 2.7 5.4 1 9c1.7 3.6 5 6 9 6s7.3-2.4 9-6c-1.7-3.6-5-6-9-6zM10 13a3 3 0 100-6 3 3 0 000 6z"/>
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="user-type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Daftar Sebagai
                        </label>
                        <select id="user-type" name="user_type" required 
                                class="appearance-none relative block w-full px-3 py-3 border text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('user_type') ? 'border-red-500' : 'border-gray-300' }}">
                            <option value="" class="text-gray-500">Pilih jenis akun...</option>
                            <option value="publik" class="text-gray-900 dark:text-white" {{ old('user_type') == 'publik' ? 'selected' : '' }}>Publik</option>
                            <option value="donatur_buku" class="text-gray-900 dark:text-white" {{ old('user_type') == 'donatur_buku' ? 'selected' : '' }}>Donatur Buku</option>
                            <option value="relawan" class="text-gray-900 dark:text-white" {{ old('user_type') == 'relawan' ? 'selected' : '' }}>Relawan</option>
                            <option value="peserta_pelatihan" class="text-gray-900 dark:text-white" {{ old('user_type') == 'peserta_pelatihan' ? 'selected' : '' }}>Peserta Pelatihan</option>
                            <option value="investor" class="text-gray-900 dark:text-white" {{ old('user_type') == 'investor' ? 'selected' : '' }}>Investor</option>
                        </select>
                        @error('user_type')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="agree-terms" name="agree_terms" type="checkbox" required class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800">
                    <label for="agree-terms" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                        Saya setuju dengan 
                        <a href="#" class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors">syarat dan ketentuan</a> 
                        serta 
                        <a href="#" class="text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors">kebijakan privasi</a>
                    </label>
                </div>

                <div class="space-y-4">
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Daftar Sekarang
                    </button>

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-gray-400">Atau daftar dengan</span>
                        </div>
                    </div>

                    <button type="button" class="w-full flex justify-center items-center py-3 px-4 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                        <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Daftar dengan Google
                    </button>
                </div>
            </form>

            <!-- Info tentang jenis akun -->
            <div class="mt-8 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200 mb-2">Informasi Jenis Akun:</h3>
                <div class="text-xs text-blue-700 dark:text-blue-300 space-y-1">
                    <div><strong>Publik:</strong> Akses umum untuk melihat dan mengikuti program</div>
                    <div><strong>Donatur Buku:</strong> Khusus untuk mendonasikan buku</div>
                    <div><strong>Relawan:</strong> Bergabung sebagai sukarelawan kegiatan</div>
                    <div><strong>Peserta Pelatihan:</strong> Mengikuti program pelatihan literasi</div>
                    <div><strong>Investor:</strong> Berinvestasi dalam program literasi</div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
            <script>
        // Toggle register method groups with smooth animations
        const regSwitchIndicator = document.getElementById('register-switch-indicator');
        const regEmailGroup = document.getElementById('register-email-group');
        const regPhoneGroup = document.getElementById('register-phone-group');
        
        document.querySelectorAll('.register-method-radio').forEach(function(radio, index) {
            radio.addEventListener('change', function(e) {
                const val = e.target.value;
                
                // Animate switch indicator
                if (val === 'email') {
                    regSwitchIndicator.style.transform = 'translateX(0%)';
                } else {
                    regSwitchIndicator.style.transform = 'translateX(100%)';
                }
                
                // Toggle form groups with smooth fade effect
                if (val === 'email') {
                    // Show email, hide phone
                    regEmailGroup.style.display = '';
                    regPhoneGroup.style.display = 'none';
                    
                    // Add fade in effect
                    regEmailGroup.style.opacity = '0';
                    setTimeout(() => {
                        regEmailGroup.style.opacity = '1';
                    }, 50);
                } else {
                    // Show phone, hide email
                    regPhoneGroup.style.display = '';
                    regEmailGroup.style.display = 'none';
                    
                    // Add fade in effect
                    regPhoneGroup.style.opacity = '0';
                    setTimeout(() => {
                        regPhoneGroup.style.opacity = '1';
                    }, 50);
                }
                
                // Update active state styling
                document.querySelectorAll('.register-method-radio').forEach(function(r, i) {
                    const span = r.nextElementSibling;
                    if (r.checked) {
                        span.classList.add('text-green-600', 'dark:text-green-400');
                        span.classList.remove('text-gray-700', 'dark:text-gray-300');
                    } else {
                        span.classList.remove('text-green-600', 'dark:text-green-400');
                        span.classList.add('text-gray-700', 'dark:text-gray-300');
                    }
                });
            });
        });

        // Initialize the switch on page load
        document.addEventListener('DOMContentLoaded', function() {
            const emailRadio = document.querySelector('input[name="register_method"][value="email"]');
            if (emailRadio && emailRadio.checked) {
                // Ensure proper initial state
                regEmailGroup.style.display = '';
                regPhoneGroup.style.display = 'none';
                regEmailGroup.style.opacity = '1';
                
                // Update active state
                const emailSpan = emailRadio.nextElementSibling;
                emailSpan.classList.add('text-green-600', 'dark:text-green-400');
                emailSpan.classList.remove('text-gray-700', 'dark:text-gray-300');
            }
        });

        // Password reveal toggles
        const pwInput = document.getElementById('password');
        const toggleBtn = document.getElementById('toggle-password');
        const toggleIcon = document.getElementById('toggle-password-icon');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function(){
                if (pwInput.type === 'password') {
                    pwInput.type = 'text';
                    toggleIcon.innerHTML = '<path d="M4.03 3.97a.75.75 0 10-1.06 1.06l1.7 1.7A9.96 9.96 0 001 10c1.7 3.6 5 6 9 6 1.87 0 3.6-.43 5.14-1.19l1.7 1.7a.75.75 0 101.06-1.06L4.03 3.97zM10 13a3 3 0 01-3-3c0-.5.12-.98.34-1.4l3.06 3.06c-.42.22-.9.34-1.4.34z" />';
                } else {
                    pwInput.type = 'password';
                    toggleIcon.innerHTML = '<path d="M10 3C6 3 2.7 5.4 1 9c1.7 3.6 5 6 9 6s7.3-2.4 9-6c-1.7-3.6-5-6-9-6zM10 13a3 3 0 100-6 3 3 0 000 6z"/>';
                }
            });
        }

        const pwConfirmInput = document.getElementById('password-confirm');
        const toggleBtnConfirm = document.getElementById('toggle-password-confirm');
        const toggleIconConfirm = document.getElementById('toggle-password-confirm-icon');
        if (toggleBtnConfirm) {
            toggleBtnConfirm.addEventListener('click', function(){
                if (pwConfirmInput.type === 'password') {
                    pwConfirmInput.type = 'text';
                    toggleIconConfirm.innerHTML = '<path d="M4.03 3.97a.75.75 0 10-1.06 1.06l1.7 1.7A9.96 9.96 0 001 10c1.7 3.6 5 6 9 6 1.87 0 3.6-.43 5.14-1.19l1.7 1.7a.75.75 0 101.06-1.06L4.03 3.97zM10 13a3 3 0 01-3-3c0-.5.12-.98.34-1.4l3.06 3.06c-.42.22-.9.34-1.4.34z" />';
                } else {
                    pwConfirmInput.type = 'password';
                    toggleIconConfirm.innerHTML = '<path d="M10 3C6 3 2.7 5.4 1 9c1.7 3.6 5 6 9 6s7.3-2.4 9-6c-1.7-3.6-5-6-9-6zM10 13a3 3 0 100-6 3 3 0 000 6z"/>';
                }
            });
        }
    </script>
    @endpush
</x-layouts.app>