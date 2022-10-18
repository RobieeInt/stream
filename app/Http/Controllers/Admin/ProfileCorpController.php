<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProfileCorp;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileCorpController extends Controller
{
    public function index()
    {
        $landings = ProfileCorp::all();
        return view('admin.landing.landings', ['landings' => $landings]);
    }

    public function create()
    {
        return view('admin.landing.landing-create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'hero_title' => 'string',
            'hero_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hero_description' => 'string',
            'hero_video' => 'url',
            'hero_video_poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hero_video_description' => 'string',
            'hero_video_link' => 'url',
            'hero_video_link_text' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'footer_description' => 'string',
        ]);

        $hero_image = $request->file('hero_image');
        $hero_video_poster = $request->file('hero_video_poster');

        $hero_image_name = Str::random(5) . $hero_image->getClientOriginalname();

        $hero_image->storeAs('public/hero', $hero_image_name);

        $data['hero_image'] = $hero_image_name;

        ProfileCorp::create($data);

        return redirect()->route('admin.landing.index');
    }

    public function edit($id)
    {
        $landing = ProfileCorp::find($id);
        return view('admin.landing.landing-edit', ['landing' => $landing]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'hero_title' => 'string',
            'hero_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hero_description' => 'string',
            'hero_video' => 'url',
            'hero_video_poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hero_video_description' => 'string',
            'hero_video_link' => 'url',
            'hero_video_link_text' => 'string',
            'address' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'footer_description' => 'string',
        ]);

        $landing = ProfileCorp::find($id);

        $hero_image = $request->file('hero_image');
        $hero_video_poster = $request->file('hero_video_poster');

        if ($hero_image) {
            $hero_image_name = Str::random(5) . $hero_image->getClientOriginalname();

            $hero_image->storeAs('public/hero', $hero_image_name);

            $data['hero_image'] = $hero_image_name;
        }

        if ($hero_video_poster) {
            $hero_video_poster_name = Str::random(5) . $hero_video_poster->getClientOriginalname();

            $hero_video_poster->storeAs('public/hero', $hero_video_poster_name);

            $data['hero_video_poster'] = $hero_video_poster_name;
        }

        // ProfileCorp::where('id', $id)->update($data);
        $landing->update($data);

        return redirect()->route('admin.landing.index');
    }

    public function destroy($id)
    {
        ProfileCorp::where('id', $id)->delete();
        return redirect()->route('admin.landing.index');
    }
}
