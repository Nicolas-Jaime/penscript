<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Penscript</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php
                    include_once("conexion.php");
                    $getPath = $_SERVER['REQUEST_URI'];

                    if(isset($_SESSION["user_id"])){
                        $sql2 = "SELECT user_id, articulos.article_id, nombre, imagen, precio, id
                        FROM carrito
                        INNER JOIN articulos ON carrito.article_id = articulos.article_id
                        WHERE user_id = " . $_SESSION['user_id'] . "";
                        /* consulta */
                        $res2 = consulta($conn, $sql2);
                        $resultado2 = $conn->query($sql2);
                        /* numero de filas */
                        $lol2 = $res2->num_rows;
                    };
                    if(isset($_SESSION['cargo']) && $_SESSION['cargo'] == 1 || isset($_SESSION['cargo']) && $_SESSION['cargo'] == 2){
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php">log out</a></li>';
                    }else{
                        echo '
                        <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                        <li class="nav-item"><a class="nav-link" href="signin.php">Sign in</a></li>';
                    };
                ?>
            </ul>
            <form class="d-flex">
                <?php if(isset($_SESSION["cargo"]) && $_SESSION["cargo"] == 1){?>
                <li class="nav-link dropdown">
                    <a class="btn btn-outline-dark dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php 
                            echo isset($lol2) ? $lol2 : 0;
                            ?>
                    </span></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <?php
                                if(isset($_SESSION["user_id"])){
                                    while($row = $res2->fetch_assoc()) {
                                        echo'
                                        <div class="card h-100">
                                            <a href="articulo/index.html" target="_blank"> <img class="card-img-top" src="' . $row["imagen"] . '" alt="..." /></a>
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <h5 class="fw-bolder">' . $row["nombre"] . '</h5>
                                                    <h7>' . $row["precio"] . '</h7>
                                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" style="background-color: grey;" onclick="document.location.href=`delete_carrito.php?id=' . $row['id'] . '&originalURL=' . $getPath . '`">eliminar</a></div>
                                                </div>
                                            </div>
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent"></div>
                                        </div>
                                        ';
                                    };
                                };
                            ?>
                        </ul>
                </li>
                    <?php }else if(isset($_SESSION["cargo"]) && $_SESSION["cargo"] == 2){

                        echo'
                        <a class="btn btn-outline-dark" href="agregarArticulo.php" role="button">Crear Producto</a>
                        ';

                     } ?>
            </form>
        </div>
    </div>
</nav>
