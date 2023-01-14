<?php

namespace App\Http\Controllers\admin;

use App\Models\TeamProfil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfilTeamController extends Controller
{
    public function index()
    {
        $profiles = TeamProfil::all();
        return view('admin.teamProfil.teamProfil', compact('profiles'));
    }

    public function create()
    {
        return view('admin.teamProfil.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'facebook' => 'string',
            'twitter' => 'string',
            'instagram' => 'string',
            'linkedin' => 'string',
        ]);

        // dd($data);
        $image = $request->file('image');
        $image_name = Str::random(5) . $image->getClientOriginalname();
        //resize image composer require intervention/image
        $image_resize = Image::make($image->getRealPath());
        //resize dimension 1024x768
        $image_resize->resize(661, 1024);

        //create folder if not exist
        if (!file_exists(public_path('storage/teamProfil'))) {
            mkdir(public_path('storage/teamProfil'), 0777, true);
        }

        //save image
        $image_resize->save(public_path('storage/teamProfil/' . $image_name));

        //simpen nama image ke database
        $data['image'] = $image_name;

        // kalo ada spasi jadiin underscore
        $slug = str_replace(' ', '_', $data['name']);
        $data['slug_name'] = strtolower($slug);

        TeamProfil::create($data);

        return redirect()->route('admin.profile.index')->with('success', 'Team Profil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $profile = TeamProfil::find($id);
        return view('admin.teamProfil.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'facebook' => 'string',
            'twitter' => 'string',
            'instagram' => 'string',
            'linkedin' => 'string',
        ]);

        $profile = TeamProfil::find($id);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = Str::random(5) . $image->getClientOriginalname();
            //resize image composer require intervention/image
            $image_resize = Image::make($image->getRealPath());
            //resize dimension 1024x768
            $image_resize->resize(661, 1024);
            //remove background
            $image_resize->save(public_path('storage/teamProfil/' . $image_name));
            $data['image'] = $image_name;
            //delete old image
            Storage::delete('public/teamProfil/' . $profile->image);
        } else {
            $data['image'] = $profile->image;
        }

        $slug = str_replace(' ', '_', $data['name']);
        $data['slug_name'] = strtolower($slug);

        TeamProfil::find($id)->update($data);

        return redirect()->route('admin.profile.index')->with('success', 'Team Profil berhasil diupdate');
    }

    public function destroy($id)
    {
        $profile = TeamProfil::find($id);

        Storage::delete('public/teamProfil/' . $profile->image);
        $profile->delete();

        return redirect()->route('admin.profile.index')->with('success', 'Team Profil berhasil dihapus');
    }
}
