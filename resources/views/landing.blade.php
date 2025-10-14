@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="text-center py-20 bg-gradient-to-r from-blue-500 to-indigo-600 text-white">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to the Bidding System</h1>
        <p class="text-lg md:text-xl mb-6">Discover auctions and place your bids securely.</p>
        @guest
            <a href="{{ route('login') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded shadow hover:bg-gray-100 transition">Login to Start Bidding</a>
        @else
            <a href="{{ route('auction.index') }}" class="px-6 py-3 bg-white text-blue-600 font-semibold rounded shadow hover:bg-gray-100 transition">Explore Auctions</a>
        @endguest
    </section>

    <!-- Auctions Preview -->
    <section class="max-w-6xl mx-auto py-16 px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Current Auctions</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse ($auctions as $auction)
                <div class="bg-white shadow rounded overflow-hidden hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $auction->image) }}" alt="Auction Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ $auction->title }}</h3>
                        <p class="text-gray-600 mb-2">{{ Str::limit($auction->description, 60) }}</p>
                        <p class="text-gray-800 font-bold mb-2">Starting at: ${{ $auction->starting_price }}</p>
                        <p class="text-gray-500 text-sm mb-4">Ends: {{ \Carbon\Carbon::parse($auction->end_time)->toFormattedDateString() }}</p>

                        @guest
                            <a href="{{ route('login') }}" class="block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Login to View / Bid</a>
                        @else
                            <a href="{{ route('auction.show', $auction->id) }}" class="block text-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">View / Bid</a>
                        @endguest
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">No auctions available right now.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
