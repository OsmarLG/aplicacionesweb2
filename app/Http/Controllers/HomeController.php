<?php

namespace App\Http\Controllers;

use App\Models\Canva;
use App\Models\Encuesta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public $realizoEncuesta = false;
    
    public function index(){
        $encuestaEncontrada = Encuesta::where('user_id', auth()->user()->id)->get()->first();
        if($encuestaEncontrada)
        {
            $this->realizoEncuesta = true;
        }

        $canvas = Canva::all();

        return view('home', ['realizoEncuesta' => $this->realizoEncuesta, 'canvas' => $canvas]);
    }
}
