@extends('layouts.app')


@section('content')
<div class="max-w-6xl mx-auto mt-10">
<h1 class="text-2xl font-bold mb-6">Manage Users</h1>
<table class="min-w-full bg-white border">
<thead>
<tr>
<th class="py-2 px-4 border-b">Name</th>
<th class="py-2 px-4 border-b">Email</th>
<th class="py-2 px-4 border-b">Role</th>
<th class="py-2 px-4 border-b">Action</th>
</tr>
</thead>
<tbody>
@foreach(App\Models\User::all() as $user)
<tr>
<td class="py-2 px-4 border-b">{{ $user->name }}</td>
<td class="py-2 px-4 border-b">{{ $user->email }}</td>
<td class="py-2 px-4 border-b">{{ $user->role }}</td>
<td class="py-2 px-4 border-b">
<a href="#" class="text-indigo-600 hover:underline">Edit</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection