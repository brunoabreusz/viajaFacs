<?php

$url = isset($_GET['url']) ? $_GET['url'] : '';

switch ($url) {
    case 'home':
    case '':
        require 'Controller/InicioController.php';
        $controlador = new InicioController();
        $controlador->View();
        break;
    case 'cadastro':
        require 'Controller/CadastroController.php';
        $controlador = new CadastroController();
        $controlador->View();
        break;
    case 'register':
        require 'Controller/UsuarioController.php';
        $controlador = new UsuarioController();
        $controlador->Usuario();
        break;
    case 'login':
        require 'Controller/LoginController.php';
        $controlador = new LoginController();
        $controlador->Login();
        break;
    case 'user':
        require 'Controller/UserController.php';
        $controlador = new UserController();
        $controlador->Logar();
        break;
    case 'user/myprofile':
        require 'Controller/ProfileController.php';
        $controlador = new ProfileController();
        $controlador->View();
        break;
    case 'user/editprofile':
        require 'Controller/ProfileController.php';
        $controlador = new ProfileController();
        $controlador->View();
        break;
    case 'logout':
        require 'Controller/LogoutController.php';
        $controlador = new LogoutController();
        $controlador->Logout();
        break;
    default:
        require 'View/404.html';
}
