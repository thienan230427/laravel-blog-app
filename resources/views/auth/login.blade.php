@extends('layouts.app')

@section('title', 'Đăng nhập')

@section('content')
<div class="flex items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] p-10 transition-all duration-300 transform hover:-translate-y-1">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-serif font-bold text-brand-dark dark:text-gray-100 mb-2 tracking-tight">Mở Cửa</h1>
            <p class="text-sm text-text-muted dark:text-gray-400">Trở lại góc đọc sách nhỏ của bạn.</p>
        </div>

        @if(session('error'))
            <div class="mb-6 bg-red-50 text-red-600 p-4 rounded-xl text-sm border border-red-100 flex items-start gap-3">
                <span>⚠️</span> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login" class="space-y-6">
            @csrf
            
            <!-- Username Input -->
            <div class="relative group">
                <label for="username" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Tên đăng nhập</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                    class="w-full px-4 py-3 bg-brand-beige/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="Nhập tên tài khoản của bạn...">
                @error('username')
                    <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="relative group">
                <div class="flex items-center justify-between mb-2">
                    <label for="password" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider transition-colors group-focus-within:text-brand-brown">Mật khẩu</label>
                    <a href="#" class="text-xs text-brand-brown hover:text-brand-dark transition-colors font-medium">Quên mật khẩu?</a>
                </div>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 bg-brand-beige/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="••••••••">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-brand-brown text-white font-medium py-3.5 rounded-xl hover:bg-brand-dark focus:ring-4 focus:ring-brand-brown/30 transition-all shadow-md mt-4 flex justify-center items-center gap-2 group">
                <span>Đăng Nhập</span>
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-text-muted">
            Chưa có không gian riêng? 
            <a href="/register" class="text-brand-brown font-medium hover:underline decoration-2 underline-offset-4">Tạo tài khoản</a>
        </div>
    </div>
</div>
@endsection
