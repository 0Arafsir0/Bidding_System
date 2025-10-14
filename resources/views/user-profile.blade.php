@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <div class="bg-white p-6 rounded-lg shadow-md">
        <!-- Profile Section -->
        <div class="flex items-center space-x-6">
            <!-- Avatar -->
            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=random' }}" 
                 alt="User Avatar" class="w-20 h-20 rounded-full border border-gray-300 shadow">

            <!-- Name & Email -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                <p class="text-gray-500">{{ Auth::user()->email }}</p>
            </div>

            <!-- Edit Profile Button -->
            <div class="ml-auto">
                <a href="{{ route('profile.edit') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                    ✏️ Edit Profile
                </a>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-6">

        <!-- Stats Section -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-lg font-bold text-gray-800">{{ $totalAuctions ?? 0 }}</p>
                <p class="text-sm text-gray-500">Total Auctions</p>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800">{{ $totalBids ?? 0 }}</p>
                <p class="text-sm text-gray-500">Total Bids</p>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800">৳{{ number_format($totalBidAmount ?? 0) }}</p>
                <p class="text-sm text-gray-500">Total Bid Amount</p>
            </div>
            <div>
                <p class="text-lg font-bold text-gray-800">{{ $wonAuctions ?? 0 }}</p>
                <p class="text-sm text-gray-500">Auctions Won</p>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-6">

        <!-- Recent Bids Table -->
        <h3 class="text-xl font-semibold text-gray-700 mb-4">🕒 Recent Bids</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border border-gray-200 text-sm">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-2">Auction Title</th>
                        <th class="px-4 py-2">Bid Amount</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Date</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($recentBids as $bid)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $bid->auction->title }}</td>
                            <td class="px-4 py-2">৳{{ number_format($bid->amount) }}</td>
                            <td class="px-4 py-2">
                                @if($bid->auction->winner_id == $bid->user_id)
                                    <span class="text-green-600 font-semibold">Winner</span>
                                @else
                                    <span class="text-gray-500">Pending</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $bid->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">No recent bids.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
