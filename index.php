<!DOCTYPE html>
<html lang="en">
    <h1>
    <?php
        require_once "conexion.php";
        $sql = "SELECT * FROM articulos";
        $result = $conn->query($sql);

        $lol = $result->num_rows;
    ?>
    </h1>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PENSCRIPT</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php
            require_once "components/navbar.php";
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <?php
                        if(!isset($_SESSION['cargo'])){
                            echo '<h1 class="display-4 fw-bolder">PENSCRIPT no sos nadie</h1>';
                        }else{
                            if($_SESSION['cargo'] == 1){
                                echo '<h1 class="display-4 fw-bolder">PENSCRIPT sos usuario</h1>';
                            }else if($_SESSION['cargo'] == 2){
                                echo '<h1 class="display-4 fw-bolder">PENSCRIPT sos admin</h1>';
                            }
                        }
                    ?>
                    
                    <p class="lead fw-normal text-white-50 mb-0">tenemos una lapicera para vos (dorga)</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">    
        <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- articulo-->
                    <?php
                        if(!isset($_SESSION['cargo'])){
                            while ($row = $result->fetch_assoc()) {
                                /* vista para usuario no registrado */
                                if(is_null($row["delete_at"])){
                                    echo'<div class="col mb-5">
                                    <div class="card h-100">
                                    <a class="ratio ratio-1x1" href="articulo.php?articulo_id=' . $row["article_id"] . '"> <img class="card-img-top" style="object-fit:cover;" src="' . $row["imagen"] . '" alt="..." /></a>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <a class="nav-link" href="articulo.php?articulo_id=' . $row["article_id"] . '"><h5 class="fw-bolder">' . $row["nombre"] . '</h5></a>
                                            $' . $row["precio"] . '
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><p>' . $row["descripcion"] . '</p></div>
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" href="login.php">Añadir al carrito</a></div>
                                    </div>
                                    </div>
                                </div>';
                                };
                            };
                        }else if(isset($_SESSION['cargo'])){
                            /* vista para usuario registrado */
                            if($_SESSION['cargo'] == 1){
                                while ($row = $result->fetch_assoc()) {
                                    if(is_null($row["delete_at"])){
                                        echo'<div class="col mb-5">
                                        <div class="card h-100">
                                        <a class="ratio ratio-1x1" href="articulo.php?articulo_id=' . $row["article_id"] . '"> <img class="card-img-top" style="object-fit:cover;" src="' . $row["imagen"] . '" alt="..." /></a>
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <a class="nav-link" href="articulo.php?articulo_id=' . $row["article_id"] . '"><h5 class="fw-bolder">' . $row["nombre"] . '</h5></a>
                                                $' . $row["precio"] . '
                                            </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><p>' . $row["descripcion"] . '</p></div>
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" onclick="document.location.href=`carrito.php?article_id=' . $row['article_id'] . '&user_id=' . $_SESSION["user_id"] . '&pag=index`">Añadir al carrito</a></div>
                                        </div>
                                        </div>
                                    </div>';
                                    };
                                };
                            /* vista para admin */
                            }else if($_SESSION['cargo'] == 2){
                                while ($row = $result->fetch_assoc()) {
                                    if(is_null($row["delete_at"])){
                                        echo'<div class="col mb-5">
                                        <div class="card h-100">
                                        <a class="ratio ratio-1x1" href="articulo.php?articulo_id=' . $row["article_id"] . '"> <img class="card-img-top" style="object-fit:cover;" src="' . $row["imagen"] . '" alt="..." /></a>
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <a class="nav-link" href="articulo.php?articulo_id=' . $row["article_id"] . '"><h5 class="fw-bolder">' . $row["nombre"] . '</h5></a>
                                                $' . $row["precio"] . '
                                            </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center"><p>' . $row["descripcion"] . '</p></div>
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" onclick="document.location.href=`modificarArticulo.php?imagen=' . $row["imagen"] . '&nombre=' . $row["nombre"] . '&precio=' . $row["precio"] . '&descripcion=' . $row["descripcion"] . '`">modificar</a></div>
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: red;" onclick="document.location.href=`delete.php?article_id=' . $row['article_id'] . '`">eliminar</a></div>
                                        </div>
                                        </div>
                                    </div>';
                                    };
                                };
                            };
                        };
                    ?>
                </div>
            </div>
        </section>
        <?php require_once "components/footer.php"; ?>
    </body>
</html>