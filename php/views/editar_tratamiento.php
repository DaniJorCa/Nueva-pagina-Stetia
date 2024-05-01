<?php $id =  $id = get_max_value_of_field('tratamientos', 'id')['max_field']; ?>
<div class="header">
    <h1>Editar tratamiento</h1>
    <h2 class="text-center">Aqui puedes editar tu tratamiento</h2>
</div>
<?php
$tratamiento_a_editar = Tratamiento::get_object_treatment_by_value($con, 'id', $_GET['id']);
$_SESSION['id_treatment_to_modify'] = $_GET['id'];
$_SESSION['img_treatment_to_modify'] = $tratamiento_a_editar->getImg();
?>

<form class="row col-12 container-fluid mt-3 needs-validation" method="POST" action='home.php?type=_update_treatment' enctype='multipart/form-data' novalidate>
    <div class="card mb-3 col-12 col-md-4">
        <div class="row g-0" style="overflow: hidden;">
            <div class="col-12 col-md-4">
                <!-- Mostrar la imagen actual si existe -->
                <?php if (!empty($tratamiento_a_editar->getImg())): ?>
                    <img src="<?php echo $tratamiento_a_editar->getImg(); ?>" alt="Imagen actual" id="current-image" style="max-width: 350px; height: 380px;">
                <?php else: ?>
                    <img src="#" alt="Vista previa" id="current-image" style="max-width: 350px; height: 380px;">
                <?php endif; ?>
                <!-- Input de tipo file para cargar una nueva imagen -->
                <input type="file" name="imagen" id="imagen" style="display: none;" onchange="showPreview_edit_image()">
                <label for="imagen">
                    <i class="fa-solid fa-upload" style="color: #831959;"></i>
                </label>
            </div>
        </div>
    </div>


    <div class="col-12 col-md-7">
        <div class="mb-3">
            <label for="id_tratamiento" class="form-label" name="id">Id Articulo</label>
            <input type="text" value='<?php echo $tratamiento_a_editar->getId()?>' name='id' class="form-control" id="id_tratamiento" aria-describedby="id_articulo" disabled>
        </div>
        <div class="mb-3">
            <label for="nombre"  class="form-label" name="nombre">Nombre</label required>
            <input type="text" value="<?php echo $tratamiento_a_editar->getNombre() ?>" class="form-control" id="nombre" name='nombre'>
        </div>
        <div class="mb-3 form_floating">
            <div class="form-floating">
            <textarea class="form-control" name="descrip"  id="floatingTextarea" required><?php echo $tratamiento_a_editar->getDescrip() ?></textarea>
            <label for="floatingTextarea">Descripcion</label>
            </div>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Precio</label>
                <input type="number" id="validationCustom01" value="<?php echo $tratamiento_a_editar->getPrecio() ?>"class="form-control" step="0.01" placeholder="29.99" name="precio" id="precio" required>
                <div class="valid-feedback">
                    Precio válido
                </div>
                <div class="invalid-feedback">
                    Precio inválido. Formato enteros y 2 decimales.
                </div>
            </div>
            <div class="form-floating mb-3" >
                <select class="form-select" id="zona_corporal" aria-label="Floating label select example" name='zona_corp' required>
                    <option value="<?php echo $tratamiento_a_editar->getZonaCorp() ?>" selected><?php echo $tratamiento_a_editar->getZonaCorp() ?></option>
                    <option value="Facial">Facial</option>
                    <option value="Corporal">Corporal</option>
                    <option value="Piernas">Piernas</option>
                </select>
                <label for="zona_corporal">Zona corporal</label>
            </div>

            <div class="form-floating">
    <select class="form-select" id="baja" aria-label="Floating label select example" name='baja' required>
        <option value="0" <?php if ($tratamiento_a_editar->getBaja() == 0) echo "selected"; ?>>Dar de alta</option>
        <option value="1" <?php if ($tratamiento_a_editar->getBaja() == 1) echo "selected"; ?>>Dar de baja</option>
    </select>
    <label for="baja">¿Articulo de baja?</label>
</div>

        </div>
        <div class="col-12 d-flex justify-content-center">
        <button class="w-70 btn btn-lg btn-cta m-0" type="submit" name="form_contact">Editar tratamiento</button>
    </div>
    </div>
</form>