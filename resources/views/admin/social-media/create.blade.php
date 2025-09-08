<x-layouts.admin title="Tambah Social Media">
    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.social-media.index') }}" 
               class="mr-4 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Social Media</h1>
                <p class="text-gray-600 dark:text-gray-400">Tambahkan akun social media baru</p>
            </div>
        </div>

        <form action="{{ route('admin.social-media.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="platform" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Platform *
                    </label>
                    <select name="platform" id="platform" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Pilih Platform</option>
                        @foreach($platforms as $key => $name)
                            <option value="{{ $key }}" {{ old('platform') == $key ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                    @error('platform')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="platform_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Nama Platform *
                    </label>
                    <input type="text" name="platform_name" id="platform_name" value="{{ old('platform_name') }}" required
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                           placeholder="Contoh: Facebook">
                    @error('platform_name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    URL Lengkap
                </label>
                <input type="url" name="url" id="url" value="{{ old('url') }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                       placeholder="https://facebook.com/rumah-literasi-ranggi">
                @error('url')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Username/Handle
                </label>
                <input type="text" name="username" id="username" value="{{ old('username') }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                       placeholder="rumah.literasi.ranggi">
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Jika URL kosong, username akan digunakan untuk membuat URL otomatis
                </p>
                @error('username')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Icon Class (Opsional)
                    </label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                           placeholder="fab fa-facebook-f">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Kosongkan untuk menggunakan icon default
                    </p>
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Urutan
                    </label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                    @error('sort_order')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-900 dark:text-white">
                    Aktif
                </label>
            </div>

            <div class="flex justify-end space-x-3 pt-6">
                <a href="{{ route('admin.social-media.index') }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-2 rounded-lg transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layouts.admin>
