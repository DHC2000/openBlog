@extends('layouts.app')

@section('content')
<div class="container">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('images/forSlider.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/forSlider-1.jpg')}}" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
</div>
<div class="container mt-5">
    <h1 class="mt-5">Notas</h1>
    <!--a class="btn btn-outline-info" href="{{url('/Nota/create')}}"><i class="fa fa-plus" aria-hidden="true"></i></a-->
    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
</div>
@foreach ($notas as $nota)
    <div class="container mt-3">
        <div class="card text-center text-dark bg-light mb-3" style="max-width: 100%;">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-5">
                        @foreach ($ets_nts as $ets)
                        @if($ets->nota_id == $nota->id)
                            @foreach($et as $tag)  
                                 @if($ets->etiqueta_id == $tag->id)
                                 <span class="badge badge-pill badge-primary bg-primary text-white">
                                    {{$tag->etiqueta}}
                                    <div class="col">
                                        <form class="" action="{{ url('/Nota/deljoin' )}}" method="POST">
                                            @csrf
                                            <div>
                                                <input type="number" name="nota_id" value="{{$nota->id}}" hidden> 
                                            </div>
                                            <div>
                                                <input type="number" name="etiqueta_id" value="{{$ets->etiqueta_id}}" hidden> 
                                            </div>
                                                <button class="btn btn-secondary btn-sm" type="submit" name="" onclick="return confirm('Quieres eliminar este registro?')"><i class="fa fa-ban" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </span>
                                 @endif
                            @endforeach
                        @endif
                    @endforeach    
    
                       {{-- @foreach($tags as $tag)
                                @if($nota->etiqueta_id == $tag->id)
                                    <label for="">{{$tag->etiqueta}}</label>
                                @endif
                        @endforeach--}}
                    </div>
                    <div class="col-sm-1">
                        <a class="btn btn-primary" href="{{ url('/Nota/'.$nota->id.'/addTags')}}" role="button"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-2">
                    </div>
    
                    <div class="col-3">
                        <div class="row">
                            <div class="col">
                                <a  target="_blank" class="btn btn-secondary" href="{{ url('/Nota/'.$nota->id.'/notaPDF')}}" role="button"><i class="fa fa-print" aria-hidden="true"></i></a>
                            </div>
                            <div class="col">
                                <a href="{{ url('/Nota/'.$nota->id.'/edit')}}" class="btn btn-warning" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>
                            <div class="col">
                                <form class="" action="{{ url('/Nota/'.$nota->id )}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                        <button class="btn btn-danger" type="submit" name="" onclick="return confirm('Quieres eliminar este registro?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-body">
                <h3  class="card-title">{{$nota->title}}</h3>
                <img src="{{ asset('storage').'/'.$nota->image }}" alt="" class="img-fluid">
                <p  class="card-text">{{$nota->content}}</p>
            </div>
            <div class="card-footer text-muted">
                Nota
            </div>
        </div>
    </div>
@endforeach
@include('crud.modal')
@endsection
