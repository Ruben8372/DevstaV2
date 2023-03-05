@extends('layouts.app')

@section('titulo','Inicia Sesión en DevStagram')

@section('contenido')

<div class="md:flex md:justify-center">

    <div class="md:w-4/12 bg-white md:rounded-l-lg shadow-lg">
        <img src="{{asset('img/login.jpg')}}" alt="LoginrImg" class="h-93 p-3 rounded-3xl" />
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-r-lg shadow-lg">
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-5">

                <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                <input id="name" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" <input
                    id="email" class="border p-3 w-full rounded-lg" type="email" name="email" placeholder="Email"
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

            <div class="mb-5 flex items-center space-x-2">
                <input id="remember" class="border p-3" type="checkbox" name="remember" /> <span
                    class="text-xs font-bold uppercase text-gray-500">Manten
                    mi
                    sesión abierta</span>
                @error('password')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-2">
                @if(session('mensaje'))
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{session('mensaje')}}</p>
                @endif
            </div>

            <input
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                type="submit" value="Iniciar sesión" />
        </form>
    </div>




</div>


@endsection