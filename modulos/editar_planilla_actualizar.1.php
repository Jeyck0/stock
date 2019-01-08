<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['actualizar'])){

    $selectUno = mysqli_escape_string($enlace, $_POST['select1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['select2']);
    $selectTres = mysqli_escape_string($enlace, $_POST['select3']);
    $selectCuatro = mysqli_escape_string($enlace, $_POST['select4']);
    $selectCinco = mysqli_escape_string($enlace, $_POST['select5']);

    $numero = mysqli_escape_string($enlace, $_POST['numero']);
    $numSelect = mysqli_escape_string($enlace, $_POST['especial']);

}

$sql_1 = "DELETE up FROM usuarios_planilla up INNER JOIN profesionals pr ON up.id_profesional = pr.id WHERE id_planilla = $numero AND titulo_profesional = 'EDUCADORA DE PARVULOS' OR titulo_profesional = 'EDUCADOR(A) DIFERENCIAL'";


// echo "ID nombre anterior".$id_anterior;
// echo "Numero planilla".$numero;
// echo "ID nombre nuevo".$id_nuevo;
// echo $numSelect;
// echo $selectUno;
// echo $selectDos;

//insert 
if($numSelect==1){

    $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."')";

}if($numSelect==2){

    $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."')";

}if($numSelect==3){

    $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."')";

}if($numSelect==4){

    $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."')";

}if($numSelect==5){

    $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."'), ('".$numero."','".$selectCinco."')";

}




    if(mysqli_query($enlace, $sql_1) && mysqli_query($enlace,$sql_2)):
        // $_SESSION['mensaje'] = '<div class="alert alert-danger alert-dismissible" role="alert">
        // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        // Alumno eliminado con exito!</div>';
        header('Location: ../pages/editar_planilla.php?id='.$numero);
        echo "Actualizado";
        
    else:
        // $_SESSION['mensaje'] = "Error al intentar eliminar";
        // header('Location: ../pages/lista_alumno.php?error');
        echo "Error";
        
    endif;




