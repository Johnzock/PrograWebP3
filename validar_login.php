<?php
session_start();
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "galeria";

$usuario = $_POST["user"];
$contrasena = $_POST["pass"];

$conexion = mysqli_connect($servidor,$usuariodb,$passdb,$db);
$consulta = "SELECT nombre,contrasena FROM usuarios WHERE nombre='$usuario' AND contrasena='$contrasena'";
$resultado = mysqli_query($conexion, $consulta);


if(mysqli_num_rows($resultado)>0){
    $_SESSION['usuario'] = $usuario;
    header("Location: upload.php");
}else{
    echo "Error: Usuario y/o contrasena son incorrectos.";
}
?>
