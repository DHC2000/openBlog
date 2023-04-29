@extends('includes.app')
    @section('title')
        Editar Nota
    @endsection()
    @section('header')
            Editar Nota
    @endsection
    @section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('/Nota/'.$nota->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PATCH')}}
                     @include('includes.form')
                </form>
            </div>
        </div>
    </div>
    @endsection()