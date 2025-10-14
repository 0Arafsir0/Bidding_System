@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">📌 My Bids</h1>
    @forelse ($bids as $bid)
        <div class="border p-4 mb-3 rounded shadow">
            <p>
                On <strong>{{ $bid->auction->title }}</strong>,
                you bid <span class="text-blue-700 font-semibold">${{ number_format($bid->amount, 2) }}</span>
                at {{ $bid->created_at->format('d M Y h:i A') }}
            </p>
        </div>
    @empty
        <p class="text-gray-600">You haven't placed any bids yet.</p>
    @endforelse
</div>
@endsection
