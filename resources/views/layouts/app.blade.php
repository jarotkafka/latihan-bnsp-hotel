<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Crown Towers Hotel - Luxury accommodation with world-class service and elegant rooms in the heart of the city.">
    <title>@yield('title', 'Crown Towers Hotel - Luxury & Elegance')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); min-height: 100vh; }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        /* Smooth transitions */
        .transition-all { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        /* Backdrop blur enhancement */
        @supports (backdrop-filter: blur(10px)) {
            .backdrop-blur-md { backdrop-filter: blur(16px); }
        }
        /* Luxury enhancements */
        .luxury-shadow { box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); }
        .text-shadow { text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        .btn-glow { box-shadow: 0 0 20px rgba(245, 158, 11, 0.5); }
        .btn-glow:hover { box-shadow: 0 0 30px rgba(245, 158, 11, 0.7); }
        .fade-in { animation: fadeIn 1s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .logo-hover { transition: transform 0.3s ease; }
        .logo-hover:hover { transform: scale(1.05); }
        .menu-item { position: relative; overflow: hidden; }
        .menu-item::after { content: ''; position: absolute; bottom: 0; left: -100%; width: 100%; height: 2px; background: linear-gradient(90deg, #f59e0b, #d97706); transition: left 0.3s ease; }
        .menu-item:hover::after { left: 0; }
        .footer-gradient { background: linear-gradient(135deg, #1f2937 0%, #374151 100%); }
    </style>
</head>
<body class="text-gray-900 antialiased">

    <!-- Preloader (Optional for professional feel) -->
    <div id="preloader" class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-yellow-500 mb-4"></div>
        <p class="text-gray-600 font-medium">Loading Crown Towers...</p>
    </div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/95 backdrop-blur-md border-b border-gray-200 text-gray-900 z-50 luxury-shadow fade-in transition-all duration-300">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3 logo-hover">
                    <i class="fas fa-crown text-2xl sm:text-3xl text-yellow-500"></i>
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 text-shadow">Crown Towers</h1>
                </div>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex items-center space-x-10 font-medium text-gray-700">
                    <li class="menu-item"><a href="{{ route('home') }}" class="relative py-2 hover:text-yellow-500 transition-colors duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-500 after:transition-all after:duration-300 hover:after:w-full">Home</a></li>
                    <li class="menu-item"><a href="#rooms" class="relative py-2 hover:text-yellow-500 transition-colors duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-500 after:transition-all after:duration-300 hover:after:w-full">Rooms</a></li>
                    <li class="menu-item"><a href="#pricing" class="relative py-2 hover:text-yellow-500 transition-colors duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-500 after:transition-all after:duration-300 hover:after:w-full">Pricing</a></li>
                    <li class="menu-item"><a href="#about" class="relative py-2 hover:text-yellow-500 transition-colors duration-300 after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-yellow-500 after:transition-all after:duration-300 hover:after:w-full">About</a></li>
                </ul>

                <!-- CTA Button & Mobile Toggle -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('pesan.create') }}"
                       class="hidden md:block btn-glow bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <i class="fas fa-calendar-check mr-2"></i>Book Now
                    </a>
                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden text-gray-700 focus:outline-none hover:text-yellow-500 transition-colors duration-300">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white/95 backdrop-blur-md px-4 py-6 space-y-4 border-t border-gray-200 shadow-lg">
                <a href="{{ route('home') }}" class="block py-3 px-4 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-all duration-300 font-medium menu-item">Home</a>
                <a href="#rooms" class="block py-3 px-4 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-all duration-300 font-medium menu-item">Rooms</a>
                <a href="#pricing" class="block py-3 px-4 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-all duration-300 font-medium menu-item">Pricing</a>
                <a href="#about" class="block py-3 px-4 rounded-lg hover:bg-yellow-50 hover:text-yellow-600 transition-all duration-300 font-medium menu-item">About</a>
                <a href="{{ route('pesan.create') }}"
                   class="block py-3 px-4 btn-glow bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg font-semibold text-center transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-calendar-check mr-2"></i>Book Now
                </a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-20 lg:pt-24 fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-gradient text-gray-300 py-12 mt-20 border-t border-gray-800 luxury-shadow fade-in">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
                <!-- Hotel Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center justify-center md:justify-start space-x-3 mb-4">
                        <i class="fas fa-crown text-2xl text-yellow-500"></i>
                        <h3 class="text-xl font-bold text-white text-shadow">Crown Towers</h3>
                    </div>
                    <p class="text-sm leading-relaxed mb-4">Experience luxury redefined at Crown Towers Hotel. World-class amenities, elegant rooms, and exceptional service await you.</p>
                    <div class="flex justify-center md:justify-start space-x-6 text-sm">
                        <a href="#" class="hover:text-yellow-400 transition-all duration-300 transform hover:scale-110"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-all duration-300 transform hover:scale-110"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-all duration-300 transform hover:scale-110"><i class="fab fa-twitter text-xl"></i></a>
                        <a href="#" class="hover:text-yellow-400 transition-all duration-300 transform hover:scale-110"><i class="fab fa-linkedin text-xl"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-yellow-400 transition-colors duration-300">Home</a></li>
                        <li><a href="#rooms" class="hover:text-yellow-400 transition-colors duration-300">Rooms</a></li>
                        <li><a href="#pricing" class="hover:text-yellow-400 transition-colors duration-300">Pricing</a></li>
                        <li><a href="#about" class="hover:text-yellow-400 transition-colors duration-300">About</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-lg font-semibold text-white mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center justify-center md:justify-start space-x-2">
                            <i class="fas fa-phone text-yellow-500"></i>
                            <span>+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center justify-center md:justify-start space-x-2">
                            <i class="fas fa-envelope text-yellow-500"></i>
                            <span>info@crowntowers.com</span>
                        </li>
                        <li class="flex items-center justify-center md:justify-start space-x-2">
                            <i class="fas fa-map-marker-alt text-yellow-500"></i>
                            <span>Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-800 mt-8 pt-6 text-center text-sm">
                <p>&copy; {{ date('Y') }} Crown Towers Hotel. All rights reserved. | Designed with <i class="fas fa-heart text-red-500"></i> for Luxury & Elegance</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Preloader
        window.addEventListener('load', () => {
            document.getElementById('preloader').style.display = 'none';
        });

        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu on outside click
        document.addEventListener('click', (e) => {
            if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Navbar scroll effect
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }
            lastScrollTop = scrollTop;
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>
</html>
