<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\ClientReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ReviewClientController extends Controller
{
    public function index()
    {
        $reviews = ClientReview::all();
        return view('admin.reviewClient.index', compact('reviews'));
    }

    public function create()
    {
        return view('admin.reviewClient.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'required|string',
        ]);

        $image = $request->file('image');
        $image_name = Str::random(5) . $image->getClientOriginalname();
        //resize image composer require intervention/image
        $image_resize = Image::make($image->getRealPath());
        //resize dimension 1024x768
        $image_resize->resize(1024, 768);

        //create folder if not exist
        if (!file_exists(public_path('storage/reviewClient'))) {
            mkdir(public_path('storage/reviewClient'), 0777, true);
        }

        //save image
        $image_resize->save(public_path('storage/reviewClient/' . $image_name));

        //simpen nama image ke database
        $data['image'] = $image_name;

        // kalo ada spasi jadiin underscore
        $slug = str_replace(' ', '_', $data['name']);
        $data['slug'] = Str::slug($slug, '-');

        ClientReview::create($data);

        return redirect()->route('admin.review.index')->with('success', 'Review Client berhasil ditambahkan');

    }

    public function edit($id)
    {
        $review = ClientReview::findOrFail($id);
        return view('admin.reviewClient.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'required|string',
        ]);

        $review = ClientReview::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = Str::random(5) . $image->getClientOriginalname();
            //resize image composer require intervention/image
            $image_resize = Image::make($image->getRealPath());
            //resize dimension 1024x768
            $image_resize->resize(1024, 768);
            //save image
            $image_resize->save(public_path('storage/reviewClient/' . $image_name));

            //simpen nama image ke database
            $data['image'] = $image_name;

            //delete image
            Storage::delete('public/reviewClient/' . $review->image);
        } else {
            $data['image'] = $review->image;
        }

        // kalo ada spasi jadiin underscore
        $slug = str_replace(' ', '_', $data['name']);
        $data['slug'] = Str::slug($slug, '-');

        $review->update($data);

        return redirect()->route('admin.review.index')->with('success', 'Review Client berhasil diupdate');
    }

    public function destroy($id)
    {
        $review = ClientReview::findOrFail($id);
        $review->delete();

        //delete image
        Storage::delete('public/reviewClient/' . $review->image);

        return redirect()->route('admin.review.index')->with('success', 'Review Client berhasil dihapus');
    }

    public function loadMore(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->page;
            $data = ClientReview::orderBy('id', 'desc')->paginate(3, ['*'], 'page', $page);
            $view = view('admin.reviewClient.loadMore', compact('data'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
