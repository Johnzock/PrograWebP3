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
    </style>
</head>
<body>
    <header>
        <h1>Mi galeria</h1>
        <nav>
            <ul>
                <li><a href="upload.php">Subir imagen</a></li>
                <li><a href="signup.php">Registrar</a></li>
                <li><a href="logout.php">Cerrar sesion</a></li>
                <li><a href="modificarusuario.php">Modificar usuario</a></li>
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
                    echo "<img src='$ruta_imagenes$imagen'>";
                    $hay_imagenes = true;
                }
            }
            closedir($imagenes);
        } else {
            echo "Error: al cargar carpeta de imagenes";
        }
        if (!$hay_imagenes) {
            echo "No hay imagenes aun. sube la primera";
        }
        ?>
    </div>
</body>
</html>