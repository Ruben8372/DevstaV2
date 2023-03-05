@extends('layouts.app')


@section('titulo')

    Editar perfil: {{auth()->user()->username}}

@endsection

@section('contenido')

    <div class="md:flex md:justify-center">

        <div class="w-1/2 bg-white shadow p-6 rounded-lg">

            <form class="mt-10 md:mt-0" action="{{ route('perfil.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario</label>
                    <input id="username" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        type="text" name="username" placeholder="Nombre de usuario" value="{{old('username')}}" />
                    @error('username')
                    <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil</label>
                    <input id="imagen" class="border p-3 w-full rounded-lg"
                        type="file" name="imagen" value="{{old('imagen')}}" accept=".jpg, .png, .jpeg" />
                   
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Correo electrónico</label>
                    <input id="email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        type="email" name="email" value="{{old('email')}}"/>

                        @error('email')
                        <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                        @enderror
                   
                </div>

                <div class="mb-5">
                    <label for="newpassword" class="mb-2 block uppercase text-gray-500 font-bold">Nueva contraseña</label>
                    <input id="newpassword" class="border p-3 w-full rounded-lg @error('newpassword') border-red-500 @enderror"
                        type="password" name="newpassword"/>

                        @error('newpassword')
                        <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                        @enderror
                   
                </div>

                <div class="my-10">
                    <p class="text-sm text-gray-700 text-center">Para guardar cambios, introduce tu contraseña actual</p>
                </div>






                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold @error('password') border-red-500 @enderror">Contraseña actual</label>
                    <input id="password" class="border p-3 w-full rounded-lg"
                        type="password" name="password"/>
                        @error('password')
                        <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                        @enderror
                        @if(session('mensaje'))
                        <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{session('mensaje')}}</p>
                        @endif
                </div>

               











                <input
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                type="submit" value="actualizar perfil" />



            </form>

        </div>

    </div>


@endsection