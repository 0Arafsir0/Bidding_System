@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Auctions -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600 text-sm font-medium">Total Auctions</h3>
            <p class="mt-1 text-3xl font-semibold text-gray-900">{{ $auctionCount }}</p>
        </div>

        <!-- Total Bids -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600 text-sm font-medium">Total Bids</h3>
            <p class="mt-1 text-3xl font-semibold text-gray-900">{{ $bidCount }}</p>
        </div>

        <!-- Won Auctions -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600 text-sm font-medium">Won Auctions</h3>
            <p class="mt-1 text-3xl font-semibold text-green-600">{{ $wonCount }}</p>
        </div>

        <!-- Active Auctions -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600 text-sm font-medium">Active Auctions</h3>
            <p class="mt-1 text-3xl font-semibold text-blue-600">{{ $activeCount }}</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>

    <a href="{{ route('admin.auction.report') }}"
   class="inline-block px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
   📄 Download PDF Report
</a>
</div>
@endsection
