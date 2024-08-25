 <?php

include('../conexion.php');

// Suponiendo que `$id_visitador` se obtiene de la sesión
//$id_visitador = $_SESSION['id_visitador'];
$id_visitador = 2;
$direccionMedico = $_POST['dirccionMedico'];
$hora = $_POST['horaA'];

$fecha_actual = date('Y-m-d'); // Fecha actual en formato YYYY-MM-DD

$nombreFoto = $_FILES['fotoConsA']['name'];  // Obtenemos el nombre del archivo
$temp = $_FILES['fotoConsA']['tmp_name']; // Obtenemos la ruta del archivo en el servidor
$arreglo = explode(".", $nombreFoto);
$extension = end($arreglo); // Obtengo la extensión del archivo
$nuevonombre = uniqid() . "." . $extension; // Le doy un nuevo nombre al archivo
copy($temp, "imagenes/" . $nuevonombre); // Copio el archivo a la carpeta de imágenes

// Consulta para verificar si ya existe un registro para el visitador en la fecha actual
$sql_verificar = "SELECT * FROM entradaSalida WHERE id_visitador = $id_visitador AND fecha = '$fecha_actual'";
$resultado = $con->query($sql_verificar);

if ($resultado->num_rows == 0) {
    // Si no existe un registro para la fecha actual, insertamos uno nuevo
    $hora_entrada = date('H:i:s'); // Hora actual en formato HH:MM:SS
    $sql_insertar = "INSERT INTO entradaSalida (id_visitador, fecha) VALUES ($id_visitador, '$fecha_actual')";
    try {
        $result = $con->query($sql_insertar);
        $es_id = $con->insert_id;
        echo "Insertado correctamente";
    }catch (Exception $e) {
        die("Error al realizar al query, " . $e->getMessage());
    }
} else {
    // Obtener el id_entradaSalida existente
    $row = $resultado->fetch_assoc();
    $es_id = $row['id'];
}
// Insertar en la tabla Turno
$sql2 = "INSERT INTO Turno(id_entradaSalida, hora, direccionMedico, foto) VALUES
    ($es_id, '$hora', '$direccionMedico', '$nuevonombre')";
    try {
        $result = $con->query($sql2);
        echo "Insertado correctamente";
    }catch (Exception $e) {
        die("Error al realizar al query, " . $e->getMessage());
    }

$con->close();
?>
