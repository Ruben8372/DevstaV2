@extends('layouts.app')

@section('titulo')

Página principal

@endsection


@section('contenido')
    
    <x-Listar-post :posts="$posts"/>

@endsection