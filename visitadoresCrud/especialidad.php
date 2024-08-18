<?php
include('../conexion.php');
if(isset($_GET['especialidad_id'])){
    $id_e = $_GET['especialidad_id'];
    // $sql = "SELECT e.id as id, e.nombre as nombre FROM especialidad e  LEFT JOIN muestrasMedicas m ON m.especialidad_id = e.id WHERE m.id  = $id_e";
    $sql = "SELECT e.id as id, e.nombre as nombre 
    FROM especialidad e 
    LEFT JOIN muestrasMedicas m ON m.especialidad_id = e.id 
    GROUP BY e.id, e.nombre 
    ORDER BY (MAX(m.id = $id_e)) DESC, e.nombre ASC";

}
else{
    $sql = "SELECT DISTINCT id, nombre FROM especialidad";
}

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