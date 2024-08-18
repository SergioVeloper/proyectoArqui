<?php include('../conexion.php'); ?>
<div class="container mt-4">
    <form action="javascript:insertarVisitador()" id="formInsertarVisitadores" class="bg-light p-4 rounded shadow-sm">
        <legend class="mb-4 text-center text-primary">Registrar Visitador</legend>
        
        <div class="form-floating mb-3">
            <input type="text" name="nombreVisitador" class="form-control" placeholder="Nombre" id="nombreVisitador">
            <label for="nombreVisitador">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="apellidoVisitador" class="form-control" placeholder="Apellido" id="apellidoVisitador">
            <label for="apellidoVisitador">Apellido</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" name="telefonoVisitador" class="form-control" placeholder="Telefono" id="telefonoVisitador">
            <label for="telefonoVisitador">Telefono</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="correoVisitador" class="form-control" placeholder="Correo" id="correoVisitador">
            <label for="correoVisitador">Correo</label>
        </div>
        
        <div class="mb-3">
            <div class="form-floating mb-3">
                <select name="especialidadVisitador" class="form-select" id="seleccionarEsp" onchange="mostrarSubEspecialidad()"></select>
                <label for="seleccionarEsp">Especialidad</label>
            </div>
            <div class="form-floating mb-3">
                <select name="subespecialidadVisitador" id="seleccionarSubesp" class="form-select"></select>
                <label for="seleccionarSubesp">Subespecialidad</label>
            </div>
        </div>
                
        <div class="d-grid gap-2">
            <input type="submit" value="Enviar" class="btn btn-primary">
        </div>
    </form>
</div>
