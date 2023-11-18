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

    if(isset($_GET["imagen"]) && isset($_GET["nombre"]) && isset($_GET["precio"]) && isset($_GET["descripcion"])){

        $sql = "INSERT INTO `articulos`(`precio`, `nombre`, `descripcion`, `imagen`) VALUES ('" . $_GET["precio"] . "','" . $_GET["nombre"] . "','" . $_GET["descripcion"] . "','" . $_GET["imagen"] . "')";
        $res = consulta($conn, $sql);
        echo "<script>alert('AGREGASTE')</script>";

    }
?>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <form class="row gx-4 gx-lg-5 align-items-center">
                <input class="col-md-6" style="margin: 15rem 0; border:none;outline:none;" placeholder="url imagen..." name="imagen" required></input>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><input placeholder="Nombre del producto..." name="nombre" style="border:none;outline:none;" required></input></h1>
                    <div class="fs-5 mb-5">
                        $<input placeholder="Precio..." name="precio" style="border:none;outline:none;" required></input>
                    </div>
                    <textarea class="lead" style="width: 100%; border:none;outline:none;" placeholder="Descripción..." name="descripcion" required></textarea>
                    <div class="d-flex">
                        <div class="text-center">
                            <button
                                class="btn btn-outline-dark mt-auto"
                                style="background-color: grey;"
                                type="submit">
                                añadir articulo
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
