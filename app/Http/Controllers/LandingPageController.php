<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Models\Tags;
use App\Models\ProfileCorp;
use App\Models\TeamProfil;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function service()
    {
        $landings = ProfileCorp::all();
        $tags = Tags::all();
        $reviews = ClientReview::all();
        return view('landing.services', compact('landings', 'tags', 'reviews'));
    }

    public function team()
    {
        $landings = ProfileCorp::all();
        $tags = Tags::all();
        $reviews = ClientReview::all();
        $teamprofiles = TeamProfil::all();
        return view('landing.team', compact('landings', 'tags', 'reviews', 'teamprofiles'));
    }
}
