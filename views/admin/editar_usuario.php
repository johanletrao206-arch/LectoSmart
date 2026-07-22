<?php

session_start();
require_once "../../config/conexion.php";

if (!isset($_SESSION['id']) || $_SESSION['rol'] != "admin") {
    header("Location: ../../login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: usuarios.php");
    exit();
}

$id = $_GET['id'];

// Buscar el usuario
$sql = "SELECT * FROM usuarios WHERE id = ?";

$stmt = $conexion->prepare($sql);

$stmt->bind_param("i", $id);

$stmt->execute();

$resultado = $stmt->get_result();

$usuario = $resultado->fetch_assoc();

$mensaje = "";

// Actualizar
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $rol = $_POST['rol'];

    $sql = "UPDATE usuarios
            SET nombre = ?, correo = ?, rol = ?
            WHERE id = ?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param(
        "sssi",
        $nombre,
        $correo,
        $rol,
        $id
    );

    if ($stmt->execute()) {

        header("Location: usuarios.php");
        exit();

    } else {

        $mensaje = "<div class='alert alert-danger'>
                        Error al actualizar.
                    </div>";

    }

}

?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Usuario</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>Editar Usuario</h3>

</div>

<div class="card-body">

<?= $mensaje ?>

<form method="POST">

<div class="mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
value="<?= htmlspecialchars($usuario['nombre']) ?>"
required>

</div>

<div class="mb-3">

<label>Correo</label>

<input
type="email"
name="correo"
class="form-control"
value="<?= htmlspecialchars($usuario['correo']) ?>"
required>

</div>

<div class="mb-3">

<label>Rol</label>

<select name="rol" class="form-select">

<option value="admin" <?= $usuario['rol']=="admin" ? "selected" : "" ?>>
Administrador
</option>

<option value="docente" <?= $usuario['rol']=="docente" ? "selected" : "" ?>>
Docente
</option>

<option value="estudiante" <?= $usuario['rol']=="estudiante" ? "selected" : "" ?>>
Estudiante
</option>

</select>

</div>

<button class="btn btn-warning">

Actualizar

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