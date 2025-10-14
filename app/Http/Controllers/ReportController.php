<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Bid;
use App\Models\User;
use PDF; // dompdf alias


class ReportController extends Controller
{
    public function generatePDF()
    {
        $auctions = Auction::with('user', 'winner')->latest()->get();

        $pdf = PDF::loadView('reports.auction_history', compact('auctions'));
        return $pdf->download('auction_history_report.pdf');
    }
     public function download()
    {
        $auctions = Auction::with('bids.user')->get();
        $bids = Bid::with('auction', 'user')->get();
        $users = User::all();

        $pdf = PDF::loadView('admin.reports_pdf', [
            'auctions' => $auctions,
            'bids' => $bids,
            'users' => $users,
        ]);

        return $pdf->download('admin_auction_report.pdf');
    }
}
