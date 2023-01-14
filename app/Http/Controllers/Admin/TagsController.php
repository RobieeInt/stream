<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tags;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tags::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $slug = str_replace(' ', '-', $data['name']);
        $data['slug'] = strtolower($slug);


        Tags::create($data);

        return redirect()->route('admin.tags.index')->with('success', 'Tags berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tags = Tags::find($id);
        return view('admin.tags.edit', compact('tags'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $slug = str_replace(' ', '-', $data['name']);
        $data['slug'] = strtolower($slug);

        Tags::find($id)->update($data);

        return redirect()->route('admin.tags.index')->with('success', 'Tags berhasil diupdate');
    }

    public function destroy($id)
    {
        Tags::find($id)->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tags berhasil dihapus');
    }
}
