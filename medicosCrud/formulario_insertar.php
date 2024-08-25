<?php include('../conexion.php'); ?>
<div class="container mt-4">
    <form action="javascript:insertarMedico()" id="formInsertarMedico" class="bg-light p-4 rounded shadow-sm">
        <legend class="mb-4 text-center text-primary">Registrar Medico</legend>
        
        <div class="form-floating mb-3">
            <input type="text" name="nombreMedico" class="form-control" placeholder="Nombre" id="nombreMedico">
            <label for="nombreMedico">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="apellidoMedico" class="form-control" placeholder="Apellido" id="apellidoMedico">
            <label for="apellidoMedico">Apellido</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" name="telefonoMedico" class="form-control" placeholder="Telefono" id="telefonoMedico">
            <label for="telefonoMedico">Telefono</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="direccionMedico" class="form-control" placeholder="Correo" id="direccionMedico">
            <label for="direccionMedico">Direccion</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="zona" class="form-control" placeholder="Zona del consultorio" id="zona">
            <label for="zona">Zona</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" name="emailMedico" class="form-control" placeholder="Correo" id="emailMedico">
            <label for="emailMedico">Correo</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" name="fechaCumpleMedico" class="form-control" placeholder="Correo" id="fechaCumpleMedico">
            <label for="fechaCumpleMedico">Fecha Nacimiento</label>
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
