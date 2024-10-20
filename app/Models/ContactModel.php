<?php

namespace App\Models;

class ContactModel extends Model
{
    public $table = 'contacts';

    /**
     * Create a new contact
     *
     * @param string $name
     * @param string $email
     * @param string $phone
     * @return array
     */
    public function create(string $name, string $email, string $phone): array
    {
        try {
            $this->prepare("INSERT INTO $this->table (name, email, phone) VALUES (?, ?, ?)", [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'user_id' => $_SESSION['id'],
            ]);

            return [
                'status' => 'success',
                'message' => 'Contacto creado exitosamente',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }
}
