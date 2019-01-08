<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-editar'])):
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

    $id = mysqli_escape_string($enlace, $_POST['id']);
    

endif;

    $sql = "UPDATE alumnos SET nombres = '$nombres', apellidos = '$apellidos', rut = '$rut', 
    ciudad = '$ciudad', direccion = '$direccion', fecha_nacimiento = '$nacimiento', telefono = '$telefono', 
    sexo = '$sexo', num_matricula = '$matricula', curso = '$curso' WHERE id = '$id'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/lista_alumno.php?successo');
        
    else:
        header('Location: ../pages/lista_alumno.php?error');
    endif;

