<div class="container">
    <h1>Notas</h1>
    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
</div>
@foreach ($notas as $nota)
<div class="container mt-3">
    <div class="card">
        <div class="row">
            <div class="col-sm-5">
                 @foreach ($ets_nts as $ets)
                    @if($ets->nota_id == $nota->id)
                        @foreach($et as $tag)  
                             @if($ets->etiqueta_id == $tag->id)
                                <label class="row" for="">{{$tag->etiqueta}}
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
                             @endif
                        @endforeach
                    @endif
                @endforeach    
            </div>
            <div class="col-sm-5">
            </div>
            <div class="col-2">
                <div class="row">
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
        
        <div class="card-body">
            <h1  class="card-title">{{$nota->title}}</h1>
            <img src="{{ asset('storage').'/'.$nota->image }}" alt="">
            <p  class="card-text">{{$nota->content}}</p>
        </div>
    </div>
</div>
@endforeach
@include('crudEtiqueta.tagModal')