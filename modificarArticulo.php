<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregando artículo</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<?php require_once "components/navbar.php";

    if(isset($_POST["imagen"]) && isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["descripcion"])){

        $sql = "UPDATE `articulos` SET `precio`='" . $_POST["precio"] . "', `nombre`='" . $_POST["nombre"] . "', `descripcion`='" . $_POST["descripcion"] . "', `imagen`='" . $_POST["imagen"] . "'
        WHERE `article_id`=" . $_GET["articleid"];
        $res = consulta($conn, $sql);
        header("Location: articulo.php?articleid=" . $_GET['articleid']);

    };
?>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <form class="row gx-4 gx-lg-5 align-items-center" method="post">
                <input class="col-md-6" style="margin: 15rem 0; border:none;outline:none;" <?php echo "value='" . $_GET['imagen'] . "'";?> name="imagen"></input>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><input <?php echo "value='" . $_GET['nombre'] . "'";?> name="nombre" style="border:none;outline:none;"></input></h1>
                    <div class="fs-5 mb-5">
                        $<input <?php echo "value='" . $_GET['precio'] . "'";?> name="precio" style="border:none;outline:none;"></input>
                    </div>
                    <input class="lead" style="width: 100%; border:none;outline:none;" <?php echo "value='" . $_GET['descripcion'] . "'";?> name="descripcion"></input>
                    <div class="d-flex">
                        <div class="text-center">
                            <button
                                class="btn btn-outline-dark mt-auto"
                                style="background-color: grey;"
                                type="submit">
                                modificar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <?php require_once "components/footer.php"; ?>
</body>
</html>
