<?php

require_once "config/conexion.php";

session_start();

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST['correo']);
    $password = $_POST['password'];

    // Buscar usuario
    $sql = "SELECT * FROM usuarios WHERE correo = ?";

    $stmt = $conexion->prepare($sql);

    $stmt->bind_param("s", $correo);

    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {

        $usuario = $resultado->fetch_assoc();

    } else {

        $mensaje = "<div class='alert alert-danger'>
                        El correo no está registrado.
                    </div>";

    }
  if (password_verify($password, $usuario['password'])) {

    // Crear la sesión
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['correo'] = $usuario['correo'];
    $_SESSION['rol'] = $usuario['rol'];

    // Redireccionar al Dashboard
    header("Location: dashboard.php");
    exit();

} else {

    $mensaje = "<div class='alert alert-danger'>
                    Contraseña incorrecta.
                </div>";

}

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar Sesión | LectoSmart</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow p-4">

                <?php echo $mensaje; ?>

                <div class="text-center mb-4">

                    <h2>📚 LectoSmart</h2>

                    <p class="text-muted">
                        Iniciar Sesión
                    </p>

                </div>

                <form action="" method="POST">

                    <div class="mb-3">

                        <label class="form-label">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            name="correo"
                            class="form-control"
                            placeholder="ejemplo@correo.com"
                            required>

                    </div>

                    <div class="mb-4">

                        <label class="form-label">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="********"
                            required>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        <i class="fas fa-sign-in-alt"></i>

                        Iniciar Sesión

                    </button>

                </form>

                <div class="text-center mt-4">

                    ¿No tienes cuenta?

                    <a href="register.php">
                        Regístrate
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>