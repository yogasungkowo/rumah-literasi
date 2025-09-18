<x-layouts.app title="Masuk - Rumah Literasi">
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <div class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900">
                    <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Masuk ke akun Anda
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-400">
                    Atau
                    <a href="/register" class="font-medium text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors">
                        daftar akun baru
                    </a>
                </p>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Login dengan</p>
                        <div class="relative inline-flex w-full rounded-xl bg-gray-100 dark:bg-gray-800 p-1 shadow-inner">
                            <div id="switch-indicator" class="absolute top-1 bottom-1 w-1/2 bg-white dark:bg-gray-700 rounded-lg shadow-md transition-transform duration-300 ease-in-out transform"></div>
                            <label class="relative z-10 flex-1 cursor-pointer">
                                <input type="radio" name="login_method" value="email" checked class="sr-only login-method-radio">
                                <span class="flex items-center justify-center px-4 py-3 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Email
                                </span>
                            </label>
                            <label class="relative z-10 flex-1 cursor-pointer">
                                <input type="radio" name="login_method" value="phone" class="sr-only login-method-radio">
                                <span class="flex items-center justify-center px-4 py-3 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Nomor HP
                                </span>
                            </label>
                        </div>
                    </div>

                    <div id="login-email-group" class="transition-all duration-300 ease-in-out">
                        <label for="email-address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" value="{{ old('email') }}"
                               class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="login-phone-group" class="transition-all duration-300 ease-in-out" style="display:none;">
                        <label for="phone-number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor HP</label>
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
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="appearance-none relative block w-full px-3 py-3 border placeholder-gray-500 dark:placeholder-gray-400 text-gray-900 dark:text-white rounded-lg bg-white dark:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 sm:text-sm transition-colors dark:border-gray-600 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                                   placeholder="Masukkan password Anda">
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                                <svg id="toggle-password-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 3C6 3 2.7 5.4 1 9c1.7 3.6 5 6 9 6s7.3-2.4 9-6c-1.7-3.6-5-6-9-6zM10 13a3 3 0 100-6 3 3 0 000 6z"/></svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800">
                        <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                            Ingat saya
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-green-600 hover:text-green-500 dark:text-green-400 dark:hover:text-green-300 transition-colors">
                            Lupa password?
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-green-500 group-hover:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 616 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Toggle login method groups with smooth animations
        const switchIndicator = document.getElementById('switch-indicator');
        const emailGroup = document.getElementById('login-email-group');
        const phoneGroup = document.getElementById('login-phone-group');
        
        document.querySelectorAll('.login-method-radio').forEach(function(radio, index) {
            radio.addEventListener('change', function(e) {
                const val = e.target.value;
                
                // Animate switch indicator
                if (val === 'email') {
                    switchIndicator.style.transform = 'translateX(0%)';
                } else {
                    switchIndicator.style.transform = 'translateX(100%)';
                }
                
                // Toggle form groups with smooth fade effect
                if (val === 'email') {
                    // Show email, hide phone
                    emailGroup.style.display = '';
                    phoneGroup.style.display = 'none';
                    
                    // Add fade in effect
                    emailGroup.style.opacity = '0';
                    setTimeout(() => {
                        emailGroup.style.opacity = '1';
                    }, 50);
                } else {
                    // Show phone, hide email
                    phoneGroup.style.display = '';
                    emailGroup.style.display = 'none';
                    
                    // Add fade in effect
                    phoneGroup.style.opacity = '0';
                    setTimeout(() => {
                        phoneGroup.style.opacity = '1';
                    }, 50);
                }
                
                // Update active state styling
                document.querySelectorAll('.login-method-radio').forEach(function(r, i) {
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
            const emailRadio = document.querySelector('input[value="email"]');
            if (emailRadio && emailRadio.checked) {
                // Ensure proper initial state
                emailGroup.style.display = '';
                phoneGroup.style.display = 'none';
                emailGroup.style.opacity = '1';
                
                // Update active state
                const emailSpan = emailRadio.nextElementSibling;
                emailSpan.classList.add('text-green-600', 'dark:text-green-400');
                emailSpan.classList.remove('text-gray-700', 'dark:text-gray-300');
            }
        });

        // Password reveal toggle
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
    </script>
</x-layouts.app>