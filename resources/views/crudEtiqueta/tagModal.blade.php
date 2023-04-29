<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nueva Etiqueta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/Tags')}}" method="POST">
                @csrf
                <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Etiqueta</label>
                                <input type="text" name="etiqueta" id="" class="form-control" placeholder="Etiqueta" aria-describedby="helpId" value="{{ isset($etiquetas->etiqueta)?$etiquetas->etiqueta:'' }}">
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
  