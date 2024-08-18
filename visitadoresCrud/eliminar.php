<?php

include('../conexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM visitador WHERE id_visitador = $id";

try {
    $resultado = $con->query($sql);
} catch (Exception $e) {
    die("Error al realizar el query, ".$e->getMessage());
}
?>

