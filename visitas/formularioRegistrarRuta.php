<div class="container mt-5">
    <form action="javascript:insertarRuta()" method="post" enctype="multipart/form-data" id="formularioRegistrarRuta" class="row g-3">
        
        <div class="mb-3 col-12">
            <label for="seleccionarDirMedico" class="form-label">Seleccionar Médico:</label>
            <select name="medicoDir" id="seleccionarDirMedico" class="form-select" onchange="actualizarInptDireccion();">
            </select>
        </div>

        <div class="mb-3 col-12">
            <label for="inptDireccionMedico" class="form-label">Dirección del Médico:</label>
            <input type="text" name="dirccionMedico" id="inptDireccionMedico" class="form-control" readonly>
        </div>

        <div class="mb-3 col-12">
            <label for="fotografia" class="form-label">Foto del Consultorio:</label>
            <input type="file" name="fotoConsA" class="form-control">
        </div>

        <div class="mb-3 col-12">
            <label for="horaRuteroVis" class="form-label">Hora Registrada:</label>
            <input type="text" name="horaA" id="horaRuteroVis" class="form-control" readonly>
        </div>

        <div class="d-grid gap-2 text-center">
            <input type="submit" value="Guardar" class="btn btn-primary">
        </div>
    </form>
</div>  
