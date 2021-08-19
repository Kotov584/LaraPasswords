<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Password;

class PasswordController extends Controller
{
    public function index () {
        $passwords = auth()->user()->passwords; 

        return view('dashboard.index', ['passwords' => $passwords]);
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
}
