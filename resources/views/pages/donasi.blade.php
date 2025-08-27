<x-layouts.app title="Donasi Buku - Rumah Literasi">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-500 to-green-700 dark:from-green-600 dark:to-green-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Donasi Buku
                </h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Berbagi adalah peduli. Donasikan buku Anda dan berikan kesempatan belajar kepada yang membutuhkan
                </p>
            </div>
        </div>
    </div>

    <!-- Login Required Notice -->
    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-400 dark:border-yellow-500 p-6 mb-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400 dark:text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700 dark:text-yellow-300">
                        <strong>Perhatian:</strong> Anda perlu masuk ke akun terlebih dahulu untuk dapat mendonasikan buku.
                        <button class="ml-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors">
                            Masuk dengan Google
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Donation Form -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 transition-colors duration-300">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Form Donasi Buku</h2>
            
            <form class="space-y-6">
                <!-- Personal Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor Telepon</label>
                        <input type="tel" id="phone" name="phone" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kota</label>
                        <input type="text" id="city" name="city" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <!-- Book Information -->
                <div class="border-t border-gray-200 dark:border-gray-600 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Informasi Buku</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="book_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Buku</label>
                            <input type="text" id="book_title" name="book_title" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Penulis</label>
                            <input type="text" id="author" name="author" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                            <select id="category" name="category" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Kategori</option>
                                <option value="pendidikan">Pendidikan</option>
                                <option value="fiksi">Fiksi</option>
                                <option value="non-fiksi">Non-Fiksi</option>
                                <option value="anak">Anak-anak</option>
                                <option value="agama">Agama</option>
                                <option value="sains">Sains & Teknologi</option>
                                <option value="sejarah">Sejarah</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label for="condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kondisi Buku</label>
                            <select id="condition" name="condition" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                                <option value="">Pilih Kondisi</option>
                                <option value="baru">Baru</option>
                                <option value="seperti-baru">Seperti Baru</option>
                                <option value="baik">Baik</option>
                                <option value="cukup">Cukup</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah</label>
                            <input type="number" id="quantity" name="quantity" min="1" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Tambahan</label>
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="Ceritakan tentang buku yang akan didonasikan..."></textarea>
                    </div>
                </div>

                <!-- Pickup Information -->
                <div class="border-t border-gray-200 dark:border-gray-600 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Informasi Pickup</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Metode Pengambilan</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center">
                                    <input id="pickup_home" name="pickup_method" type="radio" value="home" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                    <label for="pickup_home" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Dijemput di rumah</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="pickup_dropoff" name="pickup_method" type="radio" value="dropoff" class="focus:ring-green-500 h-4 w-4 text-green-600 border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                    <label for="pickup_dropoff" class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-300">Saya antar ke titik kumpul</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Alamat Lengkap</label>
                            <textarea id="address" name="address" rows="3" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="Masukkan alamat lengkap untuk pickup atau titik kumpul terdekat"></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="pickup_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal Pickup</label>
                                <input type="date" id="pickup_date" name="pickup_date" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                            </div>
                            <div>
                                <label for="pickup_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu yang Diinginkan</label>
                                <select id="pickup_time" name="pickup_time" required class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
                                    <option value="">Pilih Waktu</option>
                                    <option value="pagi">Pagi (08:00 - 12:00)</option>
                                    <option value="siang">Siang (12:00 - 15:00)</option>
                                    <option value="sore">Sore (15:00 - 18:00)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit" class="w-full bg-green-600 text-white py-3 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 font-medium text-lg">
                        Kirim Donasi Buku
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="bg-gray-50 dark:bg-gray-700 py-16 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Mengapa Donasi Buku?</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">Setiap buku yang Anda donasikan akan memberikan dampak positif</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 dark:bg-green-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Berbagi Pengetahuan</h3>
                    <p class="text-gray-600 dark:text-gray-300">Buku yang tidak terpakai menjadi sumber pengetahuan berharga bagi orang lain</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-blue-100 dark:bg-blue-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Ramah Lingkungan</h3>
                    <p class="text-gray-600 dark:text-gray-300">Mengurangi limbah dan memberikan kehidupan kedua pada buku</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-purple-100 dark:bg-purple-800 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Membantu Sesama</h3>
                    <p class="text-gray-600 dark:text-gray-300">Memberikan akses pendidikan kepada mereka yang membutuhkan</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
