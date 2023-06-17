<?php

require_once './Model/Usuario.php';

class ProfileController
{

    public function View()
    {
        session_start();

        // Verifica se o usuário está logado
        if (isset($_SESSION['email'])) {

            // Recupera os dados do usuário
            $usuario = new Usuario();
            $usuario->obterDadosDoUsuario();

            // Exibe os dados do usuário na página
            require "View/user_path/myprofile.php";
        } else {
            header('Location: index.php?url=login');
            exit();
        }
    }


    public function updateProfile()
    {
        session_start(); 

        // Verifica se o usuário está logado
        if (isset($_SESSION['email'])) {
            // Recupera os dados do usuário do formulário
            $cpf = $_POST['cpf'];
            $nome = $_POST['nome'];
            $dataNascimento = $_POST['dataNascimento'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];

            // Cria um objeto Usuário com os dados atualizados
            $usuario = new Usuario();
            $usuario->setCpf($cpf);
            $usuario->setNome($nome);
            $usuario->setDataNascimento($dataNascimento);
            $usuario->setTelefone($telefone);
            $usuario->setSenha($senha);

            // Atualiza os dados do usuário no banco de dados
            $success = new Usuario();
            $success->updateDadosUsuario($usuario);

            if ($success) {
                $_SESSION['nome'] = $nome;
                header('Location: ../user/myprofile');
                exit();
            } else {
                header('Location: ../404');
                exit();
            }
        } else {
            header('Location: index.php?url=login');
            exit();
        }
    }

}
