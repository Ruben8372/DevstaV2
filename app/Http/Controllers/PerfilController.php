<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function index(){


        return view('perfil.index');

    }

    public function store(Request $request){

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => 'required|email|unique:users,imagen,'.auth()->user()->id,
            'password' => 'required|current_password',
        ]);

        if($request->newpassword){

        $this->validate($request, [

            'newpassword' => 'min:6|max:20|required'

        ]);

        }

        if($request->imagen){

        
        $imagen = $request->file('imagen');

        //Ahora le asigno un nombre único para que no haya duplicados
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //Convierto el archivo temporal en una imagen procesada por intervention
        $imagenServidor = Image::make($imagen);

        //Limito el tamaño a 1000x1000
        $imagenServidor->fit(1000, 1000);

        //Le digo que la imagen se almacenará en "public/uploads/"
        $imagenPath = public_path('avatares') . '/' . $nombreImagen;

        //Le digo que la guarde
        $imagenServidor->save($imagenPath);

        }




        if(Hash::check($request->password, auth()->user()->password)){

                $usuario = User::find(auth()->user()->id);
                $usuario->username = $request->username;
                $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
                $usuario->email = $request->email ?? auth()->user()->email;

                if($request->newpassword){

                    $usuario->password = Hash::make($request->newpassword);

                }
        
                $usuario->save();

                return redirect()->route('posts.index', $usuario->username)->with('correcto','¡Se han guardado los cambios! B)');

        }else{

                
                return back()->with('mensaje','La contraseña actual introducida no es correcta');
                
        }









        //Guardar cambios
       
        

        //Redireccion

        //return redirect()->route('posts.index', $usuario->username);
    }

}
