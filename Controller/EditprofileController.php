<?php

require_once './Model/Usuario.php';

class EditprofileController
{

    public function View()
    {
        session_start();
        $usuario = new Usuario();
        $usuario->obterDadosDoUsuario();

        // Verifica se o usuário está logado
        if (isset($_SESSION['email'])) {
            require "View/user_path/editprofile.php";
        } else {
            header('Location: index.php?url=login');
            exit();
        }
    }



    
}
