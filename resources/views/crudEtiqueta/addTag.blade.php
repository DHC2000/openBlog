
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                @foreach($nota as $nota)
                    <h5>{{$nota->title}}</h5>
                        <input type="number" hidden value="{{$nota->id}}" name="nota_id"> 
                @endforeach
            </div>
            <div class="mb-3">
                <select id="carga_tag" class="for-group col-4" name="etiqueta_id">
                    <option selected>Etiquetas</option>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->etiqueta}}<i class="fas fa-trash" aria-hidden="true"></i></option>
                        @endforeach
                </select>
                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Nueva Etiqueta</button>
            </div>
               <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

        </div>
    </div>
</div>
@include('crudEtiqueta.tagModal')