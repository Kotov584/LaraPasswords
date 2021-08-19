<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegistrationRequest;

class UnRegisteredUserController extends Controller
{
    public function create () {
        return view('dashboard.register');
    }

    public function store (RegistrationRequest $request) {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect()->route('dashboard.index');
    }
}
