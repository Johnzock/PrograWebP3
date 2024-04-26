<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi galeria de imagenes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f7;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: gray;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin-left: 10px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            background-color: #333;
        }
        nav ul li a:hover {
            background-color: #555;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .gallery .image-container {
            position: relative;
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .gallery img:hover {
            transform: scale(1.05);
        }
        .image-info {
            display: none;
            position: absolute;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 5px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .image-info p {
            margin: 0;
        }

        .image-info.show {
            display: block;
        }
    </style>
</head>
<body>
    <header>
        <h1>Mi galeria</h1>
        <nav>
            <ul>
                <li><a href="ver_usuario.php">Usuario</a></li>
                <li><a href="upload.php">Subir imagen</a></li>
                <li><a href="signup.php">Registrar</a></li>
                <li><a href="modificarusuario.php">Modificar usuario</a></li>
                <li><a href="logout.php">Cerrar sesion</a></li>
            </ul>
        </nav>
    </header>

    <div class="gallery">
        <?php
        $ruta_imagenes = "imagenes/";
        $imagenes = opendir($ruta_imagenes);
        $hay_imagenes = false;
        if ($imagenes) {
            while ($imagen = readdir($imagenes)) {
                if (is_file($ruta_imagenes . $imagen) && getimagesize($ruta_imagenes . $imagen)) {
                    $tipo_archivo = pathinfo($ruta_imagenes . $imagen, PATHINFO_EXTENSION);
                    echo "<div class='image-container'>";
                    echo "<img src='$ruta_imagenes$imagen'>";
                    echo "<div class='image-info'>";
                    echo "<p>Nombre: $imagen</p>";
                    echo "<p>Tipo de archivo: $tipo_archivo</p>";
                    echo "</div>";
                    echo "</div>";
                    $hay_imagenes = true;
                }
            }
            closedir($imagenes);
        } else {
            echo "Error: al cargar carpeta de imagenes";
        }
        if (!$hay_imagenes) {
            echo "No hay imagenes aun. Sube la primera";
        }
        ?>
    </div>

    <script>
        var images = document.querySelectorAll('.image-container');
        images.forEach(function(image) {
            image.addEventListener('click', function() {
                this.querySelector('.image-info').classList.toggle('show');
            });
        });
    </script>
</body>
</html>
