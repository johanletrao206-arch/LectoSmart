<?php
require_once "config/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LectoSmart</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- ==========================
         MENÚ DE NAVEGACIÓN
    =========================== -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                📚 LectoSmart
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Proyecto</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#informacion">Información</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-light ms-3" href="login.php">
                            Iniciar sesión
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- ==========================
         HERO
    =========================== -->

    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1>Aprender a leer nunca fue tan divertido.</h1>

                    <p>
                        LectoSmart es una plataforma educativa diseñada para fortalecer la comprensión lectora mediante actividades interactivas, juegos y seguimiento del progreso.
                    </p>

                    <a href="register.php" class="btn btn-primary btn-lg">
                        Comenzar Ahora
                    </a>

                </div>

                <div class="col-lg-6 text-center">

                    <img src="assets/img/hero.png" class="img-fluid" alt="LectoSmart">

                </div>

            </div>

        </div>

    </section>

    <!-- ==========================
         SOBRE EL PROYECTO
    =========================== -->

    <section id="sobre">

        <div class="container">

            <p class="section-tag">
                Sobre el proyecto
            </p>

            <h2 class="section-title">
                Transformando la lectura en una experiencia interactiva
            </h2>

            <p class="section-lead">
                LectoSmart es una plataforma web educativa diseñada para fortalecer las habilidades lectoras de estudiantes mediante el uso de herramientas digitales innovadoras, actividades interactivas y estrategias de gamificación. Nuestro propósito es convertir el aprendizaje de la lectura en una experiencia dinámica, motivadora y accesible para todos.
            </p>

            <p class="section-lead">
                La plataforma ofrece ejercicios de comprensión lectora, reconocimiento de palabras, fluidez, interpretación de textos y seguimiento del progreso de cada estudiante. Además, proporciona a los docentes herramientas que facilitan el monitoreo del desempeño de sus alumnos, permitiendo identificar fortalezas y aspectos que requieren refuerzo.
            </p>

            <p class="section-lead">
                Con un diseño moderno, intuitivo y adaptable a cualquier dispositivo, LectoSmart busca apoyar el proceso educativo mediante el uso de la tecnología, promoviendo una educación más inclusiva y personalizada.
            </p>

            <p style="font-size:0.85rem;">
                Danna Valentina Ramirez Hernandez<br>
                Aileen Celeste Guevara Castillo<br>
                I.E.T. Valle de Tenza · Especialidad Multimedia
            </p>

        </div>

    </section>

    <!-- ==========================
         MISIÓN Y VISIÓN
    =========================== -->

    <section id="informacion">

        <div class="container">

            <div class="obj-grid">

                <div class="obj-card">

                    <h3 class="obj-title">
                        Nuestra misión
                    </h3>

                    <p class="obj-text">
                        Brindar una plataforma educativa innovadora que fortalezca las habilidades lectoras de los estudiantes mediante actividades interactivas, recursos digitales y herramientas de seguimiento, contribuyendo al desarrollo académico y al acompañamiento docente.
                    </p>

                </div>

                <div class="obj-card">

                    <h3 class="obj-title">
                        Nuestra visión
                    </h3>

                    <p class="obj-text">
                        Ser una plataforma líder en el fortalecimiento de la comprensión lectora, reconocida por su innovación tecnológica y por contribuir al mejoramiento de los procesos educativos en instituciones de enseñanza.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- ==========================
         FOOTER
    =========================== -->

    <footer>

        <p>
            © 2026 LectoSmart | Proyecto de Grado
        </p>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>