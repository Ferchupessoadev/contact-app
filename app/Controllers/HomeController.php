<?php

namespace App\Controllers;

class HomeController extends Controller
{
    /**
     * method Index
     * @return string
     */
    public function index(): string
    {
        return $this->view('home');
    }
}
