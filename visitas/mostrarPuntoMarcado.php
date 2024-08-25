<?php
include('../conexion.php');
$sql_verificar = "SELECT * FROM entradaSalida WHERE id_visitador = $id_visitador AND fecha = '$fecha_actual'";
$resultado = $con->query($sql_verificar);
if ($resultado->num_rows == 0) {

    $hora_entrada = date('H:i:s'); // Hora actual en formato HH:MM:SS
    $sql_insertar = "INSERT INTO entradaSalida (id_visitador, fecha) VALUES ($id_visitador, '$fecha_actual')";

    try {
        $con->query($sql_insertar);
        $es_id = $con->insert_id;
    } catch (Exception $e) {
        die("Error al insertar el registro de entrada: " . $e->getMessage());
    }
    $sql2 = "INSERT INTO Turno(id_entradaSalida, hora, direccionMedico, foto, estado) VALUES
    ($es_id , $hora, $direccionMedico, $nuevonombre, 'Marcado')";
    try {
        $result = $con->query($sql2);
    } catch (Exception $e) {
        die("Error al realizar al query, " . $e->getMessage());
    }
} else {
    $sql2 = "INSERT INTO Turno(id_entradaSalida, hora, direccionMedico, foto, estado) VALUES
    ($es_id , $hora, $direccionMedico, $fotoConsultorio, 'Marcado')";
}
