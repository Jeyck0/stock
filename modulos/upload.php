<?php
require '../configs/conexion_db.php';

if(isset($_POST['enviar'])):
    $id = mysqli_escape_string($enlace, $_POST['id']);
    
    endif;
    

$carpeta ="../uploads/";
$destino= $carpeta.$_FILES['file-upload'] ['name'];
copy($_FILES['file-upload'] ['tmp_name'],$destino);
$nombre =$_FILES['file-upload'] ['name'];
$ruta= "C:/xampp\htdocs\phpcartes\uploads/".$nombre;
echo $id;


