<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = Image::make($imagen);

        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        $imagenServidor->save($imagenPath);

        Return response()->json(['imagen' => $nombreImagen]);
    }
}
