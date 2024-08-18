<?php

include('../conexion.php');

$id = $_POST['idVisit'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$especialidad_id = $_POST['especialidadMuestra'];
$subespecialidad_id = $_POST['subEspecialidadMuestra'];

$sql = "UPDATE visitador SET
nombre = '$nombre', 
apellido = '$apellido',
telefono = $telefono,
correo = '$correo', 
especialidad_id = $especialidad_id, 
subespecialidad_id = $subespecialidad_id  
WHERE id_visitador = $id";
echo $sql;
try{
    $result = $con->query($sql);
} catch (Exception $e) {
    die("Error al realizar la consulta " . $e->getMessage());
}

?>
