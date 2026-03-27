@extends('layouts.app')

@section('title', $post->title)

@section('content')
<!-- Article Reader Container -->
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 md:p-16 shadow-[0_8px_40px_rgb(0,0,0,0.04)] dark:shadow-[0_8px_40px_rgb(0,0,0,0.2)] mt-8">
    
    <!-- Meta/Date -->
    <div class="text-center mb-6">
        <span class="inline-block px-4 py-1.5 bg-brand-beige dark:bg-gray-700 text-brand-brown dark:text-brand-light text-xs font-bold uppercase tracking-widest rounded-full">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Unknown Date' }}</span>
    </div>

    <!-- Title -->
    <h1 class="text-4xl md:text-5xl font-serif font-bold text-brand-dark dark:text-gray-100 text-center leading-[1.2] mb-8">{{ $post->title }}</h1>

    <!-- Author & Reading Time -->
    <div class="flex items-center justify-center gap-4 text-sm text-text-muted dark:text-gray-400 mb-12 border-b border-gray-100 dark:border-gray-700/50 pb-8">
        <div class="flex items-center gap-2">
            <img src="{{ $post->user->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode($post->user->fullname).'&color=FDFBF7&background=8D6E63' }}" alt="{{ $post->user->fullname }}" class="w-10 h-10 rounded-full border-2 border-brand-beige object-cover shadow-sm">
            <span class="font-medium text-brand-dark dark:text-gray-300">Viết bởi <strong>{{ $post->user->fullname }}</strong></span>
        </div>
        <span class="w-1 h-1 rounded-full bg-gray-300 dark:bg-gray-600"></span>
        <span>Khoảng 5 phút đọc</span>
    </div>

    <!-- Cover Image (Mock) -->
    <div class="w-full h-64 md:h-96 rounded-3xl overflow-hidden mb-12 shadow-sm">
        <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=1200&q=80" alt="Cover" class="w-full h-full object-cover">
    </div>

    <!-- Article Content -->
    <article class="article-content prose prose-lg dark:prose-invert max-w-none text-justify space-y-6">
        {!! nl2br(e($post->content)) !!}
    </article>

    <!-- Post Footer Tags/Actions -->
    <div class="mt-16 pt-8 border-t border-gray-100 dark:border-gray-700/50 flex items-center justify-between">
        <div class="flex gap-2">
            <span class="px-3 py-1 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-300 text-xs rounded-lg cursor-pointer hover:bg-brand-beige transition-colors">#bookreview</span>
            <span class="px-3 py-1 bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-300 text-xs rounded-lg cursor-pointer hover:bg-brand-beige transition-colors">#journal</span>
        </div>
        <div class="flex gap-4">
            <button class="w-10 h-10 rounded-full bg-brand-beige dark:bg-gray-700 text-brand-brown dark:text-brand-light flex items-center justify-center hover:scale-110 transition-transform shadow-sm" title="Bookmark">🔖</button>
            <button class="w-10 h-10 rounded-full bg-brand-beige dark:bg-gray-700 text-brand-brown dark:text-brand-light flex items-center justify-center hover:scale-110 transition-transform shadow-sm" title="Share">↗️</button>
        </div>
    </div>
</div>
@endsection