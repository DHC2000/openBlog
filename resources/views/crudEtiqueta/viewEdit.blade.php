@extends('includes.app')
    @section('title')
        Editar Etiqueta
    @endsection()

    @section('content')
        <form action="{{ url('/Tags/'.$tag->id)}}" method="POST">
            @csrf
            @include('includes.formEtiqueta')
        </form>
    @endsection()