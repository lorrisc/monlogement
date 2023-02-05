<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            return view('addashboard');
        }
    }

    public function dppublishad()
    {
        if (!session()->has('account_id')) {
            return redirect()->route('signin');
        } else {
            return view('publishad');
        }
    }
}
