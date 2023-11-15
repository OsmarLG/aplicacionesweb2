<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $encuestas = Encuesta::all();

        return view('encuestas.index', ['encuestas' => $encuestas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('encuestas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'edad' => 'required',
            'sexo' => 'required',
            'frecuencia' => 'required',
            'acercamiento' => 'required',
            'satisfaccion' => 'required',
            'mejorar' => 'required',
            'comentario' => 'required',
            'futuro' => 'required',
            'correo' => 'required|email',
            'user_id' => 'unique:encuestas'
        ]);

        Encuesta::create([
            'edad' => $request->input('edad'),
            'sexo' => $request->input('sexo'),
            'frecuencia' => $request->input('frecuencia'),
            'acercamiento' => $request->input('acercamiento'),
            'satisfaccion' => $request->input('satisfaccion'),
            'mejorar' => $request->input('mejorar'),
            'comentario' => $request->input('comentario'),
            'futuro' => $request->input('futuro'),
            'correo' => $request->input('correo'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Encuesta $encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encuesta $encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encuesta $encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encuesta $encuesta)
    {
        //
    }
}
