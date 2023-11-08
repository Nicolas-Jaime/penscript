<?php
session_start();
$servername = "localhost";
$username = "root";
$password = '';
$database = "penscript";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
function consulta($conn, $sql)
    {
        $res = mysqli_query($conn, $sql);

            if (!$res) {
                exit("Error en consulta: " . mysqli_error($conn));
            }

        return $res;
    }  
    function soft_delete($conn, $id)
        {
            $sql = "UPDATE articulos SET articulos.delete_at = CURRENT_DATE() WHERE articulos.article_id ='$id' ";
                                    
            $res = consulta($conn, $sql);
                    
                if(1 == mysqli_num_rows($res)){
                    $_SESSION = mysqli_fetch_assoc($res);
                    header('Location: index.php');
                }else{
                    ?><p class="sherr">Usuario y/o clave incorrecto</p><?php
                } 
        }
?>