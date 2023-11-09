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
        
        <?php
        if(isset($_SESSION['cargo'])){
        if($_SESSION['cargo'] == 1){
        ?>
        <!-- Navigation-->
        <?php
            require_once "components/navbar.php";
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">PENSCRIPT sos usuario</h1>
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
                        while ($row = $result->fetch_assoc()) {
                            if(is_null($row["delete_at"])){
                                echo'<div class="col mb-5">
                                <div class="card h-100">
                                <a href="articulo.php" target="_blank"> <img class="card-img-top" src="' . $row["imagen"] . '" alt="..." /></a>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">' . $row["nombre"] . '</h5>
                                        $' . $row["precio"] . '
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><p>' . $row["descripcion"] . '</p></div>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" href="#">añadir al carrito loco ese</a></div>
                                </div>
                                </div>
                            </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; My Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <?php
        }else if($_SESSION['cargo'] == 2){
        ?>
        <!-- Navigation-->
        <?php
            require_once "components/navbar.php";
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">PENSCRIPT sos admin</h1>
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
                        while ($row = $result->fetch_assoc()) {
                            if(is_null($row["delete_at"])){
                                echo '
                                <div class="col mb-5">
                                    <div class="card h-100">
                                        <a href="articulo.php" target="_blank"> <img class="card-img-top" src="' . $row["imagen"] . '" alt="..." /></a>
                                        <div class="card-body p-4">
                                            <div class="text-center">
                                                <h5 class="fw-bolder">' . $row["nombre"] . '</h5>
                                                $' . $row["precio"] . '
                                            </div>
                                        </div>
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><p>' . $row["descripcion"] . '</p></div>
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" href="#">añadir al carrito loco ese</a></div>
                                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: red;" onclick="document.location.href=`delete.php?article_id=' . $row['article_id'] . '`">eliminar</a></div>
                                        </div>
                                    </div>
                                </div>';
                            }
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; My Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <?php
        }
    }
        else{
        ?>
        <!-- Navigation-->
        <?php
            require_once "components/navbar.php";
        ?>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">PENSCRIPT no sos nadie</h1>
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
                        while ($row = $result->fetch_assoc()) {
                            if(is_null($row["delete_at"])){
                                echo'<div class="col mb-5">
                                <div class="card h-100">
                                    <a href="articulo.php" target="_blank"> <img class="card-img-top" src="' . $row["imagen"] . '" alt="..." /></a>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <h5 class="fw-bolder">' . $row["nombre"] . '</h5>
                                            $' . $row["precio"] . '
                                        </div>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><p>' . $row["descripcion"] . '</p></div>
                                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" href="#">añadir al carrito loco ese</a></div>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; My Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <?php
        }
        ?>
    </body>
</html>