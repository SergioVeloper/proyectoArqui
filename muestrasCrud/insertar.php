<?php
include('../conexion.php');

// Recoger datos del formulario
$nombre = $_POST['nombreMuestra'];
$especialidad_id = $_POST['especialidadMuestra'];
$subespecialidad_id = $_POST['subEspecialidadMuestra'];
$cantidadMuestras = $_POST['cantidadMuestras'];

// Preparar la consulta para evitar inyecciones SQL
$sql = "INSERT INTO muestrasMedicas (nombre, cantidadMuestras, especialidad_id, subespecialidad_id) 
        VALUES (?, ?, ?, ?)";

try {
    // Preparar la sentencia
    $stmt = $con->prepare($sql);

    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $con->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("siii", $nombre, $cantidadMuestras, $especialidad_id, $subespecialidad_id);

    // Ejecutar la consulta
    $stmt->execute();

    // Verificar si la ejecución fue exitosa
    if ($stmt->affected_rows > 0) {
        echo "success";  // Respuesta en caso de éxito
    } else {
        echo "error";    // Respuesta en caso de fallo
    }

    // Cerrar la sentencia
    $stmt->close();
} catch (Exception $e) {
    die("Error al realizar la query: " . $e->getMessage());
}
?>
