<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use Carbon\Carbon;

// 👇 এই দুইটা use যুক্ত করো
use App\Mail\WinnerNotificationMail;
use Illuminate\Support\Facades\Mail;

class AuctionController extends Controller
{
    public function create()
    {
        return view('auction.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'starting_price' => 'required|numeric',
            'end_time' => 'required|date',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('auctions', 'public');
        }

        Auction::create([
            'title' => $request->title,
            'description' => $request->description,
            'starting_price' => $request->starting_price,
            'end_time' => $request->end_time,
            'user_id' => Auth::id(),
            'image' => $imagePath,
        ]);

        return redirect('/dashboard')->with('success', 'Auction created successfully!');
    }

    public function index()
    {
        $auctions = Auction::with('winner')->get();
        return view('auction.index', compact('auctions'));
    }

    public function show($id)
    {
        $auction = Auction::findOrFail($id);

        // ✅ Auction শেষ হয়ে গেলে Winner নির্ধারণ
        if (now()->greaterThan($auction->end_time) && $auction->winner_id === null) {
            $highestBid = $auction->bids()->with('user')->orderByDesc('amount')->first();

            if ($highestBid) {
                $auction->winner_id = $highestBid->user_id;
                $auction->save();

                // ✅ Winner কে ইমেইল পাঠানো
                Mail::to($highestBid->user->email)->send(new WinnerNotificationMail($highestBid));
            }
        }

        $highestBid = $auction->bids()->with('user')->orderByDesc('amount')->first();
        $bids = $auction->bids()->with('user')->latest()->get();
        $now = now();

        return view('auction.show', compact('auction', 'highestBid', 'bids', 'now'));
    }

    public function placeBid(Request $request, $id)
    {
        $auction = Auction::findOrFail($id);

        $request->validate([
            'amount' => 'required|numeric|min:' . ($auction->starting_price + 1),
        ]);

        if (now()->greaterThan($auction->end_time)) {
            return back()->withErrors(['amount' => 'Auction has already ended.']);
        }

        Bid::create([
            'auction_id' => $auction->id,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Bid placed successfully!');
    }

    public function storeBid(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $auction = Auction::findOrFail($id);

        if (now()->greaterThan($auction->end_time)) {
            return back()->with('error', 'This auction has already ended.');
        }

        if ($request->amount < $auction->starting_price) {
            return back()->with('error', 'Bid must be greater than starting price.');
        }

        Bid::create([
            'auction_id' => $auction->id,
            'user_id' => auth()->id(),
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Bid submitted successfully!');
    }

    public function closeEndedAuctions()
    {
        $endedAuctions = Auction::where('end_time', '<', Carbon::now())
            ->whereNull('winner_id')
            ->with('bids.user')
            ->get();

        foreach ($endedAuctions as $auction) {
            $highestBid = $auction->bids()->orderByDesc('amount')->first();

            if ($highestBid) {
                $auction->winner_id = $highestBid->user_id;
                $auction->save();

                // ✅ Winner কে ইমেইল পাঠানো
                Mail::to($highestBid->user->email)->send(new WinnerNotificationMail($highestBid));
            }
        }

        return 'Winners updated and notified via email.';
    }
}
