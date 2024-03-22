<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Johan Solano Tapia - CV</title>
    <link rel="stylesheet" href="Portafolio.css">

</head>
<body>
    <header>
        <h1>Acerca de mi</h1>
    </header>
    
    <section class="textbox">
        <section class="box">
            <article class="lista">
                <h2>Sobre mi</h2>
                <ul>
                    <p><strong>Objetivo Profesional:</strong> Estudiante de la carrera de "Ingenieria en Software" en la Universidad Politecnica de Lazaro Cardenas con una solida base en informatica adquirida durante mi tiempo en la Preparatoria "Conalep #035". Apasionado por el mundo de la tecnologia y comprometido a desarrollarme profesionalmente en el campo de la ingenieria de software, buscando oportunidades para aplicar mis habilidades y conocimientos en entornos desafiantes y dinamicos.</p>
                    <br>
                    <p><strong>Educacion:</strong> Ingenieria en Software Universidad Politecnica de Lazaro Cardenas Actualmente en el 5to cuatrimestre 
                    <br>
                    Cursos destacados: Programacion Orientada a Objetos, Desarrollo Web, Bases de Datos.
                    <br> 
                    Preparatoria Conalep #035
                    <br>
                    Especialidad en Informatica
                    <br>
                    Ano de Graduacion: 2022</p>
                    <br>
                    <p><strong>Experiencia Laboral:</strong> No tengo experiencia laboral formal, pero he participado en proyectos academicos y actividades extracurriculares relacionadas con la tecnologia.</p>
                    <br>
                    <p><strong>Habilidades:</strong> Lenguajes de Programacion: Java, Python, HTML, CSS, JavaScript. 
                    <br>
                    Bases de Datos: MySQL, PostgreSQL.
                    <br>
                    Conocimientos basicos de sistemas operativos Windows y Linux. Habilidades interpersonales y capacidad para trabajar en equipo.
                    <br>
                    Autodidacta y capacidad para aprender nuevas tecnologias rapidamente.</p>
                    <br>
                    <p><strong>Idiomas:</strong> Espanol (nativo) <br> Ingles (nivel intermedio)</p>
                    <br>
                    <p><strong>Intereses:</strong> Desarrollo de software.<br>Tecnologias emergentes.<br>Contribuir a proyectos de codigo abierto.<br>Participar en eventos y conferencias tecnologicas.</p>
                </ul>
            </article>
            
            <article class="Fyo">
                <img src="Acerca.jpg" alt="Johan Solano">
            </article>
        </section>
        
        <section class="hbdad">
            <h2>Habilidades</h2>
            <form action="" method="get">
                <article class="hbox">
                    <button type="submit" name="skill" value="Css" class="button">CSS</button>
                    <button type="submit" name="skill" value="CV" class="button">CV</button>
                    <button type="submit" name="skill" value="Html" class="button">HTML</button>
                    <button type="submit" name="skill" value="Javascript" class="button">JavaScript</button>
                </article>
            </form>
            <div class="contenido-habilidad">
                <?php
                if(isset($_GET['skill'])) {
                    $skill_file = 'Habilidades/' . $_GET['skill'] . '.php';
                    if(file_exists($skill_file)) {
                        include($skill_file);
                    } else {
                        echo "No se encontró la habilidad solicitada.";
                    }
                }
                ?>
            </div>
        </section>
    </section>

    <section class="contact">
        <h2>Informacion de contacto</h2>
        <ul>
            <li><strong>Correo electronico: </strong> 309johan.solano.tapia.conalep@gmail.com</li>
            <li><strong>Telefono: </strong> (753) 130-2225</li>
            <li><strong>GitHub: </strong><a href="https://github.com/Johnzock">Johnzock</a></li>
        </ul>
    </section>
    <footer>
        <p>© 2024 Johan Solano Tapia - Portafolio</p>
    </footer>
</body>
</html>