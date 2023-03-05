@extends('layouts.app')

@section('titulo')
Crea una nueva Publicación
@endsection


@push('styles')
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush




@section('contenido')

<div class="md:flex md:items-center">
    <div class="md:w-1/2 px-10">
        <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
            class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
            @csrf
        </form>



    </div>
    <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl">

        <form action="{{route('posts.store')}}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                <input id="titulo" class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                    type="text" name="titulo" placeholder="Tu Nombre" value="{{old('titulo')}}" />
                @error('titulo')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripcion</label>
                <textarea id="descripcion"
                    class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror" name="descripcion"
                    placeholder="Introduce una descripción">{{old('description')}}</textarea>
                @error('descripcion')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input name="imagen" type="hidden" value="{{old('imagen')}}" />
                @error('imagen')
                <p class="bg-red-500 text-white text-sm text-center p-2 rounded-lg mt-2">{{$message}}</p>
                @enderror
            </div>


            <input
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                type="submit" value="SUBIR PUBLICACIÓN" />
        </form>

    </div>

</div>
@endsection