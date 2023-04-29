@extends('pdf.layout')
@section('title','PDF-Nota')
@section('listComponent')
<div class="container">
  <h1>Notas</h1>
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
                                  <label for="">{{$tag->etiqueta}}</label>
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
              </div> 
          </div>
          <div class="card-body">
              <h3  class="card-title">{{$nota->title}}</h3>
              <img src="{{ public_path() . 'storage'.'/'.$nota->image }}" alt="">
              <img src="{{ $pic }}" alt="">

              <p  class="card-text">{{$nota->content}}</p>
          </div>
          <div class="card-footer text-muted">
              Nota
          </div>
      </div>
  </div>
@endforeach

@endsection

