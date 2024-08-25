<?php
include('../conexion.php');
$es_id = $_GET['id_entradaSalida'];

$sql = "SELECT MAX(id) AS id FROM Turno WHERE id_entradaSalida = $es_id";


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