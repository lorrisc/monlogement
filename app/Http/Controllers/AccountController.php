<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            return view('accountdashboard');
        }
    }

    public function logout()
    {
        session()->forget('account_id');
        return redirect()->route('home');
    }
}
