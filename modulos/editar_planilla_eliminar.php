<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['btn-delete1'])){


    $idUno = mysqli_escape_string($enlace, $_POST['idUno1']);
    $numero = mysqli_escape_string($enlace, $_POST['numero']);


}elseif(isset($_POST['btn-delete2'])){

    $idDos = mysqli_escape_string($enlace, $_POST['idUno2']);
    $numero = mysqli_escape_string($enlace, $_POST['numero']);

}elseif(isset($_POST['btn-delete3'])){

    $idTres = mysqli_escape_string($enlace, $_POST['idUno3']);
    $numero = mysqli_escape_string($enlace, $_POST['numero']);

}elseif(isset($_POST['btn-delete4'])){

    $idCuatro = mysqli_escape_string($enlace, $_POST['idUno4']);
    $numero = mysqli_escape_string($enlace, $_POST['numero']);

}elseif(isset($_POST['btn-delete5'])){

    $idCinco = mysqli_escape_string($enlace, $_POST['idUno5']);
    $numero = mysqli_escape_string($enlace, $_POST['numero']);

}

// echo $numero;
// echo $idUno;
// echo $idDos;
// echo $idTres;

if($idUno){

    $sql = "DELETE FROM usuarios_planilla WHERE id_planilla = '$numero' AND id_profesional = '$idUno'";

}if($idDos){
    $sql = "DELETE FROM usuarios_planilla WHERE id_planilla = '$numero' AND id_profesional = '$idDos'";

}if($idTres){
    $sql = "DELETE FROM usuarios_planilla WHERE id_planilla = '$numero' AND id_profesional = '$idTres'";

}if($idCuatro){
    $sql = "DELETE FROM usuarios_planilla WHERE id_planilla = '$numero' AND id_profesional = '$idCuatro'";

}if($idCinco){
    $sql = "DELETE FROM usuarios_planilla WHERE id_planilla = '$numero' AND id_profesional = '$idCinco'";

}

if(mysqli_query($enlace, $sql)):
    // $_SESSION['mensaje'] = '<div class="alert alert-danger alert-dismissible" role="alert">
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    // Alumno eliminado con exito!</div>';
    header('Location: ../pages/editar_planilla.php?id='.$numero);
    echo "Eliminado";
    
else:
    // $_SESSION['mensaje'] = "Error al intentar eliminar";
    // header('Location: ../pages/lista_alumno.php?error');
    echo "Error";
    
endif;