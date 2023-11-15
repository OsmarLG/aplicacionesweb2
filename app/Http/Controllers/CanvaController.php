<?php

namespace App\Http\Controllers;

use App\Models\Canva;
use Illuminate\Http\Request;

class CanvaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $canvas = Canva::where('user_id', auth()->user()->id)->get();

        return view('canvas.index', ['canvas' => $canvas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('canvas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Obtener la imagen base64 desde el campo oculto
        $imagenBase64 = $request->input('imagen');

        // Decodificar la imagen base64
        $imagenDecodificada = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenBase64));

        // Guardar la imagen en el sistema de archivos
        $nombreArchivo = 'canva_' . time() . '-' . auth()->user()->username . '.png';
        file_put_contents(public_path('canvas/' . $nombreArchivo), $imagenDecodificada);

        // Guardar la información en la base de datos
        Canva::create([
            'nombre_canva' => $nombreArchivo,
            'user_id' => auth()->user()->id,
        ]);

        return redirect(route('home'));
    }

    public function download($id){
        $imagen = Canva::findOrFail($id);
        $rutaImagen = public_path('canvas/' . $imagen->nombre_canva);

        return response()->download($rutaImagen);
    }

    /**
     * Display the specified resource.
     */
    public function show(Canva $canva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Canva $canva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Canva $canva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Canva $canva)
    {
        //
    }
}
