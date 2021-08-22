<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculationController extends Controller
{
    public function index (){
        return view('contact_us', ['title'=>'contact_us']);
    }

}
