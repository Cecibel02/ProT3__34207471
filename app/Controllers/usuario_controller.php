<?php
class UsuarioController {
    // Listar usuarios
    public function listarUsuarios() {
        $usuarios = usuario::obtenerTodos();
        include 'vistas/usuarios/listar.php';
    }

    // Agregar usuario
    public function agregarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $perfil_id = $_POST['perfil_id'];

            // Verificar que la contraseña tenga mayúsculas y minúsculas
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])/', $password)) {
                $error = 'La contraseña debe contener al menos una letra mayúscula y una minúscula.';
                include 'vistas/usuarios/agregar.php';
                return;
            }

            $usuario = new usuario();
            $usuario->nombre = $nombre;
            $usuario->apellido = $apellido;
            $usuario->usuario = $usuario;
            $usuario->email = $email;
            $usuario->password = $password;
            $usuario->perfil_id = $perfil_id;
            $usuario->baja = 'NO';
            $usuario->guardar();

            header('Location: index.php?controller=usuario&action=listarUsuarios');
        } else {
            $perfiles = Perfil::obtenerTodos();
            include 'vistas/usuarios/agregar.php';
        }
    }

    // Editar usuario
    public function editarUsuario($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $perfil_id = $_POST['perfil_id'];

            // Verificar que la contraseña tenga mayúsculas y minúsculas
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])/', $password)) {
                $error = 'La contraseña debe contener al menos una letra mayúscula y una minúscula.';
                $usuario = Usuario::obtenerPorId($id);
                $perfiles = Perfil::obtenerTodos();
                include 'vistas/usuarios/editar.php';
                return;
            }

            $usuario = Usuario::obtenerPorId($id);
            $usuario->nombre = $nombre;
            $usuario->apellido = $apellido;
            $usuario->usuario = $usuario;
            $usuario->email = $email;
            $usuario->password = $password;
            $usuario->perfil_id = $perfil_id;
            $usuario->actualizar();

            header('Location: index.php?controller=usuario&action=listarUsuarios');
        } else {
            $usuario = Usuario::obtenerPorId($id);
            $perfiles = Perfil::obtenerTodos();
            include 'vistas/usuarios/editar.php';
        }
    }

    // Eliminar usuario
    public function eliminarUsuario($id) {
        $usuario = Usuario::obtenerPorId($id);
        $usuario->baja = 'SI';
        $usuario->actualizar();

        header('Location: index.php?controller=usuario&action=listarUsuarios');
    }
}