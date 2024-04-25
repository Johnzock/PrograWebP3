<?php
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "galeria";

$usuario = $_POST["user"];
$contrasena = $_POST["pass"];
$email = $_POST["email"];

$conexion = mysqli_connect($servidor,$usuariodb,$passdb,$db);
$consulta = "SELECT nombre, contrasena FROM usuarios WHERE nombre='$usuario' AND contrasena='$contrasena'";
$resultado = misqli_query($conexion,$consulta);

//if(isset($usuarios[$usuario]) && $usuarios[$usuario] == $contrasena){
 if(mysqli_num_rows($resultado)>0){
    $_SESSION['usuario'] = $usuario;
    header("Location: upload.php")
}else{
    echo "Error: Usuario y/o Contraseña incorrectos.";
}
?>