<?php
session_start();

if(isset($_SESSION["usuario"])){

    $carpeta = "imagenes/";

    $usuario = $_SESSION["usuario"];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Imágenes de <?php echo $_SESSION["usuario"]; ?></title>
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
            #info-box {
                width: 300px;
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 20px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h2>Imágenes de <?php echo $_SESSION["usuario"]; ?></h2>
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
            <div id="info"></div>
        </div>

        <script>
            function mostrarInfo(archivo) {
                var info = obtenerInformacion(archivo);
                document.getElementById("info").innerHTML = info;
                document.getElementById("info-box").style.display = "block";
            }

            function obtenerInformacion(archivo) {
                var info = "Imagen: " + archivo + "<br>";
                info += "Subida por: <?php echo $_SESSION['usuario']; ?><br>";
                info += "Fecha de subida: 2024-04-26<br>";
                return info;
            }
        </script>
    </body>
    </html>
    <?php
}else{
    header("Location: index.php");
}
?>
