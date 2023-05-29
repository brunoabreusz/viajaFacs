<?php

class UserController{
    public function Logar() {
        // Verifica se o usuário está autenticado
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        // Aqui você colocaria o código para exibir a página de dashboard ou outras funcionalidades da área restrita
        require 'View/user.php';
    }
}
