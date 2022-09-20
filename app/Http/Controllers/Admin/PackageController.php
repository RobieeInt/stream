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
        return view('admin.package.create');
    }
}
