@extends('layouts.app')


@section('content')
<div class="max-w-4xl mx-auto mt-10">
<h1 class="text-2xl font-bold mb-6">System Logs</h1>
<div class="bg-gray-100 p-4 rounded h-96 overflow-auto">
<pre class="text-sm text-gray-800">
@foreach(file(storage_path('logs/laravel.log')) as $line)
{{ $line }}
@endforeach
</pre>
</div>
</div>
@endsection