<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\CreatePasswordRequest;
use App\Models\Password;

class PasswordController extends Controller
{
    public function index () {
        $passwords = auth()->user()->passwords()->paginate(25);  
        $categories = auth()->user()->categories()->get();  
        
        return view('dashboard.passwords.index', compact('passwords', 'categories'));
    }

    public function create () {

    }

    public function store (CreatePasswordRequest $request) {  
        $user = Password::create($request->validated()); 
        $passwords = auth()->user()->passwords()->paginate(25);  
        $categories = auth()->user()->categories()->get();  
        
        return view('dashboard.passwords.index', compact('passwords', 'categories'));

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
