<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SvgController extends Controller
{
    //
    public function index(){
        return view('svg.svgs');
    }
}
