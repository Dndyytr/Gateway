<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'email_address' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'company_name' => 'required',
                'person_in_charge' => 'required',
                'npwp' => 'required',
                'company_legality' => 'required',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('register.index')->with('error', 'Register Failed ' . $e->getMessage());
        }

    }
}
