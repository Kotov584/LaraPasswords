<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index () {
        $passwords = auth()->user()->passwords()->paginate(24);  
        
        return view('dashboard.index', ['passwords' => $passwords]);
    }
}
