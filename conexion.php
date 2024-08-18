<?php
try{
    $con = new mysqli("localhost", "root", "", "bd_sistema_visitas_medicas");
}
catch(Exception $e)
{
    die('Error al conectarse en la base de datos'.$e->getMessage());

}
?>

