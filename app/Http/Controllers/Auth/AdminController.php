<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function construct() {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('dashboard');
    }
}
