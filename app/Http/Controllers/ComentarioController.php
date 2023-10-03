<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store( Request $request, User $user, Post $post  ){
        
        // dd($post->id);
        //validar comentarios
        $this->validate($request, [
            'comentario' => 'required|max:200'
        ]);

        //almacenar comentarios
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // imprimir mensaje
        return back()->with('mensaje', 'Comentario realizado correctamente');

    }
}
