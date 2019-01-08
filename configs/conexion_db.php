<?php
$usuario = 'root';
$password = '';
$nombre_bd = 'phpcartes';

$enlace = mysqli_connect("localhost",$usuario,$password,$nombre_bd);

if(!$enlace){
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else {
    // echo "Conectado";
}



// echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos ".$nombre_bd." es genial." . PHP_EOL;
// echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

?>
