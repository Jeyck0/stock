<?php 

// echo "ajax = ";

$id = $_POST['id'];

require '../configs/conexion_db.php';

$sql = "SELECT * FROM profesionals WHERE id = '$id'";
$resultado = mysqli_query($enlace, $sql);

$dado = mysqli_fetch_array($resultado); 

$rut = $dado['rut'];
$telefono = $dado['telefono'];

?>

