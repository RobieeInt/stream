<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('admin.package.packages', ['packages' => $packages]);
    }

    public function create()
    {
        return view('admin.package.package-create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'max_days' => 'required|string',
            'max_users' => 'required|string',
            'is_downloaded' => 'required',
            'is_active' => 'required',
            'is_4k' => 'required',
        ]);

        $namePackage = $data['name'];


        Package::create($data);

        return redirect()->route('admin.package.index')->with('success', 'Paket  ' . $namePackage . ' berhasil ditambahkan');
    }

    public function edit($id)
    {
        $package = Package::find($id);
        return view('admin.package.package-edit', ['package' => $package]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'max_days' => 'required|string',
            'max_users' => 'required|string',
            'is_downloaded' => 'required',
            'is_active' => 'required',
            'is_4k' => 'required',
        ]);

        $package = Package::find($id);
        $packageOldName = $package->name;
        $packageNewName = $data['name'];
        $package->update($data);

        // return redirect()->route('admin.package.index')->with('success', 'Data Paket ' . $packageOldName . ' berhasil diubah !!! ' );

        //if data name package is changed
        if ($packageOldName != $packageNewName) {
            return redirect()->route('admin.package.index')->with('success', 'Data Paket ' . $packageOldName . ' berhasil diubah menjadi ' . $packageNewName . ' !!! ');
        } else {
            return redirect()->route('admin.package.index')->with('success', 'Data Paket ' . $packageOldName . ' berhasil diubah !!! ');
        }
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        $packageName = $package->name;
        $package->delete();

        // Package::destroy($id);
        // dd($id);

        return redirect()->route('admin.package.index')->with('success', 'Paket ' . $packageName . ' berhasil dihapus');
    }
}
