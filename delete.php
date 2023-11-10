<?php
    require_once "conexion.php";
    if(isset($_GET["article_id"])){
        $sql = "UPDATE `articulos` SET `delete_at`= NOW() WHERE `article_id`= " . $_GET["article_id"] . ";";
        $res = consulta($conn, $sql);
        echo 'el article_id es ' . $_GET["article_id"];
    }
    header("Location: index.php");
?>