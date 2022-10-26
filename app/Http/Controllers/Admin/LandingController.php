<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\ProfileCorp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use App\Models\Tags;

class LandingController extends Controller
{
    public function index()
    {
        //limit review 3 di landing page
        $reviews = ClientReview::limit(9)->get();
        $tags = Tags::all();
        $landings = ProfileCorp::all();
        // limit blog to 4 items order by created_at desc
        $blogs = Blog::orderBy('created_at', 'desc')->limit(4)->get();
        return view('landing.index', compact('landings', 'tags', 'blogs', 'reviews'));
    }

    public function blogDetails( $slug)
    {
        //get recent blog to show in sidebar except current blog
        $recentBlogs = Blog::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->limit(4)->get();

        //get blog random to show in sidebar except current blog
        $randomBlogs = Blog::where('slug', '!=', $slug)->inRandomOrder()->limit(5)->get();

        $landings = ProfileCorp::all();

        $tags = Tags::all();


        $blog = Blog::where('slug', $slug)->first();
        // $blogs = Blog::find($slug);
        // dd($blogs);
        return view('landing.blogDetails', compact('blog', 'recentBlogs', 'landings', 'randomBlogs', 'tags'));
    }

    public function loadMoreReview(Request $request)
    {
        $offset = $request->offset;
        $reviews = ClientReview::offset($offset)->limit(3)->get();
        return response()->json($reviews);
    }
}
