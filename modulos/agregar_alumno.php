<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-crear'])):
    $matricula = mysqli_escape_string($enlace, $_POST['matricula']);
    $rut = mysqli_escape_string($enlace, $_POST['rut']);
    $nombres = mysqli_escape_string($enlace, $_POST['nombres']);
    $apellidos = mysqli_escape_string($enlace, $_POST['apellidos']);
    $nacimiento = mysqli_escape_string($enlace, $_POST['nacimiento']);
    $ciudad = mysqli_escape_string($enlace, $_POST['ciudad']);
    $direccion = mysqli_escape_string($enlace, $_POST['direccion']);
    $telefono = mysqli_escape_string($enlace, $_POST['telefono']);
    $sexo = mysqli_escape_string($enlace, $_POST['sexo']);
    $curso = mysqli_escape_string($enlace, $_POST['curso']);

endif;

    $sql = "INSERT INTO alumnos (nombres, apellidos, rut, ciudad, direccion, fecha_nacimiento, telefono, sexo, num_matricula, curso) 
    VALUES ('".$nombres."', '".$apellidos."', '".$rut."', '".$ciudad."', '".$direccion."', '".$nacimiento."', '".$telefono."', '".$sexo."', '".$matricula."', '".$curso."' )";



    if(mysqli_query($enlace, $sql)):
        $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Alumno agregado con exito!</div>';
        header('Location: ../pages/lista_alumno.php?success');
        
    else:
        //header('Location: ../pages/pantalla_error_alumno.php');
        echo $sql;
    endif;

    

