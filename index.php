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
        $controlador->cadastrarUsuario();
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
        require 'Controller/EditprofileController.php';
        $controlador = new EditprofileController();
        $controlador->View();
        break;
    case 'user/update':
        require 'Controller/ProfileController.php';
        $controlador = new ProfileController();
        $controlador->updateProfile();
        break;
    case 'user/checkin':
        require 'Controller/UserController.php';
        $controlador = new UserController();
        $controlador->checkIn();
        break;
    case 'user/centerhelp':
        require 'Controller/UserController.php';
        $controlador = new UserController();
        $controlador->centerHelp();
        break;
    case 'user/cancellation':
        require 'Controller/UserController.php';
        $controlador = new UserController();
        $controlador->cancellation();
        break;
    case 'searchVoo':
        require 'Controller/SearchVooController.php';
        $controlador = new SearchVooController();
        $controlador->SearchVoo();
        break;
    case 'searchVooError':
        require 'Controller/SearchVooController.php';
        $controlador = new SearchVooController();
        $controlador->SearchVooError();
        break;
    case 'checkout':
        require 'Controller/CheckoutController.php';
        $controlador = new CheckoutController();
        $controlador->Checkout();
        break;
    case 'logout':
        require 'Controller/LogoutController.php';
        $controlador = new LogoutController();
        $controlador->Logout();
        break;
    default:
        require 'Controller/ErrorController.php';
        $controlador = new ErrorController();
        $controlador->View();
        break;
}
