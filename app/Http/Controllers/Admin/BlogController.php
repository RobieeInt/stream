<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.blogs', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('admin.blog.blog-create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ]);

        $image = $request->file('image');
        $image_name = Str::random(5) . $image->getClientOriginalname();
        $image->storeAs('public/blog', $image_name);
        $data['image'] = $image_name;

        $slug = str_replace(' ', '-', $data['title']);
        $data['slug'] = strtolower($slug);

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog Baru Telah Berhasil dibuat');

    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.blog-edit', [
            'blog' => $blog
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ]);

        $blog = Blog::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = Str::random(5) . $image->getClientOriginalname();
            $image->storeAs('public/blog', $image_name);
            $data['image'] = $image_name;

            Storage::delete('public/blog/' . $blog->image);
        } else {
            $data['image'] = $blog->image;
        }

        $slug = str_replace(' ', '-', $data['title']);
        $data['slug'] = strtolower($slug);

        $blogOldName = $blog->title;
        $blogNewName = $data['title'];

        $blog->update($data);

        // return redirect()->route('admin.blog.index')->with('success', 'Blog' . $blogOldName . 'Berhasil Diubah');
        if($blogOldName != $blogNewName) {
            return redirect()->route('admin.blog.index')->with('success', 'Data blog ' . $blogOldName . ' berhasil diubah menjadi ' . $blogNewName . ' !!! ' );
        } else {
            return redirect()->route('admin.blog.index')->with('success', 'Data blog ' . $blogOldName . ' berhasil diubah !!! ' );
        }
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully');
    }
}
