<?php
include('../conexion.php');

// Recoger datos del formulario
$nombres = $_POST['nombreMedico'] ?? '';
$apellidos = $_POST['apellidoMedico'] ?? '';
$telefono = $_POST['telefonoMedico'] ?? '';
$dir_consultorio = $_POST['direccionMedico'] ?? '';
$email = $_POST['emailMedico'] ?? '';
$fecha_nacimiento = $_POST['fechaCumpleMedico'] ?? '';
$especialidad_id = $_POST['especialidadVisitador'] ?? '';
$subespecialidad_id = $_POST['subespecialidadVisitador'] ?? '';
$zona = $_POST['zona'] ?? '';

// Validar los datos (opcional, pero recomendado)
if (empty($nombres) || empty($apellidos) || empty($telefono) || empty($dir_consultorio) || empty($email) || empty($fecha_nacimiento) || empty($especialidad_id) || empty($subespecialidad_id) ||  empty($zona)) {
    echo "error: Todos los campos son obligatorios";
    exit;
}

// Preparar la consulta para evitar inyecciones SQL
$sql = "INSERT INTO medico (nombres, apellidos, telefono, dir_consultorio, email, fecha_nacimiento, especialidad_id, subespecialidad_id, Zona) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

// Imprimir la consulta con los datos (para depuración)
$consulta = "INSERT INTO medico (nombres, apellidos, telefono, dir_consultorio, email, fecha_nacimiento, especialidad_id, subespecialidad_id, Zona) 
             VALUES ('$nombres', '$apellidos', '$telefono', '$dir_consultorio', '$email', '$fecha_nacimiento', $especialidad_id, $subespecialidad_id, $zona)";
//echo "<pre>" . htmlspecialchars($consulta) . "</pre>";

try {
    // Preparar la sentencia
    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $con->error);
    }

    // Vincular los parámetros
    $stmt->bind_param("ssssssii", $nombres, $apellidos, $telefono, $dir_consultorio, $email, $fecha_nacimiento, $especialidad_id, $subespecialidad_id, $zona);

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
