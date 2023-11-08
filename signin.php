<!DOCTYPE html>
<html lang="es">
    <h1>
        <?php 
        
        require_once "conexion.php";

        ?>
    </h1>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">wopaaaaaaaaaaaaaaaaaaaa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                </ul>
                
            </div>
        </div>
    </nav>
    <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div>

    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

        
        <form method= "POST" style="width: 23rem;">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="username" required/>
              <label class="form-label" for="form2Example18">Username</label>
            </div>
            
            <div class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="email" required/>
              <label class="form-label" for="form2Example18">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="password" required/>
              <label class="form-label" for="form2Example28">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit">Sign in</button>
            </div>
        </form>
        
        <?php
            /* if($_POST['email'] == ) */
            
            if(isset($_POST['password']) && isset($_POST['email']) && isset($_POST['username'])){

                $sql = "SELECT * 
                FROM usuario 
                WHERE email='".$_POST['email']."'";
            
                $res = consulta($conn, $sql);

                 if(mysqli_num_rows($res) == 0){
                        $sql2 = "INSERT INTO `usuario`(`nombreUsuario`, `email`, `contraseña`, `cargo`) VALUES ('" . $_POST['username'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "',1)";
                        $sql3 = "SELECT * FROM usuario WHERE email='".$_POST['email']."'";
                        
                        $res2 = consulta($conn, $sql2);
                        $res3 = consulta($conn, $sql3);
                        $_SESSION = mysqli_fetch_assoc($res3);
                        header('Location: index.php');
                    }else{
                        ?><p class="sherr">Usuario ya existe</p><?php
                    }
            }
        ?>
    </div>

</div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="assets/rectangulo_gris.png"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
</body>
</html>