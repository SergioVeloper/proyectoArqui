<?php
session_start();
$usuario_id = 7;
$_SESSION['usuario_id'] = $usuario_id;

try{
    $con = new mysqli("localhost", "root", "", "bd_sistema_visitas_medicas");
}
catch(Exception $e)
{
    die('Error al conectarse en la base de datos'.$e->getMessage());

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
    <title>Visitas Médicas</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">VisitMed</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <!-- Menú para Visitador -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#rutas" aria-expanded="false" aria-controls="rutas">
                        <i class="bi bi-map"></i>
                        <span>Mis Rutas</span>
                    </a>
                    <ul id="rutas" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" id="medicos" class="sidebar-link">
                                <i class="bi bi-card-list"></i>
                                Ver Rutas
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#visitas" aria-expanded="false" aria-controls="visitas">
                        <i class="bi bi-calendar-check"></i>
                        <span>Mis Visitas</span>
                    </a>
                    <ul id="visitas" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" id="misVisitas" class="sidebar-link">
                                <i class="bi bi-card-list"></i>
                                Ver Visitas
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Salir</span>
                </a>
            </div>
        </aside>
        <div class="main p-3 content-fluid">
            <div class="text-center">
                <!-- <h1>Bienvenido, Visitador</h1> -->
                <div id="contenido"></div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <!-- Scripts específicos para las secciones -->
    <script src="visitas/visitas.js"></script>
</body>

</html>