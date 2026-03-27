@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
<!-- Background Nature -->
<div class="fixed inset-0 z-[-1]">
    <img src="https://images.unsplash.com/photo-1518173946687-a4c8892bbd9f?auto=format&fit=crop&q=80" alt="Nature Background" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-brand-light/30 dark:bg-gray-900/60 backdrop-blur-sm"></div>
</div>

<div class="flex items-center justify-center min-h-[75vh] py-10">
    <!-- Form Container: Mica Blur (Glassmorphism) effect -->
    <div class="w-full max-w-lg bg-white/60 dark:bg-gray-800/60 backdrop-blur-xl border border-white/40 dark:border-gray-700/50 rounded-3xl shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] dark:shadow-[0_8px_32px_0_rgba(0,0,0,0.3)] p-10 transition-all duration-300 transform hover:-translate-y-1">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-serif font-bold text-brand-dark dark:text-gray-100 mb-2 tracking-tight">Viết Tiếp Hành Trình</h1>
            <p class="text-sm text-text-muted dark:text-gray-300">Tạo tài khoản để bắt đầu chia sẻ câu chuyện của bạn.</p>
        </div>

        <form method="POST" action="/register" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Username Input -->
                <div class="relative group">
                    <label for="username" class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Tên đăng nhập *</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                        class="w-full px-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200/60 dark:border-gray-600/50 rounded-xl focus:ring-2 focus:ring-brand-brown/50 focus:border-brand-brown outline-none transition-all dark:text-white backdrop-blur-md"
                        placeholder="VD: sachi99">
                    @error('username')
                        <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fullname Input -->
                <div class="relative group">
                    <label for="fullname" class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Họ và tên *</label>
                    <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required
                        class="w-full px-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200/60 dark:border-gray-600/50 rounded-xl focus:ring-2 focus:ring-brand-brown/50 focus:border-brand-brown outline-none transition-all dark:text-white backdrop-blur-md"
                        placeholder="VD: Nguyễn Văn A">
                    @error('fullname')
                        <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Password Input -->
            <div class="relative group">
                <label for="password" class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Mật khẩu *</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200/60 dark:border-gray-600/50 rounded-xl focus:ring-2 focus:ring-brand-brown/50 focus:border-brand-brown outline-none transition-all dark:text-white backdrop-blur-md"
                    placeholder="Tối thiểu 8 ký tự">
                @error('password')
                    <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirm Input -->
            <div class="relative group">
                <label for="password_confirmation" class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Xác nhận Mật khẩu *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200/60 dark:border-gray-600/50 rounded-xl focus:ring-2 focus:ring-brand-brown/50 focus:border-brand-brown outline-none transition-all dark:text-white backdrop-blur-md"
                    placeholder="Nhập lại mật khẩu ở trên">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-brand-brown/90 hover:bg-brand-dark text-white font-medium py-3.5 rounded-xl focus:ring-4 focus:ring-brand-brown/30 transition-all shadow-lg mt-6 flex justify-center items-center gap-2 group backdrop-blur-sm">
                <span>Mở Tài Khoản</span>
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600 dark:text-gray-300">
            Đã có góc nhỏ của mình? 
            <a href="/login" class="text-brand-brown dark:text-brand-beige font-semibold hover:underline decoration-2 underline-offset-4">Đăng nhập</a>
        </div>
    </div>
</div>
@endsection