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

?>

<div class="listaMedicos">

    <div class="contenedor_lista content-fluid text-center">
        <?php
        // Preparar y ejecutar la consulta para obtener el especialidad_id
        $sqlVisitador = "SELECT especialidad_id FROM visitador WHERE id_visitador = ?";
        $stmtVisitador = $con->prepare($sqlVisitador);
        $stmtVisitador->bind_param("i", $usuario_id); // "i" para entero
        $stmtVisitador->execute();
        $resultadoVisitador = $stmtVisitador->get_result();
        $rowVisitador = $resultadoVisitador->fetch_assoc();
        
        if ($rowVisitador) {
            $especialidad_id = $rowVisitador["especialidad_id"];

            // Preparar y ejecutar la consulta para obtener los médicos
            $sql = "SELECT id, nombres, apellidos, dir_consultorio, telefono FROM medico WHERE especialidad_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $especialidad_id); // "i" para entero
            $stmt->execute();
            $resultado = $stmt->get_result();

            echo "<h2>Visitas</h2>";
            echo "<table class='table table-hover'>";
            echo "<tr>";
            echo "<th class='cabezera-table' scope='col'>Nombres</th>";
            echo "<th class='cabezera-table' scope='col'>Apellidos</th>";
            echo "<th class='cabezera-table' scope='col'>Dirección Consultorio</th>";
            echo "<th class='cabezera-table' scope='col'>Teléfono</th>";
            echo "<th class='cabezera-table' scope='col'>Acciones</th>";
            echo "</tr>";

            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["nombres"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["apellidos"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["dir_consultorio"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["telefono"]) . "</td>";
                echo "<td> <button class='btn btn-primary btn-sm' onclick='mostrarDatosVisita(" . $row["id"] . ")'> Registrar Visita </button></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No se encontraron resultados para el ID de especialidad proporcionado.";
        }
        ?>
    </div>

</div>