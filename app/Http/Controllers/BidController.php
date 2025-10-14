<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function store(Request $request, Auction $auction)
    {   
        
         if (now()->gt($auction->end_time)) {
        return redirect()->back()->with('error', 'Bidding time is over!');
    }

      // Get highest bid
    $highestBid = $auction->bids()->max('amount');
    $minimumBid = $highestBid ? $highestBid + 0.01 : $auction->starting_price;

    // Validation
    $request->validate([
        'amount' => ['required', 'numeric', "min:$minimumBid"],
    ], [
        'amount.min' => "Your bid must be higher than current highest bid ($$highestBid) or starting price ($$auction->starting_price).",
    ]);

        Bid::create([
            'auction_id' => $auction->id,
            'user_id' => Auth::id(),
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Your bid has been placed!');
    }

    //leaderboard
    public function leaderboard()
{
    $topBidders = \App\Models\User::withCount('bids')
                    ->orderByDesc('bids_count')
                    ->take(10)
                    ->get();

    $users = \App\Models\User::with(['bids' => function($query) {
        $query->orderBy('amount', 'desc');
    }])->get();

    return view('leaderboard', compact('topBidders', 'users'));

}

public function myBids()
{
    $bids = \App\Models\Bid::with('auction')
             ->where('user_id', auth()->id())
             ->latest()
             ->get();

    return view('my-bids', compact('bids'));
}

public function storePayment(Request $request, Bid $bid)
{
    // নিশ্চিত হোন যেন শুধুমাত্র জয়ী ব্যক্তি এই পেমেন্ট করতে পারে
    if ($bid->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $request->validate([
        'bkash_number' => 'required|string',
        'transaction_id' => 'required|string',
    ]);

    $bid->update([
        'bkash_number' => $request->bkash_number,
        'transaction_id' => $request->transaction_id,
        'payment_status' => 'paid',
    ]);

    return redirect()->back()->with('success', 'Payment submitted successfully!');
}



}
