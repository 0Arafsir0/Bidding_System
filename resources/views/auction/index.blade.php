
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">All Auctions</h1>

        @foreach ($auctions as $auction)
            <div class="bg-white rounded shadow p-4 mb-4 grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                
                <!-- Image Preview -->
                <div class="col-span-1">
                    @if($auction->image)
                        <img src="{{ asset('storage/' . $auction->image) }}" alt="Auction Image"
                             class="w-full h-32 object-cover rounded">
                    @else
                        <div class="w-full h-32 bg-gray-200 rounded flex items-center justify-center text-gray-500 text-sm">
                            No Image
                        </div>
                    @endif
                </div>

                <!-- Auction Details -->
                <div class="col-span-3">
                    <h2 class="text-xl font-semibold">{{ $auction->title }}</h2>
                    <p class="text-sm text-gray-700">{{ $auction->description }}</p>
                    <p class="text-gray-600 mt-1">Starting at: ${{ $auction->starting_price }}</p>
                    <p class="text-sm text-gray-500">Ends at: {{ \Carbon\Carbon::parse($auction->end_time)->toDayDateTimeString() }}</p>
                  
                    <!-- ✅ Countdown Timer -->
                    <p class="text-sm text-gray-500">
                        Ends in: 
                        <span id="timer-{{ $auction->id }}" class="font-bold text-red-600"></span>
                    </p>
                    
                    <!-- Winner Info -->
@if($auction->winner_id)
    <p class="text-green-700 font-semibold mt-2">
        🏆 Winner: {{ $auction->winner->name }}
    </p>
@endif

                    <a href="{{ route('auction.show', $auction->id) }}" class="text-blue-600 underline mt-2 inline-block">
                        View Auction
                    </a>
                </div>


                
            </div>
        @endforeach
    </div>
    <script>
    // Countdown function per auction
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
        @foreach ($auctions as $auction)
            startCountdown({{ $auction->id }}, "{{ $auction->end_time }}");
        @endforeach
    });
</script>
@endsection

