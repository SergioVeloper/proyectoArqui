<?php
include '../conexion.php';

session_start();

// Verificar si la variable de sesión está establecida
if (isset($_SESSION['usuario_id'])) {
    // Recuperar el ID del usuario
    $usuario_id = $_SESSION['usuario_id'];
} else {
    // Si la variable no está establecida, manejar el error
    die("No se ha encontrado el ID del usuario en la sesión.");
}

// Obtener la especialidad del visitador
$sqlVisitador = "SELECT especialidad_id FROM visitador WHERE id_visitador = ?";
$stmtVisitador = $con->prepare($sqlVisitador);
$stmtVisitador->bind_param("i", $usuario_id);
$stmtVisitador->execute();
$resultadoVisitador = $stmtVisitador->get_result();
$rowVisitador = $resultadoVisitador->fetch_assoc();

if ($rowVisitador) {
    $especialidad_id = $rowVisitador["especialidad_id"];
} else {
    die("No se encontró la especialidad para el ID de visitador proporcionado.");
}
?>

<div class="listaMedicos table-responsive">

<div>
    <form action="javascript:buscarLM()" method="get">
        <label for="filtro">Buscar: </label>
        <input type="text" name="filtro" id="filtro" placeholder="Escriba una palabra clave">
        <input type="submit" value="Buscar">
    </form>
    <div id="Oespecialidades">
        <label for="bton"> Buscar por: </label>
        <select name="ordPorVisita" id="busquedaOV">
            <option value="m.nombres">Nombre del Dr</option>
            <option value="m.Zona">Zona del consultorio</option>
            <option value="m.dir_consultorio">Dirección Consultorio</option>
            <option value="s.nombre">Subespecialidad</option>
        </select>
    </div> 
</div>

<?php
if (isset($_GET['ordenar'])) {
    $ordenar = $_GET['ordenar'];
} else {
    $ordenar = "m.id";
}

if (isset($_GET['filtro']) && isset($_GET["ordPorVisita"])) {
    $filtro = $_GET['filtro'];
    $opcionL = $_GET['ordPorVisita'];
    $sql = "SELECT
        m.id as id, 
        m.nombres, 
        m.apellidos, 
        m.telefono as telefono,
        s.nombre AS subespecialidad, 
        m.dir_consultorio AS direccion,
        m.Zona as Zona
    FROM 
        medico m
    LEFT JOIN 
        subespecialidad s ON m.subespecialidad_id = s.id
    WHERE 
        m.especialidad_id = ? AND $opcionL LIKE ?
    ORDER BY $ordenar ASC";
    $stmt = $con->prepare($sql);
    $likeFiltro = "%$filtro%";
    $stmt->bind_param("is", $especialidad_id, $likeFiltro);
} else {
    $sql = "SELECT 
        m.id as id,
        m.nombres, 
        m.apellidos, 
        m.telefono as telefono,
        s.nombre AS subespecialidad, 
        m.dir_consultorio AS direccion,
        m.Zona as Zona
    FROM 
        medico m
    LEFT JOIN 
        subespecialidad s ON m.subespecialidad_id = s.id
    WHERE 
        m.especialidad_id = ?
    ORDER BY $ordenar ASC";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $especialidad_id);
}

?>

<div class="contenedor_lista content-fluid text-center">
    <?php
    try {
        $stmt->execute();
        $resultado = $stmt->get_result();
    } catch (Exception $e) {
        die("Error al realizar la consulta, " . $e->getMessage());
    }

    if ($resultado->num_rows > 0) {
        echo "<h2>Visitas</h2>";
        echo "<table class='table table-hover'>";
        echo "<tr>";
        echo "<th class='cabezera-table' scope='col'><a href='javascript:ordenarVM(`nombres`)'>Nombres</a></th>";
        echo "<th class='cabezera-table' scope='col'><a href='javascript:ordenarVM(`apellidos`)'>Apellidos</a></th>";
        echo "<th class='cabezera-table' scope='col'><a href='javascript:ordenarVM(`direccion`)'>Dirección Consultorio</a></th>";
        echo "<th class='cabezera-table' scope='col'><a href='javascript:ordenarVM(`Zona`)'>Zona</a></th>";
        echo "<th class='cabezera-table' scope='col'><a href='javascript:ordenarVM(`telefono`)'>Teléfono</a></th>";
        echo "<th class='cabezera-table' scope='col'><a href='javascript:ordenarVM(`subespecialidad`)'>Subespecialidad</a></th>";
        echo "<th class='cabezera-table' scope='col'>Acciones</th>";
        echo "</tr>";

        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nombres"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["apellidos"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["direccion"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Zona"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["telefono"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["subespecialidad"]) . "</td>";
            echo "<td> <button class='btn btn-primary btn-sm' onclick='mostrarDatosVisita(" . $row["id"] . ")'> Registrar Visita </button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados.";
    }
    ?>
</div>

</div>