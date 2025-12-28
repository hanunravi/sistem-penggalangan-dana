<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Halaman List Berita
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    // Halaman Form Tambah
    public function create()
    {
        return view('admin.posts.create');
    }

    // Proses Simpan
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|max:2048' 
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')), 
            'content' => $request->input('content'),
            'image' => $imagePath
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Kabar lapangan berhasil diterbitkan!');
    }

    // Hapus Berita
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->back()->with('success', 'Berita dihapus.');
    }
    public function edit($id)
{
    $post = \App\Models\Post::findOrFail($id);
    return view('admin.posts.edit', compact('post'));
}

    public function update(Request $request, $id)
    {
        $post = \App\Models\Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content'  => 'required', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update Gambar jika ada upload baru
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $post->image = $path;
        }

        $post->title = $request->input('title');
        $post->content  = $request->input('content');
        
        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Kabar berhasil diperbarui!');
    }
}