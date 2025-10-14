<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        $payments = Bid::where('payment_status', 'paid')
            ->with(['user', 'auction'])
            ->latest()
            ->get();

        return view('admin.payments.index', compact('payments'));
    }
}
