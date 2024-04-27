<form class="row col-12 container-fluid" method="POST" enctype='multipart/form-data'>
    <div class="card mb-3 col-12 col-md-4">
    <div class="row g-0">
        <div class="col-md-4">
        <input type='file' name='imagen' style="display: none;">
        <label for="imagen">
            <i class="fa-solid fa-upload" style="color: #831959;"></i>
        </label>
        </div>
    </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="mb-3">
            <label for="id_tratamiento" class="form-label" name="id">Id Articulo</label>
            <input type="text" class="form-control" id="id_tratamiento" aria-describedby="id_articulo" disabled>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label" name="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre">
        </div>
        <div class="mb-3 form_floating">
            <div class="form-floating">
            <textarea class="form-control" name="descripcion"  id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Descripcion</label>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" id="precio">
            </div>
            <div class="form-floating">
                <select class="form-select" id="zona_corporal" aria-label="Floating label select example">
                    <option selected>Elige una de las opciones</option>
                    <option value="1">Facial</option>
                    <option value="2">Corporal</option>
                    <option value="3">Piernas</option>
                </select>
                <label for="zona_corporal">Zona corporal</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Subir articulo</button>
    </div>
</form>