<?php

include ('../configs/conexion_db.php');

if(isset($_POST["btn_planilla"])){

	$id_planilla = $_POST["select_planilla"];
	
    }
    
    header('Location: ../pages/mpdfprueba.php?id='.$id_planilla);