@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <!-- Auction Image -->
    @if ($auction->image)
        <img src="{{ asset('storage/' . $auction->image) }}" alt="{{ $auction->title }}" class="w-full h-64 object-cover rounded mb-4">
    @endif

    <h1 class="text-3xl font-bold mb-4">{{ $auction->title }}</h1>
    <p class="mb-2 text-gray-700">{{ $auction->description }}</p>
    <p class="mb-2"><strong>Starting Price:</strong> ${{ number_format($auction->starting_price, 2) }}</p>
    <p class="mb-4"><strong>Ends At:</strong> {{ \Carbon\Carbon::parse($auction->end_time)->format('F d, Y h:i A') }}</p>

    <!-- Countdown Timer -->
    <p class="text-sm text-gray-500">
        Ends in: 
        <span id="timer-{{ $auction->id }}" class="font-bold text-red-600"></span>
    </p>

    <hr class="my-6">

    <!-- Highest Bid Section -->
    @if ($auction->bids->count())
        <p class="mb-2 text-green-700 font-semibold">
            🔼 Highest Bid So Far: ${{ number_format($highestBid->amount, 2) }}
        </p>
    @else
        <p class="mb-2 text-yellow-600">No bids yet. Be the first to bid!</p>
    @endif

    <!-- Bid Form (Only show if auction hasn't ended) -->
    @if (\Carbon\Carbon::now()->lt($auction->end_time))
        <h2 class="text-xl font-semibold mb-2 mt-6">Place a Bid</h2>
        <form method="POST" action="{{ route('auction.bid', $auction->id) }}">
            @csrf
            <input type="number" step="0.01" name="amount" class="w-full border px-3 py-2 mb-4" placeholder="Enter your bid" required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit Bid</button>
        </form>
    @else
        <p class="text-red-600 font-semibold mt-6">⏰ Bidding time is over for this auction.</p>
    @endif

    <hr class="my-6">

    <h2 class="text-xl font-semibold mb-2">All Bids</h2>
    <ul class="space-y-2">
        @forelse($bids as $bid)
            <li class="border p-3 rounded">
                <strong>{{ $bid->user->name }}</strong> bid ${{ number_format($bid->amount, 2) }} 
                <span class="text-sm text-gray-500">on {{ $bid->created_at->format('M d, Y h:i A') }}</span>
            </li>
        @empty
            <p class="text-gray-500">No bids yet.</p>
        @endforelse
    </ul>

    <!-- ✅ Deadline & Winner Section (Modified + Merged) -->
    @if (now() > $auction->end_time)
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4 mt-6">
            ⏰ Auction Ended!

            @php
                $highestBid = $auction->bids->sortByDesc('amount')->first();
            @endphp

            @if($highestBid)
                <p class="mt-2">🏆 Winner: 
                    <strong>{{ $highestBid->user->name }}</strong> 
                    with ${{ number_format($highestBid->amount, 2) }}
                </p>

                {{-- 🧾 Show Payment Form if User is Winner --}}
                @if(auth()->check() && $highestBid->user_id === auth()->id())
                    @php $winnerBid = $highestBid; @endphp

                 @if($winnerBid->payment_status === 'pending')
    <div class="mt-6 p-4 border rounded bg-gray-50 shadow-inner">
        <h3 class="text-lg font-semibold mb-3 text-green-700 flex items-center gap-2">
            🧾 Complete Your Payment
        </h3>

        <form action="{{ route('bids.pay', $winnerBid->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="bkash_number" class="block font-medium text-gray-700 mb-1">bKash Number</label>
                <input type="text" name="bkash_number" id="bkash_number"
                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 p-2.5"
                       placeholder="e.g. 017XXXXXXXX" required>
            </div>

            <div>
                <label for="transaction_id" class="block font-medium text-gray-700 mb-1">Transaction ID</label>
                <input type="text" name="transaction_id" id="transaction_id"
                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring focus:ring-purple-200 p-2.5"
                       placeholder="e.g. TX123456789" required>
            </div>

            <!-- 🌈 Beautiful Modern Button -->
            <button type="submit"
                class="relative inline-flex items-center justify-center gap-2 px-6 py-2.5
                       bg-gradient-to-r from-purple-600 via-pink-600 to-purple-700
                       text-white font-semibold rounded-lg
                       shadow-[0_4px_12px_rgba(147,51,234,0.4)]
                       hover:shadow-[0_6px_18px_rgba(147,51,234,0.6)]
                       transition-all duration-300 ease-in-out
                       hover:scale-[1.03] focus:outline-none focus:ring-4 focus:ring-purple-300">
                💰 Submit Payment
            </button>
        </form>
    </div>
@elseif($winnerBid->payment_status === 'paid')
    <div class="mt-4 p-4 bg-green-100 border rounded">
        ✅ Payment Completed via bKash.<br>
        Transaction ID: <strong>{{ $winnerBid->transaction_id }}</strong>
    </div>
@endif




                @endif
            @else
                <p class="mt-2 text-gray-700">No bids were placed for this auction.</p>
            @endif
        </div>
    @endif
</div>

<script>
function startCountdown(auctionId, endTime) {
    const timerElement = document.getElementById(`timer-${auctionId}`);
    const end = new Date(endTime).getTime();

    const countdown = setInterval(() => {
        const now = new Date().getTime();
        const distance = end - now;

        if (distance < 0) {
            clearInterval(countdown);
            timerElement.innerText = "⏰ Ended";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        timerElement.innerText = `${days}d ${hours}h ${minutes}m ${seconds}s`;
    }, 1000);
}

document.addEventListener("DOMContentLoaded", function () {
    startCountdown({{ $auction->id }}, "{{ $auction->end_time }}");
});
</script>
@endsection
