<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de imagenes</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-family: "Verdana";
        background: gray;
        color: white;
    }
    img {
        width: 50vw;
        border-radius: 10px;
    }
</style>
<body>
    <h1>Mi galeria de Imagenes</h1>
    <?php
        $ruta_imagenes = "archivos/";
        $imagenes = opendir( $ruta_imagenes );

        while( $imagen = readdir( $imagenes ) ) {
            if ( is_file( $ruta_imagenes . $imagen ) && getimagesize( $ruta_imagenes . $imagen ))
            {
                echo "<img src= '$ruta_imagenes$imagen'>";
            } 
        }
        closedir( $imagenes );
    ?>
</body>
</html>