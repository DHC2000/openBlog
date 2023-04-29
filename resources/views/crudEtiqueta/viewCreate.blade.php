@extends('includes.app')
    @section('title')
        Nueva Etiqueta
    @endsection()

    @section('content')
        <form action="{{ url('/Tags')}}" method="POST">
            @csrf
            @include('includes.formEtiqueta')
        </form>
    @endsection()