<script src="muestrascrud/scriptMuestrasMedicas.js"></script>
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
<h2 style="color:#D32F2F">Muestras Medicas</h2>
<?php
include '../conexion.php';
if (isset($_GET['ordenar'])) {
    $ordenar = $_GET['ordenar'];
} else {
    $ordenar = "id";
}
if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];
    $sql = "SELECT m.id as id, m.nombre as nombre, m.cantidadMuestras as cantM, e.nombre as espNom, s.nombre  as subEsp FROM muestrasMedicas m left join 
        especialidad e on m.especialidad_id = e.id LEFT JOIN subespecialidad s ON m.subespecialidad_id = s.id
         where m.nombre like '%$filtro%' ORDER BY $ordenar asc";
} else {
    $sql = "SELECT m.id as id, m.nombre as nombre , m.cantidadMuestras as cantM, e.nombre as espNom, s.nombre  as subEsp FROM muestrasMedicas m left join 
        especialidad e on m.especialidad_id = e.id LEFT JOIN subespecialidad s ON m.subespecialidad_id = s.id ORDER BY $ordenar asc";
}


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
                    <th class="cabezera-table" scope="col">Especialidad</th>
                    <th class="cabezera-table" scope="col">Subespecialidad</th>
                    <th class="cabezera-table" scope="col">Cantidad</th>
                    <th class="cabezera-table" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($datos = $resultado->fetch_assoc()) {
                ?>
                <tr>
                    <td scope="row"><?php echo $i++ ?></td>
                    <td><?php echo $datos['nombre'] ?></td>
                    <td><?php echo $datos['espNom'] ?></td>
                    <td> <?php echo $datos['subEsp'] ?></td>
                    <td><?php echo $datos['cantM'] ?></td>
                    <td><a href="javascript:editarMM('<?php echo $datos["id"] ?>')"><i class="bi bi-pencil-square editar"></i></a>
                        <a href="javascript:eliminarMM('<?php echo $datos["id"] ?>')"><i class="bi bi-trash eliminar"></i></a>
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