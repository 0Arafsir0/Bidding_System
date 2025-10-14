@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">🏆 Leaderboard</h1>
    <table class="min-w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="text-left py-2 px-4">User</th>
                <th class="text-left py-2 px-4">Highest Bid</th>
                <th class="text-left py-2 px-4">Total Bids</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if($user->bids->count())
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4 text-green-700 font-semibold">${{ number_format($user->bids->first()->amount, 2) }}</td>
                        <td class="py-2 px-4">{{ $user->bids->count() }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
