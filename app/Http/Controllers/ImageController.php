<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {

        //Primero saco la imagen del formulario
        $imagen = $request->file('file');


        //Ahora le asigno un nombre único para que no haya duplicados
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //Convierto el archivo temporal en una imagen procesada por intervention
        $imagenServidor = Image::make($imagen);

        //Limito el tamaño a 1000x1000
        $imagenServidor->fit(1000, 1000);

        //Le digo que la imagen se almacenará en "public/uploads/"
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        //Le digo que la guarde
        $imagenServidor->save($imagenPath);


        return response()->json(['imagen' => $nombreImagen]);
    }
}
