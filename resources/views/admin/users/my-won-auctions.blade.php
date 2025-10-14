@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">🏆 My Won Auctions</h2>

    @forelse ($bids as $bid)
        <div class="border-b py-3">
            <h3 class="font-semibold text-lg">{{ $bid->auction->title }}</h3>
            <p>Amount: ${{ number_format($bid->amount, 2) }}</p>
            <p>Status: 
                @if($bid->payment_status === 'paid')
                    <span class="text-green-600">Paid</span>
                @else
                    <span class="text-yellow-600">Pending Payment</span>
                @endif
            </p>
            <p class="text-sm text-gray-500">Ended: {{ $bid->auction->end_time->format('M d, Y h:i A') }}</p>
        </div>
    @empty
        <p class="text-gray-500">You haven’t won any auctions yet.</p>
    @endforelse
</div>
@endsection
