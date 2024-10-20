<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends Controller
{
    public function index(): string
    {
        if (!empty($_SESSION)) {
            $this->redirect('/');
        }

        return $this->view('login');
    }

    /**
     * @return array<string, mixed>
     */
    public function login(): array
    {
        if ($_SESSION) {
            $this->redirect('/');
        }

        $email = $this->request['email'];
        $password = $this->request['password'];

        if (!isset($this->request['email']) || !isset($this->request['password'])) {
            return [
                'status_code' => 400,
                'message' => 'faltan datos',
            ];
        }

        $userDB = new UserModel();
        $user = $userDB->login($email);

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            return [
                'status_code' => 200,
                'message' => 'ok',
            ];
        } else {
            return [
                'status_code' => 401,
                'message' => 'email o contraseña incorrecta',
            ];
        }
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
        $this->redirect('/');
    }
}
