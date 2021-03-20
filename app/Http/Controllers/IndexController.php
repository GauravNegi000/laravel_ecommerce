<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // function to return index page
    public function index()
    {
        if (Auth::user()) {
            if (!Auth::user()->email_verified_at) {
                return view('index')->with('message', 'Your Email is not verified.');
            }
        }
        return view('index');
    }
}
