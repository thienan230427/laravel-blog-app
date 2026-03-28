@extends('layouts.app')

@section('title', 'Chỉnh sửa bài viết - Tiệm Sách Nhà Gấu')

@section('bg_image', 'https://images.unsplash.com/photo-1499951360447-b19be8fe80f5?auto=format&fit=crop&w=1920&q=80')

@section('content')
<div class="max-w-4xl mx-auto mt-8 p-8 md:p-12 shadow-[0_8px_40px_rgba(0,0,0,0.6)] border border-white/20" style="background-color: rgba(0, 0, 0, 0.65); backdrop-filter: blur(40px); -webkit-backdrop-filter: blur(40px); border-radius: 3rem;">
    <div class="mb-10 text-center text-white">
        <h1 class="text-3xl md:text-4xl font-serif font-bold tracking-tight drop-shadow-md">Chỉnh sửa bài viết</h1>
        <p class="text-sm text-white/80 mt-2 drop-shadow-sm">Cập nhật nội dung hoặc thay đổi trạng thái bài viết của bạn.</p>
    </div>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="group relative">
            <label for="title" class="block text-xs font-semibold text-white/70 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-white">Tiêu đề bài viết</label>
            <input type="text" name="title" id="title" class="w-full border border-white/20 px-4 py-4 text-2xl font-serif text-white placeholder-white/50 transition-colors shadow-inner outline-none focus:ring-2 focus:ring-white/60 focus:border-transparent" style="background-color: rgba(0, 0, 0, 0.4); border-radius: 1.5rem;" placeholder="Một tựa đề thật thu hút..." value="{{ old('title', $post->title) }}" required>
            @error('title')
                <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div class="group relative">
            <label for="content" class="block text-xs font-semibold text-white/70 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-white">Nội dung</label>
            <textarea name="content" id="content" rows="15" class="w-full border border-white/20 px-6 py-5 text-lg font-serif text-white placeholder-white/50 leading-relaxed transition-colors resize-none shadow-inner outline-none focus:ring-2 focus:ring-white/60 focus:border-transparent" style="background-color: rgba(0, 0, 0, 0.4); border-radius: 1.5rem;" placeholder="Bắt đầu gõ những dòng chữ đầu tiên..." required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div class="group relative">
            <label for="status" class="block text-xs font-semibold text-white/70 uppercase tracking-wider mb-2 transition-colors group-focus-within:text-white">Trạng thái</label>
            <select name="status" id="status" class="w-full md:w-1/3 border border-white/20 px-4 py-3 text-sm text-white transition-colors cursor-pointer appearance-none outline-none focus:ring-2 focus:ring-white/60 focus:border-transparent" style="background-color: rgba(0, 0, 0, 0.4); border-radius: 1rem;">
                <option class="text-gray-900" value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Lưu bản nháp</option>
                <option class="text-gray-900" value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Xuất bản ngay</option>
            </select>
            @error('status')
                <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end gap-4 pt-6 border-t border-white/20">
            <a href="{{ route('posts.index') }}" class="px-6 py-3 text-sm font-medium text-white/70 hover:text-white transition-colors">Huỷ bỏ</a>
            <button type="submit" class="px-8 py-3 bg-white/20 hover:bg-white/30 text-white border border-white/30 text-sm font-bold rounded-xl backdrop-blur-md transition-all shadow-lg flex items-center gap-2 group">
                Cập nhật bài viết <span class="group-hover:translate-x-1 transition-transform">→</span>
            </button>
        </div>
    </form>
</div>
@endsection