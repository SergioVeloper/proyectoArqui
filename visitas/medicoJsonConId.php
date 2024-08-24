<?php
include('../../conexion.php');
$id = $_GET['idMedico'];

$sql = "SELECT nombres, apellidos, especialidad, subespecialidad, dir_consultorio as direccion FROM medico WHERE id = $id";

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
}
echo json_encode($datos, JSON_UNESCAPED_UNICODE);