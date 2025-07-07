<?php
session_start();
require_once('../../config/database.php');
$db = new Database();
$con = $db->conectar();

$doc = $_SESSION['doc_user'];

$sql = $con->prepare("SELECT * FROM user 
INNER JOIN rol 
ON user.id_rol = rol.id_rol 
WHERE user.doc = '$doc'");


$sql->execute();
$fila = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <h1>Bienvenido <?php echo $fila['name']; ?> su rol es <?php echo $fila['rol']; ?></h1>
</body>

</html>