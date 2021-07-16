<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatekController extends Controller
{
    public function index(){
        return view('welcome', ["title" => "Welcome"]);
    }
}
