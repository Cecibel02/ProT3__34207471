<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuario_Model;
use Adeas\Auth\Authentication\AuthenticationBase;

class panel_controller extends BaseController
{
    private $usuarioModel;
    private $auth;

    public function __construct(usuario_Model $usuarioModel, AuthenticationBase $auth)
    {
        $this->usuarioModel = $usuarioModel;
        $this->auth = $auth;
    }

    public function index()
    {
        if (!$this->auth->check()) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'usuariosActivos' => $this->usuarioModel->countActivesUsers(),
            'usuariosInactivos' => $this->usuarioModel->countInactiveUsers(),
            'totalUsuarios' => $this->usuarioModel->countAllUsers(),
        ];

        return view('vistas/panel/index', $data);
    }

    public function desactivarUsuario($id)
    {
        if (!$this->auth->check()) {
            return redirect()->to(base_url('login'));
        }

        $usuario = $this->usuarioModel->find($id);

        if ($usuario) {
            if ($usuario->baja === 'NO') {
                $this->usuarioModel->update($id, ['baja' => 'SI']);
                $this->session->setFlashdata('success', 'Usuario desactivado exitosamente.');
            } else {
                $this->session->setFlashdata('error', 'El usuario ya se encuentra desactivado.');
            }
        } else {
            $this->session->setFlashdata('error', 'El usuario no existe.');
        }

        return redirect()->to(base_url('panel'));
    }

    public function activarUsuario($id)
    {
        if (!$this->auth->check()) {
            return redirect()->to(base_url('login'));
        }

        $usuario = $this->usuarioModel->find($id);

        if ($usuario) {
            if ($usuario->baja === 'SI') {
                $this->usuarioModel->update($id, ['baja' => 'NO']);
                $this->session->setFlashdata('success', 'Usuario activado exitosamente.');
            } else {
                $this->session->setFlashdata('error', 'El usuario ya se encuentra activo.');
            }
        } else {
            $this->session->setFlashdata('error', 'El usuario no existe.');
        }

        return redirect()->to(base_url('panel'));
    }
}