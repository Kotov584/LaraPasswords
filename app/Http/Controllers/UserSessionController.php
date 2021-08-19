<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSessionController extends Controller
{
    public function create () {
        return view('dashboard.login');
    }
    
    public function store () {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        } 
        
        return redirect()->route('dashboard.index');
    }

    public function destroy () {  
        auth()->logout();
        
        return redirect()->route('login');
    }
}
