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
        $controller = new CadastroController();
        $controller->View();
        break;
    case 'register':
        require 'Controller/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->Usuario();
        break;
    case 'login':
        require 'Controller/LoginController.php';
        $controller = new LoginController();
        $controller->Login();
        break;
    case 'user':
        require 'Controller/UserController.php';
        $controlador = new UserController();
        $controlador->Logar();
        break;
    default:
        require 'View/404.html';
}
