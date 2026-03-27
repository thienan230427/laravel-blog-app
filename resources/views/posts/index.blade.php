@extends('layouts.app')

@section('title', 'Bài viết của tôi - Tiệm Sách Nhà Gấu')

@section('content')
<div class="max-w-4xl mx-auto mt-8">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-serif font-bold text-brand-dark dark:text-gray-100 tracking-tight">Góc Của Tôi</h1>
            <p class="text-sm text-text-muted dark:text-gray-400 mt-2">Quản lý các bài viết và bản nháp của bạn.</p>
        </div>
        <a href="{{ route('posts.create') }}" class="px-5 py-2.5 bg-brand-brown text-white text-sm font-medium rounded-xl hover:bg-brand-dark transition-all shadow-sm hover:shadow flex items-center gap-2">
            <span>+</span> Bài viết mới
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 dark:bg-green-900/30 text-green-600 dark:text-green-400 p-4 rounded-xl text-sm border border-green-100 dark:border-green-800 flex items-start gap-3">
            <span>✨</span> {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] dark:shadow-[0_4px_20px_rgb(0,0,0,0.2)] overflow-hidden border border-gray-100 dark:border-gray-700">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-brand-beige/50 dark:bg-gray-900/50 text-xs uppercase tracking-wider text-gray-500 dark:text-gray-400 border-b border-gray-100 dark:border-gray-700">
                        <th class="px-6 py-4 font-semibold">Tiêu đề</th>
                        <th class="px-6 py-4 font-semibold text-center">Trạng thái</th>
                        <th class="px-6 py-4 font-semibold">Ngày tạo</th>
                        <th class="px-6 py-4 font-semibold text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700/50">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors group">
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.show', $post->id) }}" class="font-medium text-brand-dark dark:text-gray-200 hover:text-brand-brown dark:hover:text-brand-beige transition-colors block line-clamp-1">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($post->status === 'published')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        Đã xuất bản
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                        Bản nháp
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                {{ $post->created_at->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="text-brand-brown hover:text-brand-dark dark:text-brand-beige dark:hover:text-white text-sm font-medium transition-colors">
                                        Sửa
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xoá bài viết này không?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 text-sm font-medium transition-colors">
                                            Xoá
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-text-muted dark:text-gray-500">
                                Bạn chưa có bài viết nào. Hãy bắt đầu dòng chia sẻ đầu tiên nhé.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="mt-8 flex justify-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection