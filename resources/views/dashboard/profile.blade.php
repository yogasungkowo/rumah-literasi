<x-layouts.integrated-dashboard title="Profile Saya">
    <div class="max-w-4xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
            <div class="p-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <img src="{{ $user->avatar_url }}" alt="Avatar" class="w-24 h-24 rounded-full border-4 border-white dark:border-gray-700 shadow-lg">
                        <div class="absolute bottom-0 right-0 bg-purple-600 text-white rounded-full p-2 shadow-lg">
                            <i class="fas fa-camera text-sm"></i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                        <p class="text-gray-600 dark:text-gray-300">{{ $user->email }}</p>
                        <div class="mt-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">
                                {{ $user->role_name }}
                            </span>
                        </div>
                        @if($user->last_login_at)
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                Terakhir login: {{ $user->last_login_at->format('d M Y, H:i') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Profile</h3>
            </div>
            
            <form method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Avatar Upload -->
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Foto Profile
                    </label>
                    <input type="file" id="avatar" name="avatar" accept="image/*" 
                           class="block w-full text-sm text-gray-500 dark:text-gray-300
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0
                                  file:text-sm file:font-medium
                                  file:bg-purple-50 file:text-purple-700
                                  hover:file:bg-purple-100
                                  dark:file:bg-purple-900/30 dark:file:text-purple-300
                                  dark:hover:file:bg-purple-900/50">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 2MB</p>
                </div>

                <!-- Personal Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nama Lengkap *
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nomor Telepon
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Tanggal Lahir
                        </label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date?->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Jenis Kelamin
                        </label>
                        <select id="gender" name="gender"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                       focus:ring-purple-500 focus:border-purple-500 
                                       bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Alamat
                    </label>
                    <textarea id="address" name="address" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                     focus:ring-purple-500 focus:border-purple-500 
                                     bg-white dark:bg-gray-700 text-gray-900 dark:text-white">{{ old('address', $user->address) }}</textarea>
                </div>

                <!-- Professional Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="organization" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Organisasi/Perusahaan
                        </label>
                        <input type="text" id="organization" name="organization" value="{{ old('organization', $user->organization) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>

                    <div>
                        <label for="profession" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Profesi
                        </label>
                        <input type="text" id="profession" name="profession" value="{{ old('profession', $user->profession) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Bio/Deskripsi Diri
                    </label>
                    <textarea id="bio" name="bio" rows="4" 
                              placeholder="Ceritakan sedikit tentang diri Anda..."
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                     focus:ring-purple-500 focus:border-purple-500 
                                     bg-white dark:bg-gray-700 text-gray-900 dark:text-white">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" onclick="history.back()" 
                            class="px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Account Information -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mt-6">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Akun</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                        <div class="text-gray-900 dark:text-white">{{ $user->email }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role</label>
                        <div class="text-gray-900 dark:text-white">{{ $user->role_name }}</div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status Akun</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                            {{ $user->status === 'active' ? 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300' : 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bergabung</label>
                        <div class="text-gray-900 dark:text-white">{{ $user->created_at->format('d M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.integrated-dashboard>
