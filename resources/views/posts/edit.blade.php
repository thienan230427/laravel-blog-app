@extends('layouts.app')

@section('title', 'Chỉnh sửa bài viết - Tiệm Sách Nhà Gấu')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white dark:bg-gray-800 rounded-3xl p-8 md:p-12 shadow-[0_8px_40px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_40px_rgb(0,0,0,0.2)] border border-gray-100 dark:border-gray-700">
    <div class="mb-10 text-center">
        <h1 class="text-3xl md:text-4xl font-serif font-bold text-brand-dark dark:text-gray-100 tracking-tight">Chỉnh sửa bài viết</h1>
        <p class="text-sm text-text-muted dark:text-gray-400 mt-2">Cập nhật nội dung hoặc thay đổi trạng thái bài viết của bạn.</p>
    </div>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="group relative">
            <label for="title" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Tiêu đề bài viết</label>
            <input type="text" name="title" id="title" class="w-full bg-brand-beige/30 dark:bg-gray-900/50 border-0 border-b-2 border-gray-200 dark:border-gray-700 focus:ring-0 focus:border-brand-brown px-0 py-3 text-2xl font-serif text-brand-dark dark:text-gray-100 transition-colors" placeholder="Một tựa đề thật thu hút..." value="{{ old('title', $post->title) }}" required>
            @error('title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div class="group relative">
            <label for="content" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Nội dung</label>
            <textarea name="content" id="content" rows="15" class="w-full bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-2xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown px-6 py-5 text-lg font-serif text-brand-dark dark:text-gray-200 leading-relaxed transition-colors resize-none shadow-inner" placeholder="Bắt đầu gõ những dòng chữ đầu tiên..." required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div class="group relative">
            <label for="status" class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-brand-brown">Trạng thái</label>
            <select name="status" id="status" class="w-full md:w-1/3 bg-gray-50 dark:bg-gray-900/50 border border-gray-200 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-brand-brown/30 focus:border-brand-brown px-4 py-3 text-sm text-brand-dark dark:text-gray-200 transition-colors cursor-pointer">
                <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Lưu bản nháp</option>
                <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Xuất bản ngay</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-700">
            <a href="{{ route('posts.index') }}" class="px-6 py-3 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-brand-dark transition-colors">Huỷ bỏ</a>
            <button type="submit" class="px-8 py-3 bg-brand-brown text-white text-sm font-medium rounded-xl hover:bg-brand-dark transition-all shadow-md flex items-center gap-2 group">
                Cập nhật bài viết <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>
        </div>
    </form>
</div>
@endsection