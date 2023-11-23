<?php
    require_once "conexion.php";

    if(isset($_GET["articleid"]) && isset($_GET["user_id"])){
        $sql = "INSERT INTO `carrito`(`article_id`, `user_id`) VALUES ('" . $_GET["articleid"] . "','" . $_GET["user_id"] . "')";
        $res = consulta($conn, $sql);
    }
    if($_GET["pag"] == "index"){
        header("Location: index.php");
    }else if($_GET["pag"] == "articulo"){
        header("Location: articulo.php?articleid=" . $_GET['articleid'] . "&pag=articulo");
    }
?>