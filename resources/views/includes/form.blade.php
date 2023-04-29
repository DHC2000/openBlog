
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" name="title" id="" class="form-control" placeholder="Titulo" aria-describedby="helpId" value="{{ isset($nota->title)?$nota->title:'' }}">
                </div>
                <br>
                <div class="mb-3">
                    <label for="content" class="form-label">Nota</label>
                    <textarea class="form-control" id="" name="content" rows="3" value="{{ isset($nota->content)?$nota->content:'' }}">{{ isset($nota->content)?$nota->content:'' }}</textarea>
                </div>
                <br>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control-file" name="image" id="" placeholder="Subir imagen" aria-describedby="fileHelpId" value="{{ isset($nota->image)?$nota->image:'' }}"> {{ isset($nota->image)?$nota->image:'' }}
                </div>
                <br>
                <div class="mb-3">
                    <select id="carga_tag" class="for-group col-4" name="etiqueta_id">
                        <option selected>Etiquetas</option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}" @if($tag->id == $et->id) selected  @endif >{{$tag->etiqueta}}</option>
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