<?php

namespace App\Http\Controllers\admin;

use App\Models\TeamProfil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilTeamController extends Controller
{
    public function index()
    {
        $profiles = TeamProfil::all();
        return view('admin.teamProfil.teamProfil', compact('profiles'));
    }
}
