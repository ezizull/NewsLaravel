<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index(){
        return view('admin.dashboard');
    }
}
