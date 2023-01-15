<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Models\Tags;
use App\Models\ProfileCorp;
use App\Models\TeamProfil;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function service()
    {
        $landings = ProfileCorp::all();
        $tags = Tags::all();
        $reviews = ClientReview::all();
        $chooses = WhyChoose::all();
        return view('landing.services', compact('landings', 'tags', 'reviews', 'chooses'));
    }

    public function team()
    {
        $landings = ProfileCorp::all();
        $tags = Tags::all();
        $reviews = ClientReview::all();
        $teamprofiles = TeamProfil::all();
        $chooses = WhyChoose::all();
        return view('landing.team', compact('landings', 'tags', 'reviews', 'teamprofiles','chooses'));
    }
}
