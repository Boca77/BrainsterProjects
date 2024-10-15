<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->where('is_admin', '=', false)->get();

        return view('users', compact('users'));
    }

    /**
     * Display a certain user.
     */
    public function showUser(User $user)
    {
        $user->load('friends');

        return view('user', compact('user'));
    }

    /**
     * Delete a user
     */
    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully!');
    }

    /**
     * Ban a user that broke terms of services
     */
    public function ban(User $user)
    {
        $user->update([
            'is_banned' => true
        ]);

        return redirect()->back();
    }

    /**
     * Ban a user that broke terms of services
     */
    public function unban(User $user)
    {
        $user->update([
            'is_banned' => false
        ]);

        return redirect()->back();
    }
}
