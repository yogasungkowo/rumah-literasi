<x-layouts.admin title="Edit Social Media">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.social-media.index') }}" 
               class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Social Media</h1>
                <p class="text-gray-600 dark:text-gray-400">Update pengaturan social media {{ $social_medium->platform_name }}</p>
            </div>
        </div>

        <form action="{{ route('admin.social-media.update', $social_medium) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Platform (Read-only) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Platform
                </label>
                <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <i class="{{ $social_medium->icon_class }} text-xl text-gray-600 dark:text-gray-400 mr-3"></i>
                    <span class="text-gray-800 dark:text-gray-200 font-medium">{{ $social_medium->platform_name }}</span>
                </div>
            </div>

            <!-- URL -->
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    URL <span class="text-red-500">*</span>
                </label>
                <input type="url" 
                       id="url" 
                       name="url" 
                       value="{{ old('url', $social_medium->url) }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('url') border-red-500 @enderror"
                       placeholder="https://facebook.com/username"
                       required>
                @error('url')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Masukkan URL lengkap profil social media
                </p>
            </div>

            <!-- Username (Optional) -->
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Username
                </label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400">@</span>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="{{ old('username', $social_medium->username) }}"
                           class="w-full pl-8 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('username') border-red-500 @enderror"
                           placeholder="username">
                </div>
                @error('username')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Username untuk ditampilkan (opsional)
                </p>
            </div>

            <!-- Icon -->
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Icon Class
                </label>
                <input type="text" 
                       id="icon" 
                       name="icon" 
                       value="{{ old('icon', $social_medium->icon) }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('icon') border-red-500 @enderror"
                       placeholder="fab fa-facebook-f">
                @error('icon')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Font Awesome icon class (contoh: fab fa-facebook-f)
                </p>
                <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Preview icon:</p>
                    <i class="{{ old('icon', $social_medium->icon) }} text-2xl text-gray-600 dark:text-gray-400" id="icon-preview"></i>
                </div>
            </div>

            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Urutan Tampil
                </label>
                <input type="number" 
                       id="sort_order" 
                       name="sort_order" 
                       value="{{ old('sort_order', $social_medium->sort_order) }}"
                       min="1"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white @error('sort_order') border-red-500 @enderror">
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Angka kecil akan ditampilkan lebih awal
                </p>
            </div>

            <!-- Status -->
            <div>
                <label class="flex items-center">
                    <input type="checkbox" 
                           name="is_active" 
                           value="1"
                           {{ old('is_active', $social_medium->is_active) ? 'checked' : '' }}
                           class="rounded border-gray-300 dark:border-gray-600 text-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-400 dark:bg-gray-700">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Aktifkan social media ini</span>
                </label>
                @error('is_active')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-3 pt-4">
                <button type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Update Social Media
                </button>
                <a href="{{ route('admin.social-media.index') }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <!-- Live Icon Preview Script -->
    <script>
        document.getElementById('icon').addEventListener('input', function() {
            const iconPreview = document.getElementById('icon-preview');
            const iconClass = this.value || 'fas fa-question';
            iconPreview.className = iconClass + ' text-2xl text-gray-600 dark:text-gray-400';
        });
    </script>
</x-layouts.admin>
