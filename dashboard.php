<?php

session_start();

// Si el usuario no ha iniciado sesión
if (!isset($_SESSION['id'])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h2>
                Bienvenido,
                <?php echo $_SESSION['nombre']; ?> 👋
            </h2>

            <hr>

            <p>

                <strong>Correo:</strong>

                <?php echo $_SESSION['correo']; ?>

            </p>

            <p>

                <strong>Rol:</strong>

                <?php echo ucfirst($_SESSION['rol']); ?>

            </p>

            <a href="logout.php" class="btn btn-danger">

                Cerrar sesión

            </a>

        </div>

    </div>

</div>

</body>

</html>