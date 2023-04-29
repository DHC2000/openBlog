
<div class="container mt-3">
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
        </div>
    </div>
</div>
