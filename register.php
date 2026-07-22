<?php

require_once "config/conexion.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ============================
    // RECIBIR LOS DATOS DEL FORMULARIO
    // ============================
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = $_POST['password'];
    $confirmar_password = $_POST['confirmar_password'];

    // ============================
    // VALIDAR CONTRASEÑAS
    // ============================
    if ($password != $confirmar_password) {

        $mensaje = "<div class='alert alert-danger'>
                        Las contraseñas no coinciden.
                    </div>";

    } else {

        // ============================
        // VERIFICAR SI EL CORREO YA EXISTE
        // ============================
        $sql = "SELECT id FROM usuarios WHERE correo = ?";

        $stmt = $conexion->prepare($sql);

        $stmt->bind_param("s", $correo);

        $stmt->execute();

        $stmt->store_result();

        if ($stmt->num_rows > 0) {

            $mensaje = "<div class='alert alert-warning'>
                            Este correo ya está registrado.
                        </div>";

        } else {

            // ============================
            // CIFRAR CONTRASEÑA
            // ============================
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // ============================
            // GUARDAR USUARIO
            // ============================
            $sql = "INSERT INTO usuarios
                    (nombre, correo, password, rol, foto)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = $conexion->prepare($sql);

            $rol = "estudiante";
            $foto = "default.png";

            $stmt->bind_param(
                "sssss",
                $nombre,
                $correo,
                $passwordHash,
                $rol,
                $foto
            );

            if ($stmt->execute()) {

                $mensaje = "<div class='alert alert-success'>
                                Usuario registrado correctamente.
                            </div>";

            } else {

                $mensaje = "<div class='alert alert-danger'>
                                Error al registrar el usuario.
                            </div>";

            }

        }

    }

}

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro | LectoSmart</title>

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

        <div class="col-md-6">

            <div class="card shadow p-4">

              <?php echo $mensaje; ?>

                <div class="text-center mb-4">

                    <h2>📚 LectoSmart</h2>

                    <p class="text-muted">
                        Crear una cuenta
                    </p>

                </div>

                <form action="" method="POST">

                    <!-- Nombre -->

                    <div class="mb-3">

                        <label class="form-label">
                            Nombre completo
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="nombre"
                            placeholder="Ingrese su nombre completo"
                            required>

                    </div>

                    <!-- Correo -->

                    <div class="mb-3">

                        <label class="form-label">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            name="correo"
                            placeholder="ejemplo@correo.com"
                            required>

                    </div>

                    <!-- Contraseña -->

                    <div class="mb-3">

                        <label class="form-label">
                            Contraseña
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            placeholder="********"
                            required>

                    </div>

                    <!-- Confirmar contraseña -->

                    <div class="mb-4">

                        <label class="form-label">
                            Confirmar contraseña
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            name="confirmar_password"
                            placeholder="********"
                            required>

                    </div>

                    <!-- Botón -->

                    <button
                        type="submit"
                        class="btn btn-primary w-100">

                        <i class="fas fa-user-plus"></i>

                        Registrarse

                    </button>

                </form>

                <div class="text-center mt-4">

                    ¿Ya tienes una cuenta?

                    <a href="login.php">

                        Iniciar sesión

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>