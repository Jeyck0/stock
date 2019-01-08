<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['submit'])):
    $rbd = mysqli_escape_string($enlace, $_POST['rbd']);
    $nivel_educacional = mysqli_escape_string($enlace, $_POST['nivel']);
    $nombre = mysqli_escape_string($enlace, $_POST['nombre']);
    $ciudad = mysqli_escape_string($enlace, $_POST['ciudad']);
    $direccion = mysqli_escape_string($enlace, $_POST['direccion']);
    $telefono = mysqli_escape_string($enlace, $_POST['telefono']);
    $entidad = mysqli_escape_string($enlace, $_POST['entidad']);

    $id = mysqli_escape_string($enlace, $_POST['id']);
    

endif;

    $sql = "UPDATE establecimientos SET nombre = '$nombre', nivel_educacional = '$nivel_educacional', 
    ciudad = '$ciudad', direccion = '$direccion', telefono = '$telefono',rbd = '$rbd', entidad = '$entidad' WHERE id = '$id'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/lista_establecimientos.php?successo');
        
    else:
        header('Location: ../pages/lista_establecimientos.php?error');
    endif;

