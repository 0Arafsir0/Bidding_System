@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded shadow text-center">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">About Developer</h1>
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/priyam.jpg') }}" alt="Developer Avatar"
             class="w-32 h-32 rounded-full shadow mb-4 border-4 border-indigo-500">
        <h2 class="text-2xl font-semibold text-indigo-700">Priyam Sharma</h2>
        <p class="text-gray-600 text-sm mt-1">ID: <span class="font-mono">0222220005101018</span></p>
   


<img src="{{ asset('images/ayas.jpg') }}"alt="Developer Avatar"
             class="w-32 h-32 rounded-full shadow mb-4 border-4 border-indigo-500">
        <h2 class="text-2xl font-semibold text-indigo-700">MD Aias</h2>
        <p class="text-gray-600 text-sm mt-1">ID: <span class="font-mono">0222220005101041</span></p>


<img src="{{ asset('images/arafat.jpg') }}" alt="Developer Avatar"
             class="w-32 h-32 rounded-full shadow mb-4 border-4 border-indigo-500">
        <h2 class="text-2xl font-semibold text-indigo-700">Mohammad Arafat Siraj</h2>
        <p class="text-gray-600 text-sm mt-1">ID: <span class="font-mono">0222220005101030</span></p>

        
<img src="{{ asset('images/omi.jpg') }}" alt="Developer Avatar"
             class="w-32 h-32 rounded-full shadow mb-4 border-4 border-indigo-500">
        <h2 class="text-2xl font-semibold text-indigo-700">Abir Ahamed Omi</h2>
        <p class="text-gray-600 text-sm mt-1">ID: <span class="font-mono">0222220005101021</span></p>


        <p class="mt-6 text-gray-700 leading-relaxed">
            This project is developed by our team as part of a Laravel learning and system building journey.
            <br>
            Feel free to explore auctions, bids, and leaderboard to experience the full features of this system.
        </p>
    </div>
</div>
@endsection
