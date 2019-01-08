<?php
require '../configs/conexion_db.php';

session_start();
if(isset($_POST["submit"])){

	$usuario = $_POST["usuario"];
	$password =$_POST["password"];
	
	}
	//SE GUARDA CONSULTA SELECT EN UNA VARIABLE
	$sql_sel = "SELECT * FROM users WHERE name='".$usuario."' and password= '".$password."'"; 
	// SE EJECUTA LA CONSULTA Y SE GUARDA EN UNA VARIABLE EL RESULTADO
	$respuesta= mysqli_query($enlace,$sql_sel);
    $dado = mysqli_fetch_array($respuesta);

	//CUENTA EL NUMERO DE FILAS QUE RETORNO LA CONSULTA
	$num = mysqli_num_rows($respuesta);
	
	if(($password == $dado['password']) && ($usuario == $dado['name'])){
		if($num > 0){
			//SE CREA LA SESION CON LA ID DEL USUARIO
			$row=mysqli_fetch_array($respuesta);
			$_SESSION['s_id'] = $usuario;
			$_SESSION['tipo'] = $dado['privilegio'];
			//SE REDIRECCIONA AL SISTEMA
			header("Location:../pages/index.php");
			echo "login correcto";
		}
		else{
			header("Location:../login.php");
			echo "login incorrecto";
		}
	}
	else{
		header("Location:../pages/pantalla_error_logeo.php");
	}
	
	
	?>