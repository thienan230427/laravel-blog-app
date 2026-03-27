<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết của chính tác giả
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // Hiển thị form tạo bài viết
    public function create()
    {
        return view('posts.create');
    }

    // Lưu bài viết mới
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
        ]);

        $post = new Post([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => Auth::id(),
            'published_at' => $request->status === 'published' ? now() : null,
        ]);

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Tạo bài viết thành công!');
    }

    // Hiển thị form sửa bài viết
    public function edit($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('posts.edit', compact('post'));
    }

    // Cập nhật bài viết
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;

        if ($request->status === 'published' && !$post->published_at) {
            $post->published_at = now();
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Cập nhật bài viết thành công!');
    }

    // Xoá bài viết
    public function destroy($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Xoá bài viết thành công!');
    }
}
