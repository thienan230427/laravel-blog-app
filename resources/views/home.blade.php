@extends('layouts.app')

@section('title', 'Tiệm Sách Nhà Gấu - Gương Tri Thức')

@section('content')
<!-- Hero Section -->
<div class="mb-16 flex justify-center">
    <div class="text-center text-white bg-black/40 dark:bg-black/60 backdrop-blur-md border border-white/20 rounded-full px-16 py-10 shadow-2xl max-w-4xl">
        <h1 class="text-4xl md:text-5xl font-serif font-bold mb-4 tracking-tight drop-shadow-lg">Góc Đọc Nhỏ Của Bạn</h1>
        <p class="text-lg text-white/90 leading-relaxed drop-shadow-md">Không gian yên bình để lưu giữ và chia sẻ những câu chuyện, ghi chú sách, và góc nhìn cuộc sống.</p>
    </div>
</div>

<!-- Blog List: Card Layout -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($posts as $post)
        <a href="{{ route('posts.show', $post->id) }}" class="group block bg-white/20 dark:bg-black/30 backdrop-blur-xl rounded-3xl overflow-hidden shadow-[0_8px_32px_0_rgba(0,0,0,0.1)] border border-white/30 dark:border-white/10 transition-all duration-300 transform hover:-translate-y-1 hover:bg-white/30 dark:hover:bg-black/40">
            
            <!-- Cover Image Mock -->
            <div class="h-48 w-full relative overflow-hidden bg-white/10">
                <!-- Random nature image from unsplash keyword -->
                <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=600&q=80" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                <div class="absolute top-4 left-4">
                    <span class="px-3 py-1 bg-white/30 dark:bg-black/40 backdrop-blur-md text-white border border-white/40 text-xs font-semibold rounded-full shadow-sm">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Unknown' }}</span>
                </div>
            </div>

            <div class="p-6 text-white drop-shadow-sm">
                <!-- Category/Tag mock -->
                <div class="text-xs font-semibold text-white/80 uppercase tracking-wider mb-3">Tản văn</div>
                
                <h2 class="text-xl font-serif font-bold text-white mb-3 line-clamp-2 group-hover:text-white/90 transition-colors leading-snug">{{ $post->title }}</h2>
                
                <p class="text-sm text-white/80 line-clamp-3 mb-6 leading-relaxed">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                
                <!-- Author Info -->
                <div class="flex items-center gap-3 pt-4 border-t border-white/20">
                    <img src="{{ $post->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->user->fullname).'&color=FDFBF7&background=8D6E63' }}" alt="{{ $post->user->fullname }}" class="w-8 h-8 rounded-full object-cover border border-white/40 shadow-sm">
                    <div class="text-sm font-medium text-white/90">{{ $post->user->fullname }}</div>
                </div>
            </div>
        </a>
    @empty
        <div class="col-span-full text-center py-20 bg-white/10 dark:bg-black/20 backdrop-blur-xl rounded-3xl border border-white/30 dark:border-white/10 shadow-[0_8px_32px_0_rgba(0,0,0,0.1)]">
            <span class="text-4xl mb-4 block drop-shadow-md">🍂</span>
            <h3 class="text-xl font-serif text-white font-bold mb-2 drop-shadow">Chưa có bài viết nào</h3>
            <p class="text-white/80 drop-shadow-sm">Hãy là người đầu tiên chia sẻ câu chuyện tại Tiệm Sách nhé.</p>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-12 flex justify-center">
    {{ $posts->links() }}
</div>
@endsection