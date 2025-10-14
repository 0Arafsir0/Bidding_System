@extends('layouts.app')


@section('content')
<div class="max-w-5xl mx-auto mt-10">
<h1 class="text-2xl font-bold mb-6">Auction Reports</h1>
<p class="mb-4 text-gray-600">Generate and download reports about bids, auctions, and user activity.</p>
<a href="{{ route('admin.reports.download') }}" class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition duration-300">Download PDF Report</a>
</div>
@endsection