<?php
session_start();
    if (!isset($_SESSION['user'])) {
        header("Location../index.php");
    } else {
        if ($_SESSION['user'] == "ok") {
            $nombreUser = $_SESSION["nombreUsuario"];
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" type="image/x-icon" href="./img/adm.ico">
    <link rel="icon" type="image/x-icon" href="../img/adm.ico">
</head>

<body>
    <?php $url = "http://".$_SERVER['HTTP_HOST']."/Sistema_bancario" ?>

    <nav class="navbar navbar-expand navbar-light bg-light">

        <div class="nav navbar-nav">
            <li>
                <img style="width: 100px; height: 100px;" src="../img/caballo.png" alt="logo">
            </li>
            <a class="nav-link" href="<?php echo $url; ?>/administrador/inicio.php">Inicio</a>
            <a class="nav-link" href="<?php echo $url; ?>/administrador/seccion/usuarios.php">Registrar Usuarios</a>
            <a class="nav-link" href="<?php echo $url; ?>/administrador/index.php">Cerrar sesion</a>
        </div>
    </nav>
    <div class="container">
        <br>
        <div class="row">