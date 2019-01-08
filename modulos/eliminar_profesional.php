<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-delete'])):

    $id = mysqli_escape_string($enlace, $_POST['id']);
    

endif;

    $sql = "DELETE FROM profesionals WHERE id = '$id'";



    if(mysqli_query($enlace, $sql)):
        $_SESSION['mensaje'] = '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Profesional eliminado con exito!</strong></div>';
        header('Location: ../pages/listaProfesionals.php?successo');
        
    else:
        $_SESSION['mensaje'] = "Error al intentar eliminar";
        header('Location: ../pages/listaProfesionals.php?error');
    endif;

