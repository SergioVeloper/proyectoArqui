<?php

include('../conexion.php');

$id = $_POST['idMedic'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$dir_consultorio = $_POST['dir_consultorio'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$especialidad_id = $_POST['especialidadMuestra'];
$subespecialidad_id = $_POST['subEspecialidadMuestra'];
$zona = $_POST['zona'];

$sql = "UPDATE medico SET
nombres = '$nombres', 
apellidos = '$apellidos',
telefono = $telefono,
email = '$email', 
dir_consultorio = '$dir_consultorio',
fecha_nacimiento = '$fecha_nacimiento', 
especialidad_id = $especialidad_id, 
subespecialidad_id = $subespecialidad_id,
Zona = '$zona'
WHERE id = $id";
echo $sql;
try{
    $result = $con->query($sql);
} catch (Exception $e) {
    die("Error al realizar la consulta " . $e->getMessage());
}

?>
