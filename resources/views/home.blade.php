@extends('layouts.app')

@section('title', 'Tiệm Sách Nhà Gấu - Gương Tri Thức')

@section('content')
<!-- Hero Section -->
<div class="mb-16 text-center">
    <h1 class="text-4xl md:text-5xl font-serif font-bold text-brand-dark dark:text-gray-100 mb-4 tracking-tight">Góc Đọc Nhỏ Của Bạn</h1>
    <p class="text-lg text-text-muted dark:text-gray-400 max-w-2xl mx-auto leading-relaxed">Không gian yên bình để lưu giữ và chia sẻ những câu chuyện, ghi chú sách, và góc nhìn cuộc sống.</p>
</div>

<!-- Blog List: Card Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}" class="group block bg-white dark:bg-gray-800 rounded-3xl overflow-hidden shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] dark:hover:shadow-[0_8px_30px_rgb(0,0,0,0.3)] border border-gray-100 dark:border-gray-700 transition-all duration-300 transform hover:-translate-y-1">
            
            <!-- Cover Image Mock -->
            <div class="h-48 bg-brand-beige dark:bg-gray-700 w-full relative overflow-hidden">
                <!-- Random nature image from unsplash keyword -->
                <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=600&q=80" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm text-brand-brown dark:text-brand-beige text-xs font-semibold rounded-full shadow-sm">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Unknown' }}</span>
                </div>
            </div>

            <div class="p-6">
                <!-- Category/Tag mock -->
                <div class="text-xs font-semibold text-brand-brown/80 dark:text-brand-beige/80 uppercase tracking-wider mb-3">Tản văn</div>
                
                <h2 class="text-xl font-serif font-bold text-brand-dark dark:text-gray-100 mb-3 line-clamp-2 group-hover:text-brand-brown transition-colors leading-snug">{{ $post->title }}</h2>
                
                <p class="text-sm text-text-muted dark:text-gray-400 line-clamp-3 mb-6 leading-relaxed">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                
                <!-- Author Info -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-gray-700/50">
                    <img src="{{ $post->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->user->fullname).'&color=FDFBF7&background=8D6E63' }}" alt="{{ $post->user->fullname }}" class="w-8 h-8 rounded-full object-cover">
                    <div class="text-sm font-medium text-brand-dark dark:text-gray-300">{{ $post->user->fullname }}</div>
                </div>
            </div>
        </a>
    @empty
        <div class="col-span-full text-center py-20 bg-white/50 dark:bg-gray-800/50 rounded-3xl border border-dashed border-gray-200 dark:border-gray-700">
            <span class="text-4xl mb-4 block">🍂</span>
            <h3 class="text-xl font-serif text-brand-dark dark:text-gray-300 font-bold mb-2">Chưa có bài viết nào</h3>
            <p class="text-text-muted dark:text-gray-500">Hãy là người đầu tiên chia sẻ câu chuyện tại Tiệm Sách nhé.</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-12 flex justify-center">
    {{ $posts->links() }}
</div>
@endsection