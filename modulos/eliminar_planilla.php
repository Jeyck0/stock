<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-delete'])):

    $id = mysqli_escape_string($enlace, $_POST['id']);

endif;

// $sql = "DELETE up, p FROM usuarios_planilla up LEFT JOIN planilla p ON up.id_planilla = p.id WHERE up.id_planilla = $id"; 
$sql = "DELETE FROM planilla WHERE id = $id"; 
$sql2 = "DELETE FROM planilla_planilla WHERE id_planilla = $id"; 
$sql3 = "DELETE FROM usuarios_planilla WHERE id_planilla = $id"; 

    // $sql2 = "DELETE FROM planilla WHERE id = '$id'"; 
    // ALTER TABLE usuarios_planilla ADD FOREIGN KEY(id_planilla) REFERENCES planilla(id) 



    if(mysqli_query($enlace, $sql2) && mysqli_query($enlace, $sql3) && mysqli_query($enlace, $sql)):
        // $_SESSION['mensaje'] = '<div class="alert alert-danger alert-dismissible" role="alert">
        // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        // <strong>Profesional eliminado con exito!</strong></div>';
        header('Location: ../pages/lista_plantillas_pie.php?successo');
        
    else:
        $_SESSION['mensaje'] = "Error al intentar eliminar";
        header('Location: ../pages/lista_plantillas_pie.php?error');
    endif;

