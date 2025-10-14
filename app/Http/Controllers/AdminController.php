<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Auction;
use App\Models\Bid;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $auctionCount = Auction::count();
        $bidCount = Bid::count();

 $auctions = Auction::with('user')->latest()->paginate(5); // latest 5 auctions

        return view('admin.dashboard', compact(
            'userCount',
            'auctionCount',
            'bidCount',
            'auctions'
        ));
    }
     public function viewPayments()
    {
        // যেসব বিডে transaction_id আছে, মানে user payment করেছে বা শুরু করেছে
        $bids = Bid::with('user', 'auction')
                    ->whereNotNull('transaction_id')
                    ->latest()
                    ->get();

        return view('admin.payments', compact('bids'));
    }
}
