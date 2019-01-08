<?php 

require_once ("../configs/conexion_db.php");

if(isset($_POST['insertar'])){

    //select profesores
    $selectUno = mysqli_escape_string($enlace, $_POST['nombre1']);
    $selectDos = mysqli_escape_string($enlace, $_POST['nombre2']);
    $selectTres = mysqli_escape_string($enlace, $_POST['nombre3']);
    $selectCuatro = mysqli_escape_string($enlace, $_POST['nombre4']);
    $selectCinco = mysqli_escape_string($enlace, $_POST['nombre5']);
    $bucle_profe = mysqli_escape_string($enlace, $_POST['bucle_profe']);

    //select profesores especializados
    $bucle_profe_especializado = mysqli_escape_string($enlace, $_POST['bucle_profe_especializado']);
    $selectEspecializadoUno = mysqli_escape_string($enlace, $_POST['profe1']);
    $selectEspecializadoDos = mysqli_escape_string($enlace, $_POST['profe2']);
    $selectEspecializadoTres = mysqli_escape_string($enlace, $_POST['profe3']);
    $selectEspecializadoCuatro = mysqli_escape_string($enlace, $_POST['profe4']);
    $selectEspecializadoCinco = mysqli_escape_string($enlace, $_POST['profe5']);

     //select asistentes
     $bucle_profe_asistente = mysqli_escape_string($enlace, $_POST['bucle_profe_asistente']);
     $selectAsistenteUno = mysqli_escape_string($enlace, $_POST['docente1']);
     $selectAsistenteDos = mysqli_escape_string($enlace, $_POST['docente2']);
     $selectAsistenteTres = mysqli_escape_string($enlace, $_POST['docente3']);
     $selectAsistenteCuatro = mysqli_escape_string($enlace, $_POST['docente4']);
     $selectAsistenteCinco = mysqli_escape_string($enlace, $_POST['docente5']);

     //select cordinadores
     $selectCordinadorUno = mysqli_escape_string($enlace, $_POST['cordinador1']);
     $selectCordinadorDos = mysqli_escape_string($enlace, $_POST['cordinador2']);
     $selectCordinadorTres = mysqli_escape_string($enlace, $_POST['cordinador3']);

    //select alumnos
    $selectAlumnoUno = mysqli_escape_string($enlace, $_POST['alumno1']);
    $selectAlumnoDos = mysqli_escape_string($enlace, $_POST['alumno2']);
    $selectAlumnoTres = mysqli_escape_string($enlace, $_POST['alumno3']);
    $selectAlumnoCuatro = mysqli_escape_string($enlace, $_POST['alumno4']);
    $selectAlumnoCinco = mysqli_escape_string($enlace, $_POST['alumno5']);
    $bucle_alumno = mysqli_escape_string($enlace, $_POST['bucle_alumno']);
    


    $numero = mysqli_escape_string($enlace, $_POST['numero']);


}


//insert 
if($bucle_profe==1){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."')";

}if($bucle_profe==2){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."')";

}if($bucle_profe==3){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."')";

}if($bucle_profe==4){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."')";

}if($bucle_profe==5){

    $sql_1 = "INSERT INTO usuarios_planilla (id_planilla, id_profesional) VALUES ('".$numero."','".$selectUno."'), ('".$numero."','".$selectDos."'), ('".$numero."','".$selectTres."'), ('".$numero."','".$selectCuatro."'), ('".$numero."','".$selectCinco."')";

}

if($bucle_profe_especializado==1){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."')";
    

}
if($bucle_profe_especializado==2){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'),('".$numero."','".$selectEspecializadoDos."')";

}
if($bucle_profe_especializado==3){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'),('".$numero."','".$selectEspecializadoDos."'), ('".$numero."','".$selectEspecializadoTres."')";

}
if($bucle_profe_especializado==4){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'),('".$numero."','".$selectEspecializadoDos."'), ('".$numero."','".$selectEspecializadoTres."'), ('".$numero."','".$selectEspecializadoCuatro."')";

}
if($bucle_profe_especializado==5){
    $sql2=$sql_1.", ('".$numero."','".$selectEspecializadoUno."'),('".$numero."','".$selectEspecializadoDos."'), ('".$numero."','".$selectEspecializadoTres."'), ('".$numero."','".$selectEspecializadoCuatro."'), ('".$numero."','".$selectEspecializadoCinco."')";


}



if($bucle_profe_asistente==1){
    $sql3=$sql2.", ('".$numero."','".$selectAsistenteUno."')";
    

}
if($bucle_profe_asistente==2){
    $sql3=$sql2.", ('".$numero."','".$selectAsistenteUno."'),('".$numero."','".$selectAsistenteDos."')";

}
if($bucle_profe_asistente==3){
    $sql3=$sql2.", ('".$numero."','".$selectAsistenteUno."'),('".$numero."','".$selectAsistenteDos."'), ('".$numero."','".$selectAsistenteTres."')";

}
if($bucle_profe_asistente==4){
    $sql3=$sql2.", ('".$numero."','".$selectAsistenteUno."'),('".$numero."','".$selectAsistenteDos."'), ('".$numero."','".$selectAsistenteTres."'), ('".$numero."','".$selectAsistenteCuatro."')";

}
if($bucle_profe_asistente==5){
    $sql3=$sql2.", ('".$numero."','".$selectAsistenteUno."'),('".$numero."','".$selectAsistenteDos."'), ('".$numero."','".$selectAsistenteTres."'), ('".$numero."','".$selectAsistenteCuatro."'),('".$numero."','".$selectAsistenteCinco."')"; 
}

$sql4=" UPDATE planilla SET  lugar_establecimiento='.$selectCordinadorUno.',lugar_daem='.$selectCordinadorDos.',lugar_redes_apoyo='.$selectCordinadorTres.' WHERE id=$numero ";

if($bucle_alumno==1){

    $sql_5 = "INSERT INTO usuarios_planilla (id_planilla, id_alumno) VALUES ('".$numero."','".$selectAlumnoUno."')";

}if($bucle_alumno==2){

    $sql_5 = "INSERT INTO usuarios_planilla (id_planilla, id_alumno) VALUES ('".$numero."','".$selectAlumnoUno."'), ('".$numero."','".$selectAlumnoDos."')";

}if($bucle_alumno==3){

    $sql_5 = "INSERT INTO usuarios_planilla (id_planilla, id_alumno) VALUES ('".$numero."','".$selectAlumnoUno."'), ('".$numero."','".$selectAlumnoDos."'), ('".$numero."','".$selectAlumnoTres."')";

}if($bucle_alumno==4){

    $sql_5 = "INSERT INTO usuarios_planilla (id_planilla, id_alumno) VALUES ('".$numero."','".$selectAlumnoUno."'), ('".$numero."','".$selectAlumnoDos."'), ('".$numero."','".$selectAlumnoTres."'), ('".$numero."','".$selectAlumnoCuatro."')";

}if($bucle_alumno==5){

    $sql_5 = "INSERT INTO usuarios_planilla (id_planilla, id_alumno) VALUES ('".$numero."','".$selectAlumnoUno."'), ('".$numero."','".$selectAlumnoDos."'), ('".$numero."','".$selectAlumnoTres."'), ('".$numero."','".$selectAlumnoCuatro."'), ('".$numero."','".$selectAlumnoCinco."')";

}




if(mysqli_query($enlace, $sql3) && mysqli_query($enlace,$sql4)&& mysqli_query($enlace,$sql_5)):
    // $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    // Alumno agregado con exito!</div>';
    header('Location: ../pages/lista_plantillas_pie.php');
    echo "agregado OK";
    
else:
    echo "Error";
    echo $sql_5;
    echo "id del alumno = ".$selectAlumnoDos." bucle = ".$bucle_alumno;
endif;


    
    














