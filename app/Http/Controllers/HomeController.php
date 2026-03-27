<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy các bài viết đã xuất bản, kèm thông tin tác giả, phân trang
        $posts = Post::with('user')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);

        // Chỉ hiển thị bài viết đã xuất bản hoặc bài của chính tác giả
        if ($post->status !== 'published' && (!auth()->check() || auth()->id() !== $post->user_id)) {
            abort(404);
        }

        return view('posts.show', compact('post'));
    }
}
