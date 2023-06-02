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

    public function checkIn() {
        // Verifica se o usuário está autenticado
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        require 'View/user_path/checkin.php';
    }

    public function centerHelp() {
        // Verifica se o usuário está autenticado
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        require 'View/user_path/centerhelp.php';
    }

    public function cancellation() {
        // Verifica se o usuário está autenticado
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        require 'View/user_path/cancellation.php';
    }
}
