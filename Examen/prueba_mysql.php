<?php
$servidor = "localhost";
$usuariodb = "root";
$passdb = "";
$db = "exa";

$conn = mysqli_connect($servidor,$usuariodb,$passdb,$db);
if(isset($conn)){
    echo "Conexion establecida";
}
mysqli_close($conn);
?>