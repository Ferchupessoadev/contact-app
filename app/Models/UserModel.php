<?php

namespace App\Models;

class UserModel extends Model
{
    public function exists(string $email): bool
    {
        $params = [
            's' => $email
        ];

        $user = $this->prepare('SELECT id FROM users WHERE email = ?', $params)->first();

        return $user ? true : false;
    }

    /**
     * @param string $username
     * @param string $email
     * @param string $password
     * @return array
     */
    public function insert(string $username, string $email, string $password): array
    {
        $password = password_hash($password, PASSWORD_BCRYPT);

        $params = [
            $username,
            $email,
            $password
        ];

        try {
            $this->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)', $params);
            return ['message' => 'Cuenta creada con exito'];
        } catch (\Exception $e) {
            return [
                'message' => 'Error al crear la cuenta, vuelve mas tarde',
                'error' => $e->getMessage()
            ];
        }
    }

    public function login(string $email): array
    {
        $params = [
            's' => $email
        ];

        $user = $this->prepare('SELECT * FROM users WHERE email = ? LIMIT 1', $params)->first();

        if (!$user) {
            return [
                'message' => 'Email o contraseña incorrecta',
            ];
        }

        return $user;
    }
}
