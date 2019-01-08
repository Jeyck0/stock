<?php
require ('../configs/conexion_db.php');
if(isset($_POST["submit"])){

	$rbd = $_POST["rbd"];
	$nombre =$_POST["nombre"];
	$region = $_POST["cosa"];
	$comuna = $_POST["opt"];
	$direccion =$_POST["direccion"];
	$telefono =$_POST["telefono"];
	$entidad = $_POST["entidad"];
	$nivel =$_POST["nivel"];	
	}

	// echo $region;
	// echo $comuna;
	// echo $direccion;

	$sql = ("insert into establecimientos 
	(rbd,nombre,region,comuna,direccion,telefono,entidad,nivel_educacional)
	VALUES('".$rbd."','".$nombre."','".$region."','".$comuna."','".$direccion."','".$telefono."','".$entidad."','".$nivel."')");

	if(mysqli_query($enlace, $sql)){
		header('Location: ../pages/lista_establecimientos.php?success'); 
		echo 'correcto =)';
		echo $sql;
	}
        

    else{
		/**header('Location: ../tablaAlumno.php?error'); */
		echo 'caca';
		echo $sql;
	}
        
   

 ?>   