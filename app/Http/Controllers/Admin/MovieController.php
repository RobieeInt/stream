<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Str;
// use storage
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie.movies', ['movies' => $movies]);
    }

    public function create()
    {
        return view('admin.movie.movie-create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'trailer' => 'required|url',
            'movie' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'small_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'large_thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'release_date' => 'required|string',
            'description' => 'required|string',
            'long_description' => 'required|string',
            'duration' => 'required|string',
            'is_featured' => 'required',
            'rating' => 'required|string',

        ]);

        $small_thumbnail = $request->file('small_thumbnail');
        $large_thumbnail = $request->file('large_thumbnail');

        $small_thumbnail_name = Str::random(5) . $small_thumbnail->getClientOriginalname();
        $large_thumbnail_name = Str::random(5) . $large_thumbnail->getClientOriginalname();

        $small_thumbnail->storeAs('public/thumbnail', $small_thumbnail_name);
        $large_thumbnail->storeAs('public/thumbnail', $large_thumbnail_name);

        $data['small_thumbnail'] = $small_thumbnail_name;
        $data['large_thumbnail'] = $large_thumbnail_name;

        $slug = str_replace(' ', '-', $data['title']);
        $data['slug'] = strtolower($slug);


        Movie::create($data);

        return redirect()->route('admin.movie.index')->with('success', 'Movie berhasil dibuat');

        // dd($small_thumbnail_name);
        // return redirect()->route('admin.movie.index');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('admin.movie-edit', ['movie' => $movie]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'title' => 'required|string',
            'trailer' => 'required|url',
            'movie' => 'required|url',
            'casts' => 'required|string',
            'categories' => 'required|string',
            'small_thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'large_thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'release_date' => 'required|string',
            'description' => 'required|string',
            'long_description' => 'required|string',
            'duration' => 'required|string',
            'is_featured' => 'required',
            'rating' => 'required|string',

        ]);

        $movie =Movie::find($id);

        if($request->hasFile('small_thumbnail')) {
            $small_thumbnail = $request->file('small_thumbnail');
            $small_thumbnail_name = Str::random(5) . $small_thumbnail->getClientOriginalname();
            $small_thumbnail->storeAs('public/thumbnail', $small_thumbnail_name);
            $data['small_thumbnail'] = $small_thumbnail_name;

            //delete old image
            $old_image = Movie::find($id)->small_thumbnail;
            Storage::delete('public/thumbnail/' . $old_image);

        }

        if($request->hasFile('large_thumbnail')) {
            $large_thumbnail = $request->file('large_thumbnail');
            $large_thumbnail_name = Str::random(5) . $large_thumbnail->getClientOriginalname();
            $large_thumbnail->storeAs('public/thumbnail', $large_thumbnail_name);
            $data['large_thumbnail'] = $large_thumbnail_name;

            //delete old image
            $old_image = Movie::find($id)->large_thumbnail;
            Storage::delete('public/thumbnail/' . $old_image);

        }


        $slug = str_replace(' ', '-', $data['title']);
        $data['slug'] = strtolower($slug);

        $movie->update($data);

        return redirect()->route('admin.movie.index')->with('success', 'Movie berhasil di Update');
    }

    public function destroy($id)
    {

        // 5 cara delete

        // 1. delete
        // $movie = Movie::find($id);
        // $movie->delete();

        // 2. destroy
        Movie::destroy($id);

        // 3. forceDelete
        // Movie::where('id', $id)->forceDelete();

        // 4. delete with soft delete
        // Movie::where('id', $id)->delete();

        // 5. delete with soft delete
        // Movie::find($id)->delete();


        return redirect()->route('admin.movie.index')->with('success', 'Movie berhasil dihapus');
    }
}
