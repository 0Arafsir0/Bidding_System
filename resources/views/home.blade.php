@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-blue-50 to-white py-16">
    <div class="max-w-5xl mx-auto text-center px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-4">
            Welcome to a <span class="text-blue-600">bidding system Platform</span>
        </h1>
        <p class="text-lg text-gray-600 mb-6">
            This is your homepage. Use the dashboard to manage auctions, bids, and reports.
        </p>
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg hover:bg-blue-700 transition">
            Go to Dashboard
        </a>
    </div>

    <!-- Feature Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-16 max-w-5xl mx-auto px-4">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm text-gray-500 mb-2 uppercase tracking-wide">Total Auctions</h2>
            <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Auction::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm text-gray-500 mb-2 uppercase tracking-wide">Total Bids</h2>
            <p class="text-3xl font-bold text-green-600">{{ \App\Models\Bid::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-sm text-gray-500 mb-2 uppercase tracking-wide">Active Auctions</h2>
            <p class="text-3xl font-bold text-yellow-600">
                {{ \App\Models\Auction::where('end_time', '>', now())->count() }}
            </p>
        </div>
    </div>
</div>
@endsection
