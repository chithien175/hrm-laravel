<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(){
        // \Setting::set('foo', 'bar');
        // \Setting::save();
        
        return view('company.index');
    }
}
