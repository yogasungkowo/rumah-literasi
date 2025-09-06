<x-layouts.integrated-dashboard title="Profile Saya">
    <div class="max-w-4xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mb-6">
            <div class="p-6">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                            <img id="current-avatar" src="{{ $user->avatar_url }}" alt="Current Avatar"
                                class="w-24 h-24 rounded-full border-4 border-purple-200 dark:border-purple-700 shadow-lg object-cover">
                        </div>
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                                <p class="text-gray-600 dark:text-gray-300 flex items-center mt-1">
                                    <i class="fas fa-envelope text-purple-600 mr-2 text-sm"></i>
                                    {{ $user->email }}
                                </p>
                                <div class="mt-3">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-purple-100 to-purple-200 dark:from-purple-900/30 dark:to-purple-800/30 text-purple-800 dark:text-purple-300 border border-purple-200 dark:border-purple-700">
                                        <i class="fas fa-user-tag mr-2 text-xs"></i>
                                        {{ $user->role_name }}
                                    </span>
                                </div>
                                @if ($user->last_login_at)
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 flex items-center">
                                        <i class="fas fa-clock text-gray-400 mr-2 text-xs"></i>
                                        Terakhir login: {{ $user->last_login_at->format('d M Y, H:i') }}
                                    </p>
                                @endif
                            </div>
                            <!-- Quick Actions -->
                            <div class="flex space-x-2">
                                <a href="#profile-form" 
                                   class="inline-flex items-center px-3 py-2 border border-purple-300 dark:border-purple-600 rounded-lg text-sm font-medium text-purple-700 dark:text-purple-300 bg-purple-50 dark:bg-purple-900/20 hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-all duration-200">
                                    <i class="fas fa-edit mr-2 text-xs"></i>
                                    Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Form -->
        <div id="profile-form" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    <i class="fas fa-user-edit mr-2 text-purple-600"></i>
                    Informasi Profile
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Perbarui informasi profile Anda di bawah ini
                </p>
            </div>

            <form method="POST" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Avatar Upload -->
                <div>
                    <label for="avatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <i class="fas fa-camera mr-2 text-purple-600"></i>
                        Foto Profile
                    </label>

                    <!-- Current Avatar Display -->
                    <div class="flex items-start space-x-6 mb-4">
                        <div class="relative">
                            <img id="current-avatar" src="{{ $user->avatar_url }}" alt="Current Avatar"
                                class="w-24 h-24 rounded-full border-4 border-purple-200 dark:border-purple-700 shadow-lg object-cover">
                            <div class="absolute bottom-0 right-0 bg-purple-600 text-white rounded-full p-2 shadow-lg">
                                <i class="fas fa-camera text-sm"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                Upload foto profile baru. Ukuran maksimal 2MB dengan format PNG, JPG, atau GIF.
                            </p>

                            <!-- Custom File Upload -->
                            <div class="relative group">
                                <input type="file" id="avatar" name="avatar" accept="image/*"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">

                                <div
                                    class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 text-center group-hover:border-purple-500 dark:group-hover:border-purple-400 transition-all duration-200 bg-gray-50 dark:bg-gray-700/50 group-hover:bg-purple-50 dark:group-hover:bg-purple-900/20">
                                    <div class="flex flex-col items-center">
                                        <i
                                            class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-purple-500 dark:group-hover:text-purple-400 mb-3 transition-colors duration-200"></i>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white mb-1">
                                            Klik untuk upload foto baru
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            atau drag & drop foto di sini
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New Avatar Preview -->
                    <div id="avatar-preview-container" class="hidden mt-4">
                        <div
                            class="flex items-center space-x-4 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-xl">
                            <img id="avatar-preview" class="w-16 h-16 rounded-full object-cover border-2 border-green-300 dark:border-green-600"
                                alt="Preview">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-green-800 dark:text-green-200">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Foto baru berhasil dipilih
                                </p>
                                <p id="avatar-file-name" class="text-xs text-green-600 dark:text-green-400 mt-1"></p>
                            </div>
                            <button type="button" onclick="removeAvatarPreview()"
                                class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    @error('avatar')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
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
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-envelope mr-2 text-purple-600"></i>
                            Email *
                            <span class="text-xs text-amber-600 dark:text-amber-400 ml-2">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Data sensitif
                            </span>
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                            <i class="fas fa-info-circle mr-1"></i>
                            Email digunakan untuk login dan notifikasi penting
                        </p>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nomor Telepon
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-birthday-cake mr-2 text-purple-600"></i>
                            Tanggal Lahir
                        </label>
                        <div class="relative">
                            <input type="text" id="birth_date" name="birth_date"
                                value="{{ old('birth_date', $user->birth_date?->format('d/m/Y')) }}"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                          focus:ring-purple-500 focus:border-purple-500 
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white pr-10"
                                placeholder="Pilih tanggal lahir" readonly>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-calendar-alt text-gray-400"></i>
                            </div>
                        </div>
                        @error('birth_date')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
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
                        @error('gender')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
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
                    @error('address')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
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
                        @error('organization')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="profession" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Profesi
                        </label>
                        <input type="text" id="profession" name="profession" value="{{ old('profession', $user->profession) }}"
                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                      focus:ring-purple-500 focus:border-purple-500 
                                      bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                        @error('profession')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Bio/Deskripsi Diri
                    </label>
                    <textarea id="bio" name="bio" rows="4" placeholder="Ceritakan sedikit tentang diri Anda..."
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                     focus:ring-purple-500 focus:border-purple-500 
                                     bg-white dark:bg-gray-700 text-gray-900 dark:text-white">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" onclick="history.back()"
                        class="px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Change Password Section -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 mt-6 password-section">
            <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    <i class="fas fa-lock mr-2 text-red-600 security-badge"></i>
                    Ubah Kata Sandi
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    Perbarui kata sandi Anda untuk menjaga keamanan akun
                </p>
            </div>

            <form method="POST" action="{{ route('dashboard.password.update') }}" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-700 rounded-lg p-4">
                    <div class="flex items-start">
                        <i class="fas fa-shield-alt text-amber-600 dark:text-amber-400 mt-1 mr-3"></i>
                        <div>
                            <h4 class="text-sm font-medium text-amber-800 dark:text-amber-200">Tips Keamanan Kata Sandi</h4>
                            <ul class="mt-2 text-xs text-amber-700 dark:text-amber-300 space-y-1">
                                <li>• Gunakan minimal 8 karakter</li>
                                <li>• Kombinasikan huruf besar, kecil, angka, dan simbol</li>
                                <li>• Jangan gunakan informasi pribadi yang mudah ditebak</li>
                                <li>• Gunakan kata sandi yang unik untuk setiap akun</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-key mr-2 text-red-600"></i>
                            Kata Sandi Saat Ini *
                        </label>
                        <div class="relative">
                            <input type="password" id="current_password" name="current_password" required
                                class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                          focus:ring-red-500 focus:border-red-500 
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                placeholder="Masukkan kata sandi saat ini">
                            <button type="button" onclick="togglePassword('current_password')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <i class="fas fa-eye" id="current_password_icon"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-lock mr-2 text-red-600"></i>
                            Kata Sandi Baru *
                        </label>
                        <div class="relative">
                            <input type="password" id="new_password" name="new_password" required
                                class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                          focus:ring-red-500 focus:border-red-500 
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                placeholder="Masukkan kata sandi baru">
                            <button type="button" onclick="togglePassword('new_password')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <i class="fas fa-eye" id="new_password_icon"></i>
                            </button>
                        </div>
                        <!-- Password strength indicator -->
                        <div class="mt-2">
                            <div class="flex space-x-1">
                                <div id="strength-bar-1" class="h-1 w-1/4 bg-gray-200 dark:bg-gray-600 rounded password-strength-bar"></div>
                                <div id="strength-bar-2" class="h-1 w-1/4 bg-gray-200 dark:bg-gray-600 rounded password-strength-bar"></div>
                                <div id="strength-bar-3" class="h-1 w-1/4 bg-gray-200 dark:bg-gray-600 rounded password-strength-bar"></div>
                                <div id="strength-bar-4" class="h-1 w-1/4 bg-gray-200 dark:bg-gray-600 rounded password-strength-bar"></div>
                            </div>
                            <p id="strength-text" class="text-xs text-gray-500 dark:text-gray-400 mt-1">Kekuatan kata sandi akan ditampilkan di sini</p>
                        </div>
                        @error('new_password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            <i class="fas fa-check-double mr-2 text-red-600"></i>
                            Konfirmasi Kata Sandi Baru *
                        </label>
                        <div class="relative">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                                class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm 
                                          focus:ring-red-500 focus:border-red-500 
                                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white"
                                placeholder="Konfirmasi kata sandi baru">
                            <button type="button" onclick="togglePassword('new_password_confirmation')"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                <i class="fas fa-eye" id="new_password_confirmation_icon"></i>
                            </button>
                        </div>
                        <div id="password-match-indicator" class="mt-2 hidden">
                            <p id="password-match-text" class="text-xs flex items-center">
                                <i id="password-match-icon" class="mr-1"></i>
                                <span id="password-match-message"></span>
                            </p>
                        </div>
                        @error('new_password_confirmation')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <button type="button" onclick="clearPasswordForm()"
                        class="px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors">
                        <i class="fas fa-shield-alt mr-2"></i>
                        Ubah Kata Sandi
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
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
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
    @push('scripts')
        <script>
            // Initialize all functionality when DOM is loaded
            document.addEventListener('DOMContentLoaded', function() {
                // Smooth scroll for Edit Profile button
                const editProfileBtn = document.querySelector('a[href="#profile-form"]');
                if (editProfileBtn) {
                    editProfileBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetElement = document.getElementById('profile-form');
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            // Add a subtle highlight effect
                            targetElement.classList.add('ring-2', 'ring-purple-500', 'ring-opacity-50');
                            setTimeout(() => {
                                targetElement.classList.remove('ring-2', 'ring-purple-500', 'ring-opacity-50');
                            }, 2000);
                        }
                    });
                }

                // Initialize Flatpickr for birth date
                const birthDateInput = document.getElementById('birth_date');

                if (birthDateInput) {
                    console.log('Initializing Flatpickr for birth_date input');

                    flatpickr(birthDateInput, {
                        dateFormat: "d/m/Y",
                        allowInput: true,
                        placeholder: "Pilih tanggal lahir",
                        maxDate: "today",
                        parseDate: function(datestr, format) {
                            // Handle dd/mm/yyyy format
                            if (datestr) {
                                const parts = datestr.split('/');
                                if (parts.length === 3) {
                                    return new Date(parts[2], parts[1] - 1, parts[0]);
                                }
                            }
                            return new Date(datestr);
                        },
                        onReady: function(selectedDates, dateStr, instance) {
                            instance.calendarContainer.classList.add('flatpickr-custom');
                            console.log('Flatpickr ready');
                        },
                        onChange: function(selectedDates, dateStr, instance) {
                            console.log('Date changed:', dateStr);
                        }
                    });
                } else {
                    console.log('Birth date input not found');
                }

                // Initialize avatar upload functionality
                const avatarInput = document.getElementById('avatar');
                if (avatarInput) {
                    avatarInput.addEventListener('change', function() {
                        handleAvatarPreview(this);
                    });
                }

                // Initialize drag and drop functionality
                initializeDragAndDrop();
            });

            // Avatar preview functionality
            function handleAvatarPreview(input) {
                const file = input.files[0];
                const previewContainer = document.getElementById('avatar-preview-container');
                const previewImage = document.getElementById('avatar-preview');
                const fileName = document.getElementById('avatar-file-name');

                if (file) {
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    if (!validTypes.includes(file.type)) {
                        showError('Format file tidak didukung. Gunakan PNG, JPG, atau GIF.');
                        input.value = '';
                        return;
                    }

                    // Validate file size (2MB)
                    const maxSize = 2 * 1024 * 1024; // 2MB in bytes
                    if (file.size > maxSize) {
                        showError('Ukuran file terlalu besar. Maksimal 2MB.');
                        input.value = '';
                        return;
                    }

                    // Create preview
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        fileName.textContent = `${file.name} (${formatFileSize(file.size)})`;
                        previewContainer.classList.remove('hidden');

                        // Add animation
                        previewContainer.style.opacity = '0';
                        previewContainer.style.transform = 'translateY(-10px)';
                        setTimeout(() => {
                            previewContainer.style.transition = 'all 0.3s ease';
                            previewContainer.style.opacity = '1';
                            previewContainer.style.transform = 'translateY(0)';
                        }, 10);
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                }
            }

            function removeAvatarPreview() {
                const input = document.getElementById('avatar');
                const previewContainer = document.getElementById('avatar-preview-container');

                input.value = '';
                previewContainer.classList.add('hidden');

                // Remove any error messages
                const errorDiv = document.querySelector('.avatar-error');
                if (errorDiv) {
                    errorDiv.remove();
                }
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            function showError(message) {
                // Remove existing error message
                const existingError = document.querySelector('.avatar-error');
                if (existingError) {
                    existingError.remove();
                }

                // Create new error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'avatar-error mt-2 p-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-lg';
                errorDiv.innerHTML = `
            <p class="text-sm text-red-600 dark:text-red-400 flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                ${message}
            </p>
        `;

                // Insert after avatar upload section
                const avatarSection = document.getElementById('avatar').closest('div').parentElement;
                avatarSection.appendChild(errorDiv);

                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (errorDiv) {
                        errorDiv.remove();
                    }
                }, 5000);
            }

            // Drag and drop functionality for avatar upload
            function initializeDragAndDrop() {
                const dropZone = document.querySelector('[for="avatar"]').nextElementSibling.querySelector('.group > div');
                const fileInput = document.getElementById('avatar');

                if (dropZone && fileInput) {
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        dropZone.addEventListener(eventName, preventDefaults, false);
                        document.body.addEventListener(eventName, preventDefaults, false);
                    });

                    ['dragenter', 'dragover'].forEach(eventName => {
                        dropZone.addEventListener(eventName, highlight, false);
                    });

                    ['dragleave', 'drop'].forEach(eventName => {
                        dropZone.addEventListener(eventName, unhighlight, false);
                    });

                    dropZone.addEventListener('drop', handleDrop, false);
                }

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                function highlight(e) {
                    dropZone.classList.add('border-purple-500', 'bg-purple-100', 'dark:bg-purple-900/30');
                }

                function unhighlight(e) {
                    dropZone.classList.remove('border-purple-500', 'bg-purple-100', 'dark:bg-purple-900/30');
                }

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;

                    if (files.length > 0) {
                        fileInput.files = files;
                        handleAvatarPreview(fileInput);
                    }
                }
            }

            // Password functionality
            function togglePassword(fieldId) {
                const field = document.getElementById(fieldId);
                const icon = document.getElementById(fieldId + '_icon');
                
                if (field.type === 'password') {
                    field.type = 'text';
                    icon.className = 'fas fa-eye-slash';
                } else {
                    field.type = 'password';
                    icon.className = 'fas fa-eye';
                }
            }

            function clearPasswordForm() {
                document.getElementById('current_password').value = '';
                document.getElementById('new_password').value = '';
                document.getElementById('new_password_confirmation').value = '';
                
                // Reset password strength
                resetPasswordStrength();
                
                // Hide password match indicator
                document.getElementById('password-match-indicator').classList.add('hidden');
            }

            function checkPasswordStrength(password) {
                let strength = 0;
                let feedback = [];

                // Length check
                if (password.length >= 8) {
                    strength += 1;
                } else {
                    feedback.push('minimal 8 karakter');
                }

                // Lowercase check
                if (/[a-z]/.test(password)) {
                    strength += 1;
                } else {
                    feedback.push('huruf kecil');
                }

                // Uppercase check
                if (/[A-Z]/.test(password)) {
                    strength += 1;
                } else {
                    feedback.push('huruf besar');
                }

                // Number/Symbol check
                if (/[\d\W]/.test(password)) {
                    strength += 1;
                } else {
                    feedback.push('angka atau simbol');
                }

                return { strength, feedback };
            }

            function updatePasswordStrength(password) {
                const { strength, feedback } = checkPasswordStrength(password);
                const strengthBars = ['strength-bar-1', 'strength-bar-2', 'strength-bar-3', 'strength-bar-4'];
                const strengthText = document.getElementById('strength-text');

                // Reset all bars
                strengthBars.forEach(barId => {
                    const bar = document.getElementById(barId);
                    bar.className = 'h-1 w-1/4 bg-gray-200 dark:bg-gray-600 rounded password-strength-bar';
                });

                // Update bars based on strength
                let color = '';
                let text = '';

                if (strength === 0) {
                    text = 'Masukkan kata sandi';
                } else if (strength === 1) {
                    color = 'bg-red-500 password-strength-bar';
                    text = 'Sangat lemah';
                } else if (strength === 2) {
                    color = 'bg-orange-500 password-strength-bar';
                    text = 'Lemah';
                } else if (strength === 3) {
                    color = 'bg-yellow-500 password-strength-bar';
                    text = 'Sedang';
                } else if (strength === 4) {
                    color = 'bg-green-500 password-strength-bar';
                    text = 'Kuat';
                }

                // Apply color to bars
                for (let i = 0; i < strength; i++) {
                    document.getElementById(strengthBars[i]).className = `h-1 w-1/4 ${color} rounded`;
                }

                // Update text
                if (feedback.length > 0 && strength < 4) {
                    strengthText.textContent = `${text} - Tambahkan: ${feedback.join(', ')}`;
                    strengthText.className = 'text-xs text-gray-600 dark:text-gray-400 mt-1';
                } else if (strength === 4) {
                    strengthText.textContent = text + ' - Kata sandi aman!';
                    strengthText.className = 'text-xs text-green-600 dark:text-green-400 mt-1';
                } else {
                    strengthText.textContent = text;
                    strengthText.className = 'text-xs text-gray-600 dark:text-gray-400 mt-1';
                }
            }

            function resetPasswordStrength() {
                const strengthBars = ['strength-bar-1', 'strength-bar-2', 'strength-bar-3', 'strength-bar-4'];
                strengthBars.forEach(barId => {
                    const bar = document.getElementById(barId);
                    bar.className = 'h-1 w-1/4 bg-gray-200 dark:bg-gray-600 rounded password-strength-bar';
                });
                document.getElementById('strength-text').textContent = 'Kekuatan kata sandi akan ditampilkan di sini';
                document.getElementById('strength-text').className = 'text-xs text-gray-500 dark:text-gray-400 mt-1';
            }

            function checkPasswordMatch() {
                const newPassword = document.getElementById('new_password').value;
                const confirmPassword = document.getElementById('new_password_confirmation').value;
                const indicator = document.getElementById('password-match-indicator');
                const icon = document.getElementById('password-match-icon');
                const message = document.getElementById('password-match-message');
                const text = document.getElementById('password-match-text');

                if (confirmPassword === '') {
                    indicator.classList.add('hidden');
                    return;
                }

                indicator.classList.remove('hidden');

                if (newPassword === confirmPassword) {
                    icon.className = 'fas fa-check-circle text-green-500';
                    message.textContent = 'Kata sandi cocok';
                    text.className = 'text-xs text-green-600 dark:text-green-400 flex items-center';
                } else {
                    icon.className = 'fas fa-times-circle text-red-500';
                    message.textContent = 'Kata sandi tidak cocok';
                    text.className = 'text-xs text-red-600 dark:text-red-400 flex items-center';
                }
            }

            // Initialize password events
            document.addEventListener('DOMContentLoaded', function() {
                const newPasswordField = document.getElementById('new_password');
                const confirmPasswordField = document.getElementById('new_password_confirmation');

                if (newPasswordField) {
                    newPasswordField.addEventListener('input', function() {
                        updatePasswordStrength(this.value);
                    });
                }

                if (confirmPasswordField) {
                    confirmPasswordField.addEventListener('input', checkPasswordMatch);
                }

                if (newPasswordField) {
                    newPasswordField.addEventListener('input', checkPasswordMatch);
                }
            });
        </script>
    @endpush
    @push('styles')
        <style>
            /* Custom Flatpickr styling */
            .flatpickr-custom {
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                border: 1px solid #e5e7eb;
                border-radius: 12px;
            }

            .flatpickr-custom .flatpickr-day:hover {
                background: #8b5cf6 !important;
                color: white !important;
            }

            .flatpickr-custom .flatpickr-day.selected {
                background: #7c3aed !important;
                border-color: #7c3aed !important;
            }

            .flatpickr-custom .flatpickr-day.today {
                border-color: #8b5cf6 !important;
                color: #8b5cf6 !important;
            }

            .flatpickr-custom .flatpickr-months .flatpickr-month {
                background: #f8fafc;
                border-radius: 8px 8px 0 0;
            }

            .flatpickr-custom .flatpickr-current-month select {
                color: #374151 !important;
                font-weight: 600;
            }

            .flatpickr-custom .flatpickr-current-month .flatpickr-monthDropdown-months {
                background: white;
                border: 1px solid #d1d5db;
                border-radius: 6px;
            }

            /* Dark mode adjustments */
            .dark .flatpickr-custom {
                background: #374151 !important;
                border-color: #4b5563 !important;
                color: white !important;
            }

            .dark .flatpickr-custom .flatpickr-months .flatpickr-month {
                background: #4b5563 !important;
            }

            .dark .flatpickr-custom .flatpickr-weekday {
                color: #d1d5db !important;
            }

            .dark .flatpickr-custom .flatpickr-day {
                color: #f3f4f6 !important;
            }

            .dark .flatpickr-custom .flatpickr-day.today {
                border-color: #a855f7 !important;
                color: #a855f7 !important;
            }

            /* Avatar upload animations */
            .group:hover .fas.fa-cloud-upload-alt {
                transform: translateY(-2px);
                transition: transform 0.2s ease;
            }

            /* Preview container animations */
            #avatar-preview-container {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            #avatar-preview-container.hidden {
                opacity: 0;
                transform: translateY(-10px);
                pointer-events: none;
            }

            /* Profile header enhancements */
            .profile-avatar-group:hover .profile-avatar {
                transform: scale(1.05);
            }

            .profile-avatar {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            /* Enhanced hover effects */
            .quick-action-btn {
                transition: all 0.2s ease;
                transform: translateY(0);
            }

            .quick-action-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(139, 92, 246, 0.15);
            }

            /* Smooth transitions for form sections */
            #profile-form {
                transition: all 0.3s ease;
            }

            /* Password strength indicator animations */
            .password-strength-bar {
                transition: all 0.3s ease;
            }

            /* Password section styling */
            .password-section {
                border-top: 2px solid #dc2626;
                background: linear-gradient(135deg, #fef2f2 0%, #ffffff 100%);
            }

            .dark .password-section {
                background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
                border-top-color: #ef4444;
            }

            /* Security badge animation */
            .security-badge {
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0%, 100% {
                    opacity: 1;
                }
                50% {
                    opacity: 0.7;
                }
            }

            /* Custom scrollbar for smooth experience */
            html {
                scroll-behavior: smooth;
            }
        </style>
    @endpush
</x-layouts.integrated-dashboard>
