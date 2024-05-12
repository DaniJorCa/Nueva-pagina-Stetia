<?php $id =  $id = get_max_value_of_field('articulos', 'id')['max_field']; ?>
<div class="header">
    <h1>Nuevo articulo</h1>
    <h2 class="text-center">Aqui puedes crear nuevos Articulos</h2>
</div>
<form class="row col-12 container-fluid mt-3 needs-validation" method="POST" action='home.php?type=_upload_articulo' enctype='multipart/form-data' novalidate>
    <div class="card mb-3 col-12 col-md-4">
    <div class="row g-0"style="overflow: hidden;">
        <div class="col-12 col-md-4">
        <input type='file' name='imagen' id='imagen' style="display: none; " onchange="showPreview()">
        <div class="valid-feedback">
                Imagen válida
            </div>
            <div class="invalid-feedback">
                Imagen necesaria.
            </div>
        <img id="preview" src="#"  style="max-width: 350px; height: 380px;">
        <label for="imagen" >
            <i class="fa-solid fa-upload" style="color: #831959;"></i>
        </label>
        </div>
    </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="mb-3">
            <label for="id_tratamiento" class="form-label" name="id">Id Articulo</label>
            <input type="text" value='<?php echo ($id + 1)?>' name='id' class="form-control" id="id_tratamiento" aria-describedby="id_articulo" disabled>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label" name="nombre">Nombre</label required>
            <input type="text" class="form-control" id="nombre" name='nombre'>
        </div>
        <div class="mb-3 form_floating">
            <div class="form-floating">
            <textarea class="form-control" name="descrip"  id="floatingTextarea" required></textarea>
            <label for="floatingTextarea">Descripcion</label>
            </div>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Precio</label>
                <input type="number" id="validationCustom01" class="form-control" step="0.01" placeholder="29.99" name="precio" id="precio" required>
                <div class="valid-feedback">
                    Precio válido
                </div>
                <div class="invalid-feedback">
                    Precio inválido. Formato enteros y 2 decimales.
                </div>
            </div>

            <div class="mb-3">
                <label for="iva" class="form-label" name="iva">IVA</label required>
                <input type="number" class="form-control" id="iva" name='iva'>
                <div class="valid-feedback">
                    Iva valido.
                </div>
                <div class="invalid-feedback">
                    Iva inválido. Formato 2 numeros enteros.
                </div>
            </div>

            <div class="mb-3">
                <label for="dto" class="form-label" name="dto">Descuento</label required>
                <input type="number" class="form-control" id="dto" name='dto'>
                <div class="valid-feedback">
                    Descuento válido
                </div>
                <div class="invalid-feedback">
                    Descuento inválido. Formato enteros y 2 decimales.
                </div>
            </div>
           
        </div>
        <div class="col-12 d-flex justify-content-center">
        <button class="w-70 btn btn-lg btn-cta m-0" type="submit" name="form_contact">Alta articulo</button>
    </div>
    </div>
</form>