<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies', ['movies' => $movies]);
    }

    public function create()
    {
        return view('admin.movie-create');
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

        return redirect()->route('admin.movie.index')->with('success', 'Movie created successfully');

        // dd($small_thumbnail_name);
        // return redirect()->route('admin.movie.index');
    }
}
