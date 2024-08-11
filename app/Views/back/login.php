<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$pass = "tu_contraseña";
$database = "aguirret_cecilia";

$conn = new mysqli($servername, $username, $pass, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST["tu_usuario"];
    $pass = $_POST[" tu_contraseña"];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios WHERE usuarios = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña (en un escenario real, se utilizaría hash de contraseñas)
        if ($password == $row["pass"]) {
            // Iniciar sesión del usuario
            $_SESSION["usuario"] = $perfil_id;
            $_SESSION["logged_in"] = true;

            // Redirigir al usuario a la página de bienvenida
            header("Location: welcome.php");
            exit();
        } else {
            // Mostrar mensaje de error
            $error_message = "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // Mostrar mensaje de error
        $error_message = "Nombre de usuario o contraseña incorrectos.";
    }

    $stmt->close();
}

$conn->close();
?>

<div class="container divLoginContainer">
    <div class="text-center mb-5"> 
        <h1 class="display-4">SynergyPath</h1>
        <p class="lead">Potenciando el éxito a través del trabajo en equipo</p>
    </div>

    <div class="card card-formulario-login">
        <div class="card-body">
            <h2 class="card-title">Inicio de Sesión</h2>
            <?php if(session()->has('errores')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach(session('errores') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>
            <form method="post" action="<?= base_url('/login') ?>">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Usuario</label>
                    <input name="usuario" type="text" class="form-control" id="loginEmail" placeholder="Nombre de usuario" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Contraseña</label>
                    <input name="password" type="password" class="form-control" id="loginPassword" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-success">Iniciar Sesión</button>
            </form>
            <p class='text-center p-3'>No tienes una cuenta ? <span><a href="/registro">Registrate</a></span></p>
        </div>
    </div>
</div>