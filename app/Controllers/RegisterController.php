<?php

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends Controller
{
    public function index(): string
    {
        if (!empty($_SESSION)) {
            $this->redirect('/');
        }

        return $this->view('register');
    }

    /**
     * @return array
     */
    public function register(): array
    {
        if (!empty($_SESSION)) {
            $this->redirect('/');
        }

        if ($this->request['username'] == '' || $this->request['email'] == '' || $this->request['password'] == '') {
            http_response_code(400);
            return [
                'message' => 'Todos los campos son obligatorios',
            ];
        }

        if (!filter_var($this->request['email'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            return [
                'message' => 'El email no es valido',
            ];
        }

        $user = new UserModel();
        $userExists = $user->exists($this->request['email']);

        if ($userExists) {
            http_response_code(400);
            return [
                'message' => 'El email ya esta registrado',
            ];
        }

        return $user->insert(...$this->request);
    }
}
