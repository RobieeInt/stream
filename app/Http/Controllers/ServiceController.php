<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Models\Tags;
use App\Models\ProfileCorp;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $landings = ProfileCorp::all();
        $tags = Tags::all();
        $reviews = ClientReview::all();
        return view('landing.services', compact('landings', 'tags', 'reviews'));
    }
}
