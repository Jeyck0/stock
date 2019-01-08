<?php
session_start();
require_once ("../configs/conexion_db.php");

if(isset($_POST['up-coordinacion'])){

    $selectUno = mysqli_escape_string($enlace, $_POST['coordinador1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['coordinador2']);
    $selectTres = mysqli_escape_string($enlace, $_POST['coordinador3']);


    $numero = mysqli_escape_string($enlace, $_POST['numero']);

}

// $sql_1 = "DELETE FROM planilla up INNER JOIN profesionals pr ON up.id_profesional = pr.id WHERE id_planilla = $numero AND titulo_profesional = 'EDUCADORA DE PARBULO' OR titulo_profesional = 'EDUCADOR(A) DIFERENCIAL'";
$sql_1 = "UPDATE planilla SET lugar_establecimiento = '$selectUno', lugar_daem = '$selectDos', lugar_redes_apoyo = '$selectTres' WHERE id = '$numero'";


// echo "ID nombre anterior".$id_anterior;
// echo "Numero planilla".$numero;
// echo "ID nombre nuevo".$id_nuevo;
// echo $numSelect;
// echo $selectUno;
// echo $selectDos;
// echo $selectTres;

//insert 
// if($numSelect==1){

//     $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."')";

// }if($numSelect==2){

//     $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."')";

// }if($numSelect==3){

//     $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."')";

// }if($numSelect==4){

//     $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."')";

// }if($numSelect==5){

//     $sql_2 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."'), ('".$numero."','".$selectCinco."')";

// }




    if(mysqli_query($enlace, $sql_1)):
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




