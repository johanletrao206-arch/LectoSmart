<?php

session_start();

if (!isset($_SESSION['id']) || $_SESSION['rol'] != "docente") {
    header("Location: ../../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>docente | LectoSmart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h1>Panel del docente</h1>

    <hr>

    <p><strong>Nombre:</strong> <?php echo $_SESSION['nombre']; ?></p>

    <p><strong>Correo:</strong> <?php echo $_SESSION['correo']; ?></p>

    <p><strong>Rol:</strong> <?php echo ucfirst($_SESSION['rol']); ?></p>

    <a href="../../logout.php" class="btn btn-danger">
        Cerrar sesión
    </a>

</div>

</body>
</html>