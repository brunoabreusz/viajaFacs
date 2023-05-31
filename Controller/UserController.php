<?php

class UserController{
    public function Logar() {
        // Verifica se o usuário está autenticado
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        require 'View/user.php';
    }
}
