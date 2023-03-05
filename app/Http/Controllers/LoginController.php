<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function store(Request $request, User $user)
    {



        //Validar formulario

        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required',

        ]);

        //Login attempt

        if (!auth()->attempt($request->only('email', 'password', $request->remember))) {

            return back()->with('mensaje', 'Credenciales incorrectas');
        } else {

            return redirect()->route('posts.index', auth()->user()->username);
        }
    }
}
