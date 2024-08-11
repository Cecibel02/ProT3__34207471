<?php
// Conecta a la base de datos y obtén los datos necesarios
// ...

// Procesa los datos del formulario y crea un nuevo usuario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];
$perfil_id = $_POST['perfil_id'];

// Inserta los datos del usuario en la base de datos
// ...

// Redirige al usuario a la página de inicio de sesión
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . '/';
header('Location: ' . $base_url . 'index.php?controller=usuario&action=login');
exit();