<!DOCTYPE html>
<html lang="id" class="scroll-smooth" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Rumah Literasi - Literasi Ranggi' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Fallback FontAwesome dari jsDelivr jika CDN utama gagal -->
    <script>
        // Check if FontAwesome loaded, if not load from backup CDN
        document.addEventListener('DOMContentLoaded', function() {
            const testIcon = document.createElement('i');
            testIcon.className = 'fas fa-home';
            testIcon.style.position = 'absolute';
            testIcon.style.left = '-9999px';
            document.body.appendChild(testIcon);
            
            const computedStyle = window.getComputedStyle(testIcon, ':before');
            if (computedStyle.content === 'none' || computedStyle.content === '') {
                const fallbackLink = document.createElement('link');
                fallbackLink.rel = 'stylesheet';
                fallbackLink.href = 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';
                document.head.appendChild(fallbackLink);
            }
            document.body.removeChild(testIcon);
        });
    </script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        // Check for saved theme preference or default to 'light' mode
        const savedTheme = localStorage.getItem('theme') || 'light';
        if (savedTheme === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.setAttribute('data-theme', 'dark');
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-300 pt-16">
    <x-partials.navbar />

    {{ $slot }}

    <x-partials.footer />

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const btn = document.querySelector('.mobile-menu-button');
            const menu = document.querySelector('.mobile-menu');

            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
            }

            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            let lastScrollY = window.scrollY;

            function updateNavbar() {
                const currentScrollY = window.scrollY;
                
                if (currentScrollY > 50) {
                    // Add more glassmorphism effect when scrolled
                    navbar.classList.remove('bg-white/80', 'dark:bg-gray-800/80');
                    navbar.classList.add('bg-white/95', 'dark:bg-gray-800/95', 'shadow-lg');
                } else {
                    // Reset to original state
                    navbar.classList.remove('bg-white/95', 'dark:bg-gray-800/95', 'shadow-lg');
                    navbar.classList.add('bg-white/80', 'dark:bg-gray-800/80');
                }

                lastScrollY = currentScrollY;
            }

            // Listen for scroll events
            window.addEventListener('scroll', updateNavbar);

            // Dark mode toggle functionality
            const themeToggleBtn = document.getElementById('theme-toggle');
            const mobileThemeToggleBtn = document.getElementById('mobile-theme-toggle');
            const darkIcon = document.getElementById('theme-toggle-dark-icon');
            const lightIcon = document.getElementById('theme-toggle-light-icon');
            const mobileDarkIcon = document.getElementById('mobile-theme-toggle-dark-icon');
            const mobileLightIcon = document.getElementById('mobile-theme-toggle-light-icon');

            // Function to update icons based on theme
            function updateIcons() {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const isDark = currentTheme === 'dark';
                
                if (darkIcon && lightIcon) {
                    if (isDark) {
                        darkIcon.classList.add('hidden');
                        lightIcon.classList.remove('hidden');
                    } else {
                        darkIcon.classList.remove('hidden');
                        lightIcon.classList.add('hidden');
                    }
                }

                if (mobileDarkIcon && mobileLightIcon) {
                    if (isDark) {
                        mobileDarkIcon.classList.add('hidden');
                        mobileLightIcon.classList.remove('hidden');
                    } else {
                        mobileDarkIcon.classList.remove('hidden');
                        mobileLightIcon.classList.add('hidden');
                    }
                }
            }

            // Function to toggle theme
            function toggleTheme() {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                // Update data-theme attribute
                document.documentElement.setAttribute('data-theme', newTheme);
                
                // Update class for Tailwind CSS compatibility
                if (newTheme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
                
                // Save to localStorage
                localStorage.setItem('theme', newTheme);
                
                // Update icons
                updateIcons();
            }

            // Initialize icons on page load
            updateIcons();

            // Add event listeners
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', toggleTheme);
            }
            if (mobileThemeToggleBtn) {
                mobileThemeToggleBtn.addEventListener('click', toggleTheme);
            }
        });
    </script>
</body>
</html>