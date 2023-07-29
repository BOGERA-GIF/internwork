<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // You can customize the data to be passed to the view if needed
        return view('home');
    }
}
