<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class PasswordController extends Controller
{
    public function index () {
        $passwords = auth()->user()->passwords()->paginate(50);  
        
        return view('dashboard.passwords.index', compact('passwords'));
    }

    public function create () {

    }

    public function store () {

    }

    public function show () {

    }

    public function edit () {

    }

    public function update () {

    }

    public function delete () {

    }

    public function search () {
        $passwords = auth()->user()->passwords()->paginate(50);  
        
        return view('dashboard.passwords.index', compact('passwords'));
    }
}
