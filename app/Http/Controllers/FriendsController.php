<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    function index(){
        $user = User::with('friends')->find(auth()->user()->id);
        // dd($user);
        return view('friends');
    }
}
