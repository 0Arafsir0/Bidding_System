@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 mt-10 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Manage Users</h2>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Role</th>
                <th class="py-2 px-4 border">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="py-2 px-4 border">{{ $user->name }}</td>
                <td class="py-2 px-4 border">{{ $user->email }}</td>
                <td class="py-2 px-4 border">{{ $user->role }}</td>
                <td class="py-2 px-4 border">
                    <a href="{{ route('admin.users.edit', $user->id) }}"
                       class="text-blue-600 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
