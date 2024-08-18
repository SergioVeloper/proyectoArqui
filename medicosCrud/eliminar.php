<?php

include('../conexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM medico WHERE id = $id";

try {
    $resultado = $con->query($sql);
} catch (Exception $e) {
    die("Error al realizar el query, ".$e->getMessage());
}
?>

