@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Create Auction</h1>
      <form method="POST" action="{{ route('auction.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">Title</label>
                <input type="text" name="title" id="title" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" class="w-full border px-3 py-2" required></textarea>
            </div>
            <div class="mb-4">
                <label for="starting_price" class="block text-sm font-medium">Starting Price</label>
                <input type="number" name="starting_price" id="starting_price" class="w-full border px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="end_time" class="block text-sm font-medium">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time" class="w-full border px-3 py-2" required>
            </div>

             <!-- Existing fields -->

            <div>
                 <label for="image">Upload Image</label>
                 <input type="file" name="image" accept="image/*" required>
             </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
        </form>
    </div>
@endsection
