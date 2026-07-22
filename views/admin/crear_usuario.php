<?php

session_start();
require_once "../../config/conexion.php";

if (!isset($_SESSION['id']) || $_SESSION['rol'] != "admin") {
    header("Location: ../../login.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Verificar si el correo existe
    $sql = "SELECT id FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {

        $mensaje = "<div class='alert alert-warning'>
                        El correo ya existe.
                    </div>";

    } else {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $foto = "default.png";

        $sql = "INSERT INTO usuarios
        (nombre, correo, password, rol, foto)
        VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param(
            "sssss",
            $nombre,
            $correo,
            $passwordHash,
            $rol,
            $foto
        );

        if ($stmt->execute()) {

            header("Location: usuarios.php");
            exit();

        } else {

            $mensaje = "<div class='alert alert-danger'>
                            Error al crear el usuario.
                        </div>";

        }

    }

}

?>
<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Nuevo Usuario</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Nuevo Usuario</h3>

</div>

<div class="card-body">

<?= $mensaje ?>

<form method="POST">

<div class="mb-3">
<label>Nombre</label>
<input type="text" name="nombre" class="form-control" required>
</div>

<div class="mb-3">
<label>Correo</label>
<input type="email" name="correo" class="form-control" required>
</div>

<div class="mb-3">
<label>Contraseña</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Rol</label>

<select name="rol" class="form-select">

<option value="admin">Administrador</option>

<option value="docente">Docente</option>

<option value="estudiante">Estudiante</option>

</select>

</div>

<button class="btn btn-success">

Guardar Usuario

</button>

<a href="usuarios.php" class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

</div>

</div>

</body>
</html>