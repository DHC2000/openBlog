@extends('includes.app')
    @section('title')
        Agregar Etiquetas
    @endsection()

    @section('content')
        <form action="{{ url('/Nota/join')}}" method="POST">
             @include('crudEtiqueta.addTag')
        </form>

    @endsection()