<?php include('../conexion.php'); ?>
<div class="container mt-4">
    <form action="javascript:insertarMM()" id="formInsertarMuestrasM" class="bg-light p-4 rounded shadow-sm">
        <legend class="mb-4 text-center text-primary">Registrar Muestra Médica</legend>
        
        <div class="form-floating mb-3">
            <input type="text" name="nombreMuestra" class="form-control" placeholder="Nombre" id="nombreMuestra">
            <label for="nombreMuestra">Nombre</label>
        </div>
        
        <div class="mb-3">
            <div class="form-floating mb-3">
                <select name="especialidadMuestra" class="form-select" id="seleccionarEsp" onchange="mostrarSubEspecialidad()"></select>
                <label for="seleccionarEsp">Especialidad</label>
            </div>
            <div class="form-floating mb-3">
                <select name="subEspecialidadMuestra" id="seleccionarSubesp" class="form-select"></select>
                <label for="seleccionarSubesp">Subespecialidad</label>
            </div>
        </div>
        
        <div class="form-floating mb-3">
            <input type="number" name="cantidadMuestras" class="form-control" placeholder="Cantidad" id="cantidadMuestras">
            <label for="cantidadMuestras">Cantidad de muestras</label>
        </div>
        
        <div class="d-grid gap-2">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
</div>
