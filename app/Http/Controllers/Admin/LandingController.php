<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\ProfileCorp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    public function index()
    {
        $landings = ProfileCorp::all();
        // limit blog to 4 items order by created_at desc
        $blogs = Blog::orderBy('created_at', 'desc')->limit(4)->get();
        return view('landing.index', ['landings' => $landings, 'blogs' => $blogs]);
    }

    public function blogDetails( $slug)
    {
        //get recent blog to show in sidebar except current blog
        $recentBlogs = Blog::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->limit(4)->get();

        //get blog random to show in sidebar except current blog
        $randomBlogs = Blog::where('slug', '!=', $slug)->inRandomOrder()->limit(5)->get();

        $landings = ProfileCorp::all();

        $blog = Blog::where('slug', $slug)->first();
        // $blogs = Blog::find($slug);
        // dd($blogs);
        return view('landing.blogDetails', compact('blog', 'recentBlogs', 'landings', 'randomBlogs'));
    }
}
