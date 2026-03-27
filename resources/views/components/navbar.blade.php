<nav class="sticky top-0 z-50 bg-brand-light/90 backdrop-blur-md border-b border-gray-200 dark:bg-gray-900/90 dark:border-gray-800 transition-colors">
    <div class="container mx-auto max-w-5xl px-4 py-4 flex items-center justify-between">
        
        <!-- Logo -->
        <a href="/" class="text-2xl font-serif font-bold tracking-tight text-brand-dark dark:text-gray-100 flex items-center gap-2 group">
            <img src="https://cdn-icons-png.flaticon.com/512/3662/3662817.png" alt="Bear Reading" class="w-8 h-8 group-hover:rotate-12 transition-transform drop-shadow-sm"> 
            Tiệm Sách Nhà Gấu
        </a>

        <!-- Search Bar (Desktop) -->
        <div class="hidden md:flex flex-1 max-w-md mx-8 relative">
            <input type="text" placeholder="Tìm kiếm sách, tác giả..." class="w-full bg-brand-beige dark:bg-gray-800 text-sm rounded-full px-5 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-brown/50 transition-shadow">
            <svg class="w-5 h-5 absolute right-4 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>

        <!-- Right Menu -->
        <div class="flex items-center gap-6">
            <button onclick="toggleDarkMode()" class="text-gray-500 hover:text-brand-brown transition-colors" title="Chế độ đọc đêm">
                🌙
            </button>

            @guest
                <a href="/login" class="text-sm font-medium hover:text-brand-brown transition-colors">Đăng nhập</a>
                <a href="/register" class="text-sm font-medium bg-brand-brown text-white px-5 py-2.5 rounded-full hover:bg-brand-dark transition-colors shadow-sm">Bắt đầu viết</a>
            @endguest

            @auth
                <div class="relative group cursor-pointer">
                    <div class="flex items-center gap-2">
                        <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->fullname).'&color=FDFBF7&background=8D6E63' }}" alt="Avatar" class="w-9 h-9 rounded-full border border-gray-200 object-cover">
                        <span class="text-sm font-medium hidden md:block">{{ auth()->user()->username }}</span>
                    </div>
                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2">
                        @if(auth()->user()->isAdmin)
                            <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-brand-beige dark:hover:bg-gray-700">Trang quản trị</a>
                        @endif
                        <a href="/posts/create" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-brand-beige dark:hover:bg-gray-700">Viết bài mới</a>
                        <a href="/my-posts" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-brand-beige dark:hover:bg-gray-700">Bài viết của tôi</a>
                        <hr class="my-1 border-gray-100 dark:border-gray-700">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
