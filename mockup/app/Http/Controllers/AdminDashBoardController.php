<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LoginController;

class AdminDashboardController extends Controller


{
    public function index()
    {
        return view('layouts.admindash');
    }
}