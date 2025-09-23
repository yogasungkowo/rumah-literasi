<footer class="bg-gray-800 dark:bg-gray-900 text-white transition-colors duration-300">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="relative">
                        <img src="{{ asset('image/Logo_Rumah_Literasi_Ranggi.png') }}" alt="Rumah Literasi" class="h-16 w-16 object-contain rounded-lg bg-white/10 p-1">
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-green-400">Rumah Literasi Ranggi</h3>
                    </div>
                </div>
                <p class="text-gray-300 dark:text-gray-400 mb-4">
                    Mencerdaskan bangsa melalui literasi dan pendidikan yang berkualitas untuk semua kalangan.
                </p>
                
                <!-- Social Media Links -->
                <div class="mb-4">
                    <x-social-media-links class="flex space-x-4" />
                </div>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4 text-green-400">Menu</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-300 dark:text-gray-400 hover:text-white dark:hover:text-green-400 transition-colors">Beranda</a></li>
                    <li><a href="/donasi" class="text-gray-300 dark:text-gray-400 hover:text-white dark:hover:text-green-400 transition-colors">Donasi Buku</a></li>
                    <li><a href="/pelatihan" class="text-gray-300 dark:text-gray-400 hover:text-white dark:hover:text-green-400 transition-colors">Ikuti Pelatihan</a></li>
                    <li><a href="/sponsorship" class="text-gray-300 dark:text-gray-400 hover:text-white dark:hover:text-green-400 transition-colors">Sponsorship</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 dark:text-gray-400 hover:text-white dark:hover:text-green-400 transition-colors">Hubungi Kami</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-lg font-semibold mb-4 text-green-400">Kontak</h4>
                <div class="space-y-2 text-gray-300 dark:text-gray-400">
                    <p>Email: info@rumahliterasi.com</p>
                    <p>Telepon: (021) 123-4567</p>
                    <p>Alamat: Jl. Literasi No. 123, Jakarta</p>
                </div>
                <a href="{{ route('contact') }}" class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition-colors font-medium text-sm">
                    Hubungi Kami
                </a>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-300">&copy; 2025 Rumah Literasi Ranggi. All rights reserved.</p>
        </div>
    </div>
</footer>
