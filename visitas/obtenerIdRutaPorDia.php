<?php
include('../conexion.php');

//$id_visitador = $_SESSION['id_visitador'];
$id_visitador = 2;
$fecha_actual = date('Y-m-d'); // Fecha actual en formato YYYY-MM-DD

$sql = "SELECT id FROM entradaSalida WHERE id_visitador = $id_visitador AND fecha = '$fecha_actual'";

try {
    $resultado = $con->query($sql);
} catch (Exception $e) {
    die("error al realizar la consulta, ".$e->getMessage());
}

$datos = array();
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $datos[] = $row;
    }
    echo json_encode($datos, JSON_UNESCAPED_UNICODE);
}
else{
    echo 0;
}
