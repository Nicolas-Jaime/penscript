<?php
    require_once "conexion.php";
    if(isset($_GET["id"])){
        $sql = "DELETE FROM `carrito` WHERE id=" . $_GET['id'] . ";";
        $res = consulta($conn, $sql);
    }
    header("Location: index.php");
?>