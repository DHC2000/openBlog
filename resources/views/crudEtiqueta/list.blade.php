<div class="container">
    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
</div>
<div class="container">
   <table class="table table-striped table-inverse table-responsive mt-3">
            <thead class="thead-inverse">
                <tr>
                    <th>Etiquetas</th>
                    <th>Acciones</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td scope="row">{{$tag->etiqueta}}</td>
                    <td><a class="btn btn-primary" href="{{url('/Tags/'.$tag->id.'/Notas_Etiquetas')}}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    <td>
                        <a href="{{ url('/Tags/'.$tag->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <td>
                        <form class="" action="{{ url('/Tags/'.$tag->id )}}" method="POST">
                            @csrf
                            {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit" name="" onclick="return confirm('Quieres eliminar este registro?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                </tr>
                @endforeach
            </tbody>
    </table>
</div>
@include('crudEtiqueta.tagModal')
