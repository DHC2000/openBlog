@extends('includes.app')
    @section('title')
        Notas por Etiqueta
    @endsection()

    @section('content')
        @include('crudEtiqueta.listNE')
    @endsection()