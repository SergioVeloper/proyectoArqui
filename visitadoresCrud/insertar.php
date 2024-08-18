<?php
include('../conexion.php');

// Recoger datos del formulario
$nombre = $_POST['nombreVisitador'] ?? '';
$apellido = $_POST['apellidoVisitador'] ?? '';
$telefono = $_POST['telefonoVisitador'] ?? '';
$correo = $_POST['correoVisitador'] ?? '';
$especialidad_id = $_POST['especialidadVisitador'] ?? '';
$subespecialidad_id = $_POST['subespecialidadVisitador'] ?? '';

// Validar los datos (opcional, pero recomendado)
if (empty($nombre) || empty($apellido) || empty($telefono) || empty($correo) || empty($especialidad_id) || empty($subespecialidad_id)) {
    echo "error: Todos los campos son obligatorios";
    exit;
}

// Preparar la consulta para evitar inyecciones SQL
$sql = "INSERT INTO visitador (nombre, apellido, telefono, correo, especialidad_id, subespecialidad_id) 
        VALUES (?, ?, ?, ?, ?, ?)";

// Imprimir la consulta con los datos (para depuración)
$consulta = "INSERT INTO visitador (nombre, apellido, telefono, correo, especialidad_id, subespecialidad_id) 
             VALUES ('$nombre', '$apellido', '$telefono', '$correo', $especialidad_id, $subespecialidad_id)";
//echo "<pre>" . htmlspecialchars($consulta) . "</pre>";

try {
    // Preparar la sentencia
    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $con->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssssii", $nombre, $apellido, $telefono, $correo, $especialidad_id, $subespecialidad_id);

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
