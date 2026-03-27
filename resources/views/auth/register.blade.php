@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
<div class="flex items-center justify-center min-h-[70vh] py-10">
    <div class="w-full max-w-lg bg-white dark:bg-gray-800 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_30px_rgb(0,0,0,0.2)] p-10 transition-all duration-300">
        
        <div class="text-center mb-10">
            <h1 class="text-3xl font-serif font-bold text-brand-dark dark:text-gray-100 mb-2 tracking-tight">Viết Tiếp Hành Trình</h1>
            <p class="text-sm text-text-muted dark:text-gray-400">Tạo tài khoản để bắt đầu chia sẻ câu chuyện của bạn.</p>
        </div>

        <form method="POST" action="/register" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Username Input -->
                <div class="relative group">
                    <label for="username" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Tên đăng nhập *</label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" required
                        class="w-full px-4 py-3 bg-brand-beige/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="VD: sachi99">
                    @error('username')
                        <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fullname Input -->
                <div class="relative group">
                    <label for="fullname" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Họ và tên *</label>
                    <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required
                        class="w-full px-4 py-3 bg-brand-beige/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        placeholder="VD: Nguyễn Văn A">
                    @error('fullname')
                        <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Password Input -->
            <div class="relative group">
                <label for="password" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Mật khẩu *</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 bg-brand-beige/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="Tối thiểu 8 ký tự">
                @error('password')
                    <p class="text-red-500 text-xs mt-2 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirm Input -->
            <div class="relative group">
                <label for="password_confirmation" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Xác nhận Mật khẩu *</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-3 bg-brand-beige/50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown outline-none transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    placeholder="Nhập lại mật khẩu ở trên">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-brand-brown text-white font-medium py-3.5 rounded-xl hover:bg-brand-dark focus:ring-4 focus:ring-brand-brown/30 transition-all shadow-md mt-6 flex justify-center items-center gap-2 group">
                <span>Mở Tài Khoản</span>
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>
        </form>

        <div class="mt-8 text-center text-sm text-text-muted">
            Đã có góc nhỏ của mình? 
            <a href="/login" class="text-brand-brown font-medium hover:underline decoration-2 underline-offset-4">Đăng nhập</a>
        </div>
    </div>
</div>
@endsection
