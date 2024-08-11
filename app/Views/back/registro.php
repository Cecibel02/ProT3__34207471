<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "aguirre_cecilia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$perfil_id = $_POST['perfil_id'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO usuarios (nombre, apellido, usuario, email, pass, perfil_id)
        VALUES ('$nombre', '$apellido', '$usuario', '$email', '$password', $perfil_id)";

if ($conn->query($sql) === TRUE) {
    echo "Registro guardado correctamente";
} else {
    echo "Error al guardar el registro: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>