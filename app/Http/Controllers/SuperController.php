<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperController extends Controller
{
    public function home(){
        return view('root.home');
    }
}
