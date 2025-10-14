@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6">👑 Admin Dashboard</h1>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-100 text-blue-800 p-4 rounded shadow">👤 Total Users: {{ $userCount }}</div>
        <div class="bg-green-100 text-green-800 p-4 rounded shadow">📦 Auctions: {{ $auctionCount }}</div>
        <div class="bg-yellow-100 text-yellow-800 p-4 rounded shadow">💸 Bids: {{ $bidCount }}</div>
    </div>

    <!-- Chart -->
    <div class="bg-white shadow rounded p-6 mb-6">
        <h2 class="text-xl font-semibold mb-4">📊 Admin Stats (Chart)</h2>
        <canvas id="adminChart" width="400" height="200"></canvas>
    </div>

    <!-- Auction Table -->
    <div class="bg-white shadow rounded p-4">
        <h2 class="text-xl font-semibold mb-4">📋 Recent Auctions</h2>
        <table class="w-full text-sm text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">ID</th>
                    <th class="p-2 border">Title</th>
                    <th class="p-2 border">Created By</th>
                    <th class="p-2 border">End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auctions as $auction)
                    <tr class="hover:bg-gray-50">
                        <td class="p-2 border">{{ $auction->id }}</td>
                        <td class="p-2 border">{{ $auction->title }}</td>
                        <td class="p-2 border">{{ $auction->user->name ?? 'N/A' }}</td>
                        <td class="p-2 border">{{ \Carbon\Carbon::parse($auction->end_time)->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $auctions->links() }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart.js Script -->
    <script>
        const ctx = document.getElementById('adminChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Users', 'Auctions', 'Bids'],
                datasets: [{
                    label: 'Total Count',
                    data: [{{ $userCount }}, {{ $auctionCount }}, {{ $bidCount }}],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.5)', // blue
                        'rgba(16, 185, 129, 0.5)', // green
                        'rgba(234, 179, 8, 0.5)'   // yellow
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(234, 179, 8, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection
