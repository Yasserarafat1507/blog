<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Post::all();
        return view('blog.index' ,compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'discripstion' => 'required|string|max:500',
            'content' => 'required|string',
        ]);
     
       // Upload gambar
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->storeAs('public/blog', $imageName);
    } else {
        $imageName = null; // Atau Anda bisa memberikan nilai default
    }


    // Simpan data ke database
    Post::create([
        'image' => 'blog/' . $imageName,  // Menyimpan path relatif
        'title' => $request->title,
        'discripstion' => $request->discripstion,
        'content' => $request->content,
    ]);
        //         //redirect to index
        return redirect()->route('blog.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Post::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Post::findOrFail($id);
        return view('blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'discripstion' => 'required|string|max:500',
            'content' => 'required|string',
        ]);
   
        // Temukan post berdasarkan ID
        $blog = Post::findOrFail($id);
   
        // Periksa jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Upload gambar baru
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/blog', $imageName);
   
            // Hapus gambar lama
            Storage::delete('public/blog/' . $blog->image);
   
            // Perbarui data blog dengan gambar baru
            $blog->update([
                'image' => 'blog/' . $imageName,
                'title' => $request->title,
                'discripstion' => $request->discripstion,
                'content' => $request->content
            ]);
        } else {
            // Perbarui data blog tanpa mengubah gambar
            $blog->update([
                'title' => $request->title,
                'discripstion' => $request->discripstion,
                'content' => $request->content
            ]);
        }
   
        // Redirect ke halaman index
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get post by ID
        $blog = Post::findOrFail($id);


         //delete image
        Storage::delete('public/blog/'. $blog->image);
 
 
         //delete blog
        $blog->delete();
 
 
         //redirect to index
        return redirect()->route('blog.index');
    }
}
