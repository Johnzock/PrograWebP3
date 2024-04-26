<?php
session_start();
if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subir archivos al servidor</title>
</head>
<body>
    <h1>subir archivos</h1>
    <h2><?php echo "Bienvenido, ".$_SESSION["usuario"]?></h2>
    <nav>
        <ul>
            <li>
                <a href="index.php">Ver Galeria</a>
            </li>
            <li>
                <a href="logout.php">Cerrar Sesion</a>
            </li>
        </ul>
    </nav>
    <form action="subir_archivos.php" enctype="multipart/form-data" method="post">
        <input type="file" name="archivo" id="">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
}else{
    header("Location: login.php");
}
?>