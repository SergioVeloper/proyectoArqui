
<?php
    include('../conexion.php');
    $id = $_GET['id'];
    $sql = "SELECT id_visitador, nombre, apellido, telefono, correo, especialidad_id, subespecialidad_id FROM visitador WHERE id_visitador = $id";
    //echo $sql;
    try {
        $resultado = $con->query($sql);
    } catch (Exception $e) {
        die("Error al realizar la consulta " . $e->getMessage());
    }
    $datos = $resultado->fetch_assoc();
    ?>
    <div class="container mt-4">
        <form action="javascript:editarV()" class="bg-light p-4 rounded shadow-sm" method="post" id="formEditVisit" class="formulario-estilo1">
            <legend class="mb-4 text-center text-primary">Editar Visitador</legend>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden" name="idVisit" value="<?php echo $datos['id_visitador']?>">
                <label for="nombre">Nombre </label>
                <input class="form-control" type="text" name="nombre" value="<?php echo $datos['nombre']?>">
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="apellido">Apellido </label>
                <input class="form-control" type="text" name="apellido" value="<?php echo $datos['apellido']?>">
            </div>

            <div class="form-floating mb-3">
            <input class="form-control" type="hidden">
                <label for="telefono">Telefono </label>
                <input class="form-control" type="number" name="telefono" value="<?php echo $datos['telefono']?>">
            </div>

            <div class="form-floating mb-3">
            <input class="form-control" type="hidden">
                <label for="correo">Correo </label>
                <input class="form-control" type="text" name="correo" value="<?php echo $datos['correo']?>">
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
                        
            <div class="d-grid gap-2">
                <input type="submit" value="Editar" class="btn btn-primary">
            </div>
        </form>
    </div>
