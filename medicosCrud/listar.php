<script src="medicosCrud/scriptMedicos.js"></script>
<!--<div class="contenedor-caja">
    <form action="javascript:buscarMM()" method="get">
        <label for="filtro">Buscar: </label>
        <input type="text" name="filtro" id="filtro">
        <input type="submit" value="Buscar" class="cursor-manito">
    </form>
     <div id="Oespecialidades">
        <label for="bton">Gestionar por especialidades </label>
        <button onClick="gestEsp()" class="cursor-manito">Gestionar</button>
    </div> 
    <div>
    <label for="bton">Insertar nueva muestra </label>
    <button class="boton" onclick="insertarMMe()" class="cursor-manito">Insertar</button>
    </div>
</div>-->
<h2 style="color:#D32F2F">Medicos</h2>
<?php
include '../conexion.php';
if (isset($_GET['ordenar'])) {
    $ordenar = $_GET['ordenar'];
} else {
    $ordenar = "id";
}
if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];
    $sql = "SELECT m.id as id, m.nombres as nombres, m.apellidos as apellidos, m.dir_consultorio as dir_consultorio, m.Zona as zona, m.telefono as telefono, m.email as email, m.fecha_nacimiento as fecha_nacimiento, e.nombre as espNom, s.nombre  as subEsp FROM medico m left join 
        especialidad e on m.especialidad_id = e.id LEFT JOIN subespecialidad s ON m.subespecialidad_id = s.id
         where m.nombres like '%$filtro%' ORDER BY $ordenar asc";
} else {
    $sql = "SELECT m.id as id, m.nombres as nombres , m.apellidos as apellidos, m.dir_consultorio as dir_consultorio, m.Zona as zona, m.telefono as telefono, m.email as email, m.fecha_nacimiento as fecha_nacimiento, e.nombre as espNom, s.nombre  as subEsp FROM medico m left join 
        especialidad e on m.especialidad_id = e.id LEFT JOIN subespecialidad s ON m.subespecialidad_id = s.id ORDER BY $ordenar asc";
}
//echo $sql;

try {
    $resultado = $con->query($sql);
} catch (Exception $e) {
    die("Error al realizar la consulta, " . $e->getMessage());
}
$i = 1;

if ($resultado->num_rows > 0) {
    ?>
    <div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="cabezera-table" scope="col">Nro</th>
                    <th class="cabezera-table" scope="col">Nombre</th>
                    <th class="cabezera-table" scope="col">Apellido</th>
                    <th class="cabezera-table" scope="col">Telefono</th>
                    <th class="cabezera-table" scope="col">Direccion</th>
                    <th class="cabezera-table" scope="col">Zona</th>
                    <th class="cabezera-table" scope="col">Correo</th>
                    <th class="cabezera-table" scope="col">Fecha Nacimiento</th>
                    <th class="cabezera-table" scope="col">Especialidad</th>
                    <th class="cabezera-table" scope="col">Subespecialidad</th>
                    <th class="cabezera-table" scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($datos = $resultado->fetch_assoc()) {
                ?>
                <tr>
                    <td scope="row"><?php echo $i++ ?></td>
                    <td><?php echo $datos['nombres'] ?></td>
                    <td><?php echo $datos['apellidos'] ?></td>
                    <td><?php echo $datos['telefono'] ?></td>
                    <td><?php echo $datos['dir_consultorio'] ?></td>
                    <td><?php echo $datos['zona'] ?></td>
                    <td><?php echo $datos['email'] ?></td>
                    <td><?php echo $datos['fecha_nacimiento'] ?></td>
                    <td><?php echo $datos['espNom'] ?></td>
                    <td> <?php echo $datos['subEsp'] ?></td>
                    <td><a href="javascript:editarMedico('<?php echo $datos["id"] ?>')"><i class="bi bi-pencil-square editar"></i></a>
                        <a href="javascript:eliminarMedico('<?php echo $datos["id"] ?>')"><i class="bi bi-trash eliminar"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "0 resultados";
}

mysqli_close($con);
?>