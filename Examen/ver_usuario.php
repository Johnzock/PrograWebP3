<?php
session_start();

if(isset($_SESSION["usuario"])){
    $carpeta = "imagenes/";
    $usuario = $_SESSION["usuario"];

    $archivoDatos = "datos_$usuario.txt";

    if(file_exists($archivoDatos)){
        $info = file_get_contents($archivoDatos);
    } else {

        $info = generarDatos($usuario, $carpeta);
        file_put_contents($archivoDatos, $info);
    }

    mostrarPagina($usuario, $carpeta, $info);
} else {
    header("Location: index.php");
}

function generarDatos($usuario, $carpeta){
    $info = "";
    $archivos = scandir($carpeta);

    foreach($archivos as $archivo){
        if(is_file($carpeta . $archivo)){
            if(strpos($archivo, $usuario . "_") !== false){
                $info .= "Imagen: " . $archivo . "<br>";
                $info .= "Subida por: $usuario <br>";
                $info .= "Fecha de subida: " . date('Y-m-d H:i:s', filemtime($carpeta . $archivo)) . "<br><br>";
            }
        }
    }
    return $info;
}

function mostrarPagina($usuario, $carpeta, $info){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imágenes de <?php echo $usuario; ?></title>
        <style>
            #gallery {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }
            .imagen {
                width: 100%;
                height: auto;
                border-radius: 8px;
                cursor: pointer;
                transition: transform 0.2s;
            }
            .imagen:hover {
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
        <h2>Imágenes de <?php echo $usuario; ?></h2>
        <div id="gallery">
            <?php
            $archivos = scandir($carpeta);
            foreach($archivos as $archivo){
                if(is_file($carpeta . $archivo)){
                    if(strpos($archivo, $usuario . "_") !== false){
                        echo "<img class='imagen' src='" . $carpeta . $archivo . "' alt='Imagen' onclick='mostrarInfo(\"$archivo\")'>";
                    }
                }
            }
            ?>
        </div>

        <div id="info-box" style="display: none;">
            <h3>Información de la imagen</h3>
            <div id="info"><?php echo $info; ?></div>
        </div>

        <script>
            function mostrarInfo(archivo) {
                document.getElementById("info-box").style.display = "block";
            }
        </script>
    </body>
    </html>
    <?php
}
?>
