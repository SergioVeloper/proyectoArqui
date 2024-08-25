<?php
include('../conexion.php');
$id = $_GET['idMedico'];

$sql = "SELECT 
    m.nombres, 
    m.apellidos, 
    e.nombre AS especialidad, 
    s.nombre AS subespecialidad, 
    m.dir_consultorio AS direccion 
FROM 
    medico m
LEFT JOIN 
    especialidad e ON m.especialidad_id = e.id
LEFT JOIN 
    subespecialidad s ON m.subespecialidad_id = s.id
WHERE 
    m.id = $id";

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