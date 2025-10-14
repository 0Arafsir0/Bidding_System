@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-8 bg-white shadow p-6 rounded">
    <h2 class="text-2xl font-bold mb-4">🧾 All Payments</h2>

    <table class="w-full border border-collapse text-sm">
        <thead class="bg-gray-200 text-left">
            <tr>
                <th class="border px-3 py-2">User</th>
                <th class="border px-3 py-2">Auction</th>
                <th class="border px-3 py-2">Amount</th>
                <th class="border px-3 py-2">Bkash Number</th>
                <th class="border px-3 py-2">Transaction ID</th>
                <th class="border px-3 py-2">Payment Status</th>
                <th class="border px-3 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bids as $bid)
                <tr>
                    <td class="border px-3 py-2">{{ $bid->user->name }}</td>
                    <td class="border px-3 py-2">{{ $bid->auction->title }}</td>
                    <td class="border px-3 py-2">{{ $bid->amount }}</td>
                    <td class="border px-3 py-2">{{ $bid->bkash_number }}</td>
                    <td class="border px-3 py-2">{{ $bid->transaction_id }}</td>
                    <td class="border px-3 py-2">
                        @if($bid->payment_status === 'paid')
                            <span class="text-green-600 font-semibold">Paid</span>
                        @else
                            <span class="text-yellow-600 font-semibold">Pending</span>
                        @endif
                    </td>
                    <td class="border px-3 py-2">{{ $bid->updated_at->format('d M Y h:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">No payment found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
