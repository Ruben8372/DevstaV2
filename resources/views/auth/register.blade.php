@extends('layouts.app')

@section('titulo','Regístrate en DevStagram')

@section('contenido')

<div class="md:flex md:justify-center">

    <div class="md:w-4/12 bg-white md:rounded-l-lg shadow-lg">
        <img src="{{asset('img/registrar.jpg')}}" alt="RegisterImg" class="h-full p-3 rounded-3xl" />
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-r-lg shadow-lg">
        <form action="{{route('register')}}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                <input id="name" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                    type="text" name="name" placeholder="Tu Nombre" value="{{old('name')}}" />
                @error('name')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                <input id="name" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" <input
                    id="username" class="border p-3 w-full rounded-lg" type="text" name="username"
                    placeholder="Tu Nombre de Usuario" value="{{old('username')}}" />
                @error('username')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email de registro</label>
                <input id="name" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" <input
                    id="email" class="border p-3 w-full rounded-lg" type="email" name="email" placeholder="Tu Nombre"
                    value="{{old('email')}}" />
                @error('email')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                <input id="name" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" <input
                    id="password" class="border p-3 w-full rounded-lg" type="password" name="password"
                    placeholder="Contraseña" />
                @error('password')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar
                    Contraseña</label>
                <input id="name"
                    class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror" <input
                    id="password_confirmation" class="border p-3 w-full rounded-lg" type="password"
                    name="password_confirmation" placeholder="Repetir Contraseña" />
                @error('password_confirmation')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <input
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                type="submit" value="Crear cuenta" />
        </form>
    </div>




</div>


@endsection