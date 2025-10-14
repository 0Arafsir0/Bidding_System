<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'role'));

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

  
public function myWonAuctions()
{
    $bids = \App\Models\Bid::with('auction')
        ->where('user_id', auth()->id())
        ->where('is_winner', true)
        ->latest()
        ->get();

    return view('user.my-won-auctions', compact('bids'));
}



}
