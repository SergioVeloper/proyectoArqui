<?php
include('../conexion.php');
//$id_visitador = $_SESSION['id_visitador'];
$id_visitador = 1;
$id_medico = $_POST['idMedico'];
$comentarioMed = $_POST['comentarioMed'];
$comentarioVis = $_POST['comentarioVis'];
$fecha = $_POST['fecha'];

$sql = "INSERT INTO Visita(id_medico, id_visitador, comentarioMedico, comentarioVisitador, fecha) VALUES
($id_medico, $id_visitador, '$comentarioMed', '$comentarioVis', '$fecha')";


try {
    $result = $con->query($sql);
    $visita_id = $con->insert_id;
} catch (Exception $e) {
    die("Error al realizar al query, " . $e->getMessage());
}


$CTotal = sizeof($_POST['medicamento_id']);

$cantidad = 0;
$medicamento = 0;

for ($i = 0; $i < $CTotal; $i++) {
    $cantidad = $_POST['cantidadMuestra'][$i];
    $medicamento = $_POST['medicamento_id'][$i];
    $sql2 = "INSERT INTO visitaMuestra(id_visita, id_muestra, cantidad) VALUES
    ($visita_id, $medicamento, $cantidad)";
    try {
        $result = $con->query($sql2);
    } catch (Exception $e) {
        die("Error al realizar al query, " . $e->getMessage());
    }
}

echo "Muestras insertadas y actualizadas correctamente"; // borrar esta parte
// for ($i = 0; $i < $CTotal; $i++) {
//     $cantidad = $_POST['cantidadMuestra'][$i];
//     $medicamento = $_POST['medicamento_id'][$i];
//     $sql3 = "UPDATE visitadorMuestra SET Cantidad = $cantidad WHERE id_visitador =  $id_visitador AND id_muestra = $medicamento";
//     try {
//         $result = $con->query($sql3);
//     } catch (Exception $e) {
//         die("Error al realizar al query, " . $e->getMessage());
//     }
// }