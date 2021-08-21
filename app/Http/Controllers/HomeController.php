<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $passwords = auth()->user()->passwords()->paginate(50);  
        
        return view('dashboard.index', compact('passwords'));
    }
}
