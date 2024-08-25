
<?php
    include('../conexion.php');
    $id = $_GET['id'];
    $sql = "SELECT id, nombres, apellidos, telefono, email, dir_consultorio, fecha_nacimiento, especialidad_id, subespecialidad_id, Zona FROM medico WHERE id = $id";
    //echo $sql;
    try {
        $resultado = $con->query($sql);
    } catch (Exception $e) {
        die("Error al realizar la consulta " . $e->getMessage());
    }
    $datos = $resultado->fetch_assoc();
    ?>
    <div class="container mt-4">
        <form action="javascript:editarMedic()" class="bg-light p-4 rounded shadow-sm" method="post" id="formEditMedic" class="formulario-estilo1">
            <legend class="mb-4 text-center text-primary">Editar Medico</legend>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden" name="idMedic" value="<?php echo $datos['id']?>">
                <label for="nombres">Nombre </label>
                <input class="form-control" type="text" name="nombres" value="<?php echo $datos['nombres']?>">
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="apellidos">Apellido </label>
                <input class="form-control" type="text" name="apellidos" value="<?php echo $datos['apellidos']?>">
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="telefono">Telefono </label>
                <input class="form-control" type="number" name="telefono" value="<?php echo $datos['telefono']?>">
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="dir_consultorio">Direccion </label>
                <input class="form-control" type="text" name="dir_consultorio" value="<?php echo $datos['dir_consultorio']?>">
            </div>            
            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="zona">Zona </label>
                <input class="form-control" type="text" name="zona" value="<?php echo $datos['Zona']?>">
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="email">Correo </label>
                <input class="form-control" type="text" name="email" value="<?php echo $datos['email']?>">
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" type="hidden">
                <label for="fecha_nacimiento">Fecha Nacimiento </label>
                <input class="form-control" type="date" name="fecha_nacimiento" value="<?php echo $datos['fecha_nacimiento']?>">
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
