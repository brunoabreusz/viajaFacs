<?php

$url = isset($_GET['url']) ? $_GET['url'] : '';

switch ($url) {
    case 'home':
    case '':
        require 'Controller/InicioController.php';
        $controlador = new InicioController();
        $controlador->View();
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
        require '404.php';
}

?>
