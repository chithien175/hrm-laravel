<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'only_active_user']);
    }

    public function getDashboard(){
        return view('dashboard.index');
    }
}
