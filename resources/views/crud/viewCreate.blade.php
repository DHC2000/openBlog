@extends('includes.app')
    @section('title')
        Crear
    @endsection()
    @section('header')
        Nueva Nota
    @endsection
    @section('content')
        <form action="{{ url('/Nota')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('includes.form')
        </form>
    @endsection()
