@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">💰 All Payments</h1>

    <table class="table-auto w-full border-collapse border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Auction</th>
                <th class="border px-4 py-2">Amount</th>
                <th class="border px-4 py-2">Bkash Number</th>
                <th class="border px-4 py-2">Transaction ID</th>
                <th class="border px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
            <tr>
                <td class="border px-4 py-2">{{ $payment->user->name }}</td>
                <td class="border px-4 py-2">{{ $payment->auction->title }}</td>
                <td class="border px-4 py-2">${{ number_format($payment->amount, 2) }}</td>
                <td class="border px-4 py-2">{{ $payment->bkash_number }}</td>
                <td class="border px-4 py-2">{{ $payment->transaction_id }}</td>
                <td class="border px-4 py-2">{{ $payment->updated_at->format('M d, Y h:i A') }}</td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center py-4 text-gray-500">No payments yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
