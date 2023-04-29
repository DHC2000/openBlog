<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Registro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/Nota')}}" method="POST" enctype="multipart/form-data">
             @csrf
            <div class="card">
                <div class="card-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Titulo</label>
                            <input type="text" name="title" id="" class="form-control" placeholder="Titulo" aria-describedby="helpId">
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="content" class="form-label">Nota</label>
                            <textarea class="form-control" id="" name="content" rows="3"></textarea>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" class="form-control-file" name="image" id="" placeholder="Subir imagen" aria-describedby="fileHelpId">
                        </div>
                        <br>
                        <div class="mb-3">
                            <select id="carga_tag" class="for-group col-4" name="etiqueta_id">
                                <option selected>Etiquetas</option>
                                    @foreach($et as $tag)
                                        <option value="{{$tag->id}}">{{$tag->etiqueta}} </option>
                                    @endforeach
                              </select>
                        </div>
                     
                         <br>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
          </form>
        </div>
  
      </div>
    </div>
  </div>
  