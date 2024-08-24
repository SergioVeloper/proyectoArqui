<?php
include('../../conexion.php');
$id = $_GET['idMedico'];

$sql = 'SELECT m.id as id, m.nombre as nombreMuestra from muestrasMedicas m
        INNER JOIN subespecialidad s ON m.subespecialidad_id = s.id INNER JOIN medico me ON s.nombre = me.subespecialidad
        WHERE me.id = '.$id;
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