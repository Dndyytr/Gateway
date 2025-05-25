<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            return redirect()->route('dashboard.index');
        } catch (\Exception $e) {
            return redirect()->route('login.index')->with('error', 'Login Failed ' . $e->getMessage());
        }

    }
}
