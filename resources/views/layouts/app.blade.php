<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog') - Tiệm Sách Nhà Gấu</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600;700&family=Merriweather:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-brand-light text-text-main font-sans flex flex-col min-h-screen transition-colors duration-300">
    <!-- Navbar Component -->
    <x-navbar />

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8 max-w-5xl">
        @yield('content')
    </main>

    <!-- Footer Component -->
    <x-footer />

    <script>
        // Toggle Dark Mode
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
        }
    </script>
</body>
</html>
