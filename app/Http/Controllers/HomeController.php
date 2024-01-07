<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function submit(Request $request)
    {
        // TODO: Form validation and file saving
        return redirect()->back();
    }
}
