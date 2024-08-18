<script src="visitadoresCrud/scriptVisitadores.js"></script>
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
<h2 style="color:#D32F2F">Visitadores</h2>
<?php
include '../conexion.php';
if (isset($_GET['ordenar'])) {
    $ordenar = $_GET['ordenar'];
} else {
    $ordenar = "id_visitador";
}
if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];
    $sql = "SELECT v.id_visitador as id_visitador, v.nombre as nombre, v.apellido as apellido, v.telefono as telefono, v.correo as correo, e.nombre as espNom, s.nombre  as subEsp FROM visitador v left join 
        especialidad e on v.especialidad_id = e.id LEFT JOIN subespecialidad s ON v.subespecialidad_id = s.id
         where v.nombre like '%$filtro%' ORDER BY $ordenar asc";
} else {
    $sql = "SELECT v.id_visitador as id_visitador, v.nombre as nombre , v.apellido as apellido, v.telefono as telefono, v.correo as correo, e.nombre as espNom, s.nombre  as subEsp FROM visitador v left join 
        especialidad e on v.especialidad_id = e.id LEFT JOIN subespecialidad s ON v.subespecialidad_id = s.id ORDER BY $ordenar asc";
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
                    <th class="cabezera-table" scope="col">Correo</th>
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
                    <td><?php echo $datos['nombre'] ?></td>
                    <td><?php echo $datos['apellido'] ?></td>
                    <td><?php echo $datos['telefono'] ?></td>
                    <td><?php echo $datos['correo'] ?></td>
                    <td><?php echo $datos['espNom'] ?></td>
                    <td> <?php echo $datos['subEsp'] ?></td>
                    <td><a href="javascript:editarVisitador('<?php echo $datos["id_visitador"] ?>')"><i class="bi bi-pencil-square editar"></i></a>
                        <a href="javascript:eliminarVisitador('<?php echo $datos["id_visitador"] ?>')"><i class="bi bi-trash eliminar"></i></a>
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