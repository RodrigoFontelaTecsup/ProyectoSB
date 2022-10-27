<?php
$host = "127.0.0.1";
$bd = "prueba_sb";
$usuario = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd",$usuario,$password);
} catch (Exception $ex) {
    echo $ex -> getMessage();
}
?>
