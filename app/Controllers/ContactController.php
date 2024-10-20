<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends Controller
{
    /**
     * Create a new contact
     *
     * @return array<string, mixed>
     */
    public function create(): array
    {
        $name = $this->request['name'];
        $email = $this->request['email'];
        $phone = $this->request['phone'];

        if (empty($name) || empty($email) || empty($phone)) {
            return [
                'status' => 'error',
                'message' => 'Todos los campos son obligatorios',
            ];
        }

        $Contact = new ContactModel();
        return $Contact->create($name, $email, $phone);
    }

    // public function edit(): array {}
    //
    // public function delete(): array {}
    //
    // public function index(): array {}
}
