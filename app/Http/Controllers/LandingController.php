<?php

namespace App\Http\Controllers;

use App\Models\Auction;


class LandingController extends Controller
{
    public function index()
    {
        $auctions = Auction::latest()->take(6)->get();
        return view('landing', compact('auctions'));
    }
}
