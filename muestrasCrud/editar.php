<?php

include('../conexion.php');

$id = $_POST['idRes'];
$nombre = $_POST['nombre'];
$especialidad_id = $_POST['especialidadMuestra'];
$subespecialidad_id = $_POST['subEspecialidadMuestra'];
$cantidadMuestras = $_POST['cantidadMuestras'];

$sql = "UPDATE muestrasMedicas SET
nombre = '$nombre', 
cantidadMuestras = $cantidadMuestras, 
especialidad_id = $especialidad_id, 
subespecialidad_id = $subespecialidad_id  
WHERE id = $id";

try{
    $result = $con->query($sql);
} catch (Exception $e) {
    die("Error al realizar la consulta " . $e->getMessage());
}

?>
