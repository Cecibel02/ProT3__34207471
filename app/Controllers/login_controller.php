<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;

class Login_Controller extends BaseController
{
    private $usuarioModel;

    public function __construct(usuario_Model $usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
    }

    public function index()
    {
        helper(['form', 'url']);
        return $this->showLoginForm();
    }

    public function showLoginForm()
    {
        return view('vistas/login/login');
    }

    public function auth()
    {
        if ($this->request->getMethod() === 'post') {
            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');

            $usuarioObj = $this->usuarioModel->obtenerPorUsuario($usuario);

            if ($usuarioObj && $usuarioObj->baja === 'NO' && $this->verifyPassword($password, $usuarioObj->pass)) {
                $this->session->set([
                    'usuario_id' => $usuarioObj->id_usuario,
                    'usuario_nombre' => $usuarioObj->nombre,
                    'usuario_apellido' => $usuarioObj->apellido,
                    'usuario_perfil' => $usuarioObj->perfil_id,
                    'logged_in' => TRUE
                ]);

                return redirect()->to(base_url('usuario/listarUsuarios'));
            } else {
                $data['error'] = 'Usuario o contraseña incorrectos.';
                return view('vistas/login/login', $data);
            }
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('login'));
    }

    private function verifyPassword($password, $hashedPassword)
    {
        return password_verify($password, $hashedPassword);
    }
}