<!DOCTYPE html>
<html lang="es">
    <h1>
    <?php    
        require_once "conexion.php";

        $getArticleID = $_GET['articulo_id'];
        $sql = "SELECT * FROM articulos WHERE article_id=" . $getArticleID;
        $result = $conn->query($sql);
        $article = mysqli_fetch_assoc($result);
    ?>
    </h1>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article["nombre"]?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
<?php require_once "components/navbar.php"; ?>

        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $article["imagen"] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $article["nombre"]; ?></h1>
                        <div class="fs-5 mb-5">
                            <span>$<?php echo $article["precio"] ?></span>
                        </div>
                        <p class="lead"><?php echo $article["descripcion"] ?></p>
                        <div class="d-flex">
                            <div class="text-center">
                                <?php if(isset($_SESSION["user_id"])){?>
                                    <a
                                    class="btn btn-outline-dark mt-auto"
                                    style="background-color: grey;" 
                                    href="carrito.php?article_id=<?php echo $getArticleID?>&user_id=<?php $_SESSION['user_id'] ?>&pag=articulo">
                                        añadir al carrito loco ese
                                    </a>;
                                <?php }else{?>
                                    <a
                                    class="btn btn-outline-dark mt-auto"
                                    style="background-color: grey;" 
                                    href="login.php">
                                        añadir al carrito loco ese
                                    </a>;
                                <?php }; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php require_once "components/footer.php"; ?>
</body>
</html>
