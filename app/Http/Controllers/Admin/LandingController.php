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
        //find blog id by slug



        $landings = ProfileCorp::all();
        $blogs = Blog::where('slug', $slug)->first();
        // $blogs = Blog::find($slug);
        // dd($blogs);
        return view('landing.blogDetails', ['blogs' => $blogs], ['landings' => $landings]);
    }
}
