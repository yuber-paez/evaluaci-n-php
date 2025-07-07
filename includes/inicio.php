<?php 
require '../config/database.php';

$db = new Database();
$con = $db->conectar();

if($_POST["inicio"])
{
   
    $doc = $_POST['usuario'];
    $contra = $_POST['clave'];
    

    $sql = $con->prepare("SELECT * FROM user WHERE doc = '$doc' AND pass = '$contra'");
    $sql->execute();
    $fila = $sql->fetch();


    if ($fila) {
        $_SESSION['doc_user'] = $fila ['doc'];
        $_SESSION['tipo'] = $fila ['id_rol'];

        if ($_SESSION['tipo'] == 1) {
            header("Location: ../rutas/admin/index.php");
            exit();
        }

        if ($_SESSION['tipo'] == 2) {
            header("Location: ../rutas/gerente/index.php");
            exit();
        }

        if ($_SESSION['tipo'] == 3) {
            header("Location: ../rutas/cajero/index.php");
            exit();
        }
    }


}
else
{
 echo"<script>alert('Credenciales invalidas o usuario inactivo.')</script>";
 echo"<script>window.location='../index.php'</script>";
 exit();

}	
?>