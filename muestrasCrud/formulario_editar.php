
<?php
    include('../conexion.php');
    $id = $_GET['id'];
    $sql = "SELECT id, nombre, cantidadMuestras, especialidad_id, subespecialidad_id FROM muestrasMedicas WHERE id = $id";
    try {
        $resultado = $con->query($sql);
    } catch (Exception $e) {
        die("Error al realizar la consulta " . $e->getMessage());
    }
    $datos = $resultado->fetch_assoc();
    ?>
    <div class="container mt-4">
        <form action="javascript:editarRMM()" class="bg-light p-4 rounded shadow-sm" method="post" id="formEditMM" class="formulario-estilo1">
            <legend class="mb-4 text-center text-primary">Editar Muestra Médica</legend>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden" name="idRes" value="<?php echo $datos['id']?>">
                <label for="Nombre">Nombre </label>
                <input class="form-control" type="text" name="nombre" value="<?php echo $datos['nombre']?>">
            </div>
            
            <div class="mb-3">
                <div class="form-floating mb-3">
                    <select class="form-select" name="especialidadMuestra" id="seleccionarEsp" onchange="mostrarSubEspecialidad()">
                    </select>
                    <label for="especialidadMuestra">Especialidad</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="subEspecialidadMuestra" id="seleccionarSubesp">
                    </select>
                    <label for="subEspecialidadMuestra">SubEspecialidad</label>
                </div>
            </div>
            
            <div class="form-floating mb-3">
                <input class="form-control" type="number" name="cantidadMuestras" value="<?php echo $datos['cantidadMuestras']?>">
                <label for="cantidadMuestras">Cantidad de muestras</label>
            </div>
            
            <div class="d-grid gap-2">
                <input type="submit" value="Editar" class="btn btn-primary">
            </div>
        </form>
    </div>
