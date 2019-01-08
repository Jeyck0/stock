<?php
require '../configs/conexion_db.php';

if(isset($_POST["submit"])){

	$usuario = $_POST["usuario"];
    $password =$_POST["password"];
    $password2 =$_POST["password2"];
    $admin =$_POST["chk_admin"];
	
    }
    
    $sql="INSERT INTO users (name,password,privilegio) VALUES('".$usuario."','".$password."','".$admin."')";
    
    if($password == $password2){
      if(mysqli_query($enlace, $sql)){
        header('Location: ../login.php'); 
        echo 'correcto =)';
        echo $sql;
      }
      else{
        header('Location: ../pages/pantalla_error_usuario.php'); 
      }
    }
	
	