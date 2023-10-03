<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('auth.register');
    }

    public function store( Request $request ){

        $request->request->add(['username' => Str::slug($request->username)]);

        // dd($request->get('email'));
        $this->validate( $request, [
            'name' => 'required|min:3|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ] );

        // dd('Creando usuario');
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Auntenticar un usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Otra manera
        // auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', auth()->user()->username);

    }
}
