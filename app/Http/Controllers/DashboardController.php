<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bid;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // মোট Auction
        $auctionCount = Auction::count();

        // মোট Bid
        $bidCount = Bid::count();

        // Won Auctions (যেখানে লগিন করা ইউজার Highest bidder এবং Auction শেষ হয়ে গেছে)
        $wonCount = Bid::whereHas('auction', function ($query) {
                $query->where('end_time', '<', now());
            })
            ->whereHas('auction', function ($query) {
                $query->whereRaw('bids.user_id = (SELECT user_id FROM bids WHERE bids.auction_id = auctions.id ORDER BY amount DESC LIMIT 1)');
            })
            ->where('user_id', Auth::id())
            ->count();

        // Active Auctions (যেগুলো এখনো চলছে)
        $activeCount = Auction::where('end_time', '>', now())->count();

        // সব ভ্যারিয়েবল পাঠানো হচ্ছে view এ
        return view('dashboard', compact('auctionCount', 'bidCount', 'wonCount', 'activeCount'));
    }
}
