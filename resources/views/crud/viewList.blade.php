@extends('includes.app')
    @section('title')
        List
    @endsection()
    @section('nav')
        @include('includes.nav')
    @endsection()
    @section('content')
        @include('crud.list')
    @endsection()