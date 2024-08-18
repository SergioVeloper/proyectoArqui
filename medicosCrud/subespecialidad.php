<?php
include('../conexion.php');

$id = $_GET['id'];
if(isset($_GET['idMM'])){
    $id_m = $_GET['idMM'];
    $sql = "SELECT s.id as id, s.nombre as nombre FROM subespecialidad s LEFT JOIN muestrasMedicas m ON m.subespecialidad_id = s.id WHERE m.id = $id_m";

}
else{
    $sql = "SELECT id, nombre FROM subespecialidad WHERE id_especialidad = $id";
}



try {
    $resultado = $con->query($sql);
} catch (Exception $e) {
    die("error al realizar la consulta, ".$e->getMessage());
}

$datos = array();
if($resultado->num_rows > 0){
    while($row = $resultado->fetch_assoc()){
        $datos[] = $row;
    }
}

echo json_encode($datos, JSON_UNESCAPED_UNICODE);