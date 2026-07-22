<?php

session_start();
require_once "../../config/conexion.php";

// Verificar que haya iniciado sesión
if (!isset($_SESSION['id']) || $_SESSION['rol'] != "admin") {
    header("Location: ../../login.php");
    exit();
}

// Consultar todos los usuarios
$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gestión de Usuarios</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>


<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <i class="fas fa-users"></i>
            Gestión de Usuarios
        </h2>

        <a href="dashboard.php" class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Volver

        </a>

        <a href="crear_usuario.php" class="btn btn-success mb-3">
    <i class="fas fa-user-plus"></i>
    Nuevo Usuario
</a>

    </div>

    <table class="table table-bordered table-hover shadow">

        <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Nombre</th>

                <th>Correo</th>

                <th>Rol</th>

                <th>Foto</th>

                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

        <?php while($usuario = $resultado->fetch_assoc()){ ?>

            <tr>

                <td><?php echo $usuario['id']; ?></td>

                <td><?php echo $usuario['nombre']; ?></td>

                <td><?php echo $usuario['correo']; ?></td>

                <td><?php echo ucfirst($usuario['rol']); ?></td>

                <td>

                    <img
                        src="../../assets/img/<?php echo $usuario['foto']; ?>"
                        width="50"
                        height="50"
                        style="border-radius:50%;">

                </td>

                <td>

                    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>"
   class="btn btn-warning btn-sm">

    <i class="fas fa-edit"></i>

</a>

                    </button>

                    <button class="btn btn-danger btn-sm">

                        <i class="fas fa-trash"></i>

                    </button>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>

</html>