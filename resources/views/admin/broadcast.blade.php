@extends('layouts.app')


@section('content')
<div class="max-w-4xl mx-auto mt-10">
<h1 class="text-2xl font-bold mb-6">Broadcast Message</h1>
<form method="POST" action="#" class="space-y-4">
@csrf
<div>
<label class="block font-medium">Message</label>
<textarea class="w-full border border-gray-300 rounded px-4 py-2" rows="4" placeholder="We will be performing scheduled maintenance on Friday at 9:00 PM.
Access to the system may be limited during this period. We appreciate your understanding as we work to serve you better.

...........Developer team"></textarea>
</div>
<button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Send Broadcast</button>
</form>
</div>
@endsection