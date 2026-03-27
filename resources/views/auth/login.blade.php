@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<!-- Background Nature -->
<div class="fixed inset-0 z-[-1]">
    <img src="https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&q=80" alt="Nature Background" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-brand-light/30 dark:bg-gray-900/60 backdrop-blur-sm"></div>
</div>

<div class="flex items-center justify-center min-h-[75vh]">
    <!-- Form Container: Mica Blur (Glassmorphism) effect -->
    <div class="w-full max-w-md bg-white/60 dark:bg-gray-800/60 backdrop-blur-xl border border-white/40 dark:border-gray-700/50 rounded-3xl shadow-[0_8px_32px_0_rgba(31,38,135,0.07)] dark:shadow-[0_8px_32px_0_rgba(0,0,0,0.3)] p-10 transition-all duration-300 transform hover:-translate-y-1">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-serif font-bold text-brand-dark dark:text-gray-100 mb-2 tracking-tight">Mở Cửa</h1>
            <p class="text-sm text-text-muted dark:text-gray-300">Trở lại góc đọc sách nhỏ của bạn.</p>
        </div>

        @if(session('error'))
            <div class="mb-6 bg-red-50/90 text-red-600 p-4 rounded-xl text-sm border border-red-100 flex items-start gap-3">
                <span>⚠️</span> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-6">
            @csrf
            
            <!-- Username Input -->
            <div class="relative group">
                <label for="username" class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Tên đăng nhập</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                    class="w-full px-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200/60 dark:border-gray-600/50 rounded-xl focus:ring-2 focus:ring-brand-brown/50 focus:border-brand-brown outline-none transition-all dark:text-white backdrop-blur-md"
                    placeholder="Nhập tên tài khoản của bạn...">
                @error('username')
                    <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="relative group">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider transition-colors group-focus-within:text-brand-brown">Mật khẩu</label>
                    <a href="#" class="text-xs text-brand-brown hover:text-brand-dark dark:hover:text-brand-beige transition-colors font-medium">Quên mật khẩu?</a>
                </div>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 bg-white/50 dark:bg-gray-900/50 border border-gray-200/60 dark:border-gray-600/50 rounded-xl focus:ring-2 focus:ring-brand-brown/50 focus:border-brand-brown outline-none transition-all dark:text-white backdrop-blur-md"
                    placeholder="••••••••">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-brand-brown/90 hover:bg-brand-dark text-white font-medium py-3.5 rounded-xl focus:ring-4 focus:ring-brand-brown/30 transition-all shadow-lg mt-4 flex justify-center items-center gap-2 group backdrop-blur-sm">
                <span>Đăng Nhập</span>
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-600 dark:text-gray-300">
            Chưa có không gian riêng? 
            <a href="/register" class="text-brand-brown dark:text-brand-beige font-semibold hover:underline decoration-2 underline-offset-4">Tạo tài khoản</a>
        </div>
    </div>
</div>
@endsection
