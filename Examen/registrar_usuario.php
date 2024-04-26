<?php
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "exa";

$usuario = $_POST["user"];
$contrasena = $_POST["pass"];
$email = $_POST["email"];

$conexion = mysqli_connect($servidor,$usuariodb,$passdb,$db);
$consulta = "INSERT INTO `user`( `nombre`, `correo_electronico`, `contrasena`) VALUES ('$usuario','$email','$contrasena')";

if(mysqli_query($conexion,$consulta)){
    echo "Usuario Registrado";
}
mysqli_close($conexion);
?>