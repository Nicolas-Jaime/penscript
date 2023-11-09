<?php
    require_once "conexion.php";
    if(isset($_GET["article_id"])){
        $sql = "UPDATE `articulos` SET `delete_at`= NOW() WHERE `article_id`= " . $_GET["article_id"] . ";";
        $res = consulta($conn, $sql);
    }
    header("Location: index.php");
?>