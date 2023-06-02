<?php

require_once './Model/conectionData.php';
require_once './Model/Usuario.php';

class ProfileController
{

    public function View()
    {
        session_start();

        // Verifica se o usuário está logado
        if (isset($_SESSION['email'])) {

            // Recupera os dados do usuário
            $usuario = $this->obterDadosDoUsuario();

            // Exibe os dados do usuário na página
            require "View/user_path/myprofile.php";
        } else {
            header('Location: index.php?url=login');
            exit();
        }
    }

    private function obterDadosDoUsuario()
    {
        // Recupera o email do usuário da sessão
        $email = $_SESSION['email'];

        try {
            $query = "SELECT * FROM usuario WHERE email = :email";
            $conn = Data::conectar();
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Obtém os dados do usuário
            $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se os dados do usuário foram encontrados
            if ($usuarioData) {
                // Crie um objeto Usuário com os dados obtidos
                $usuario = new Usuario();
                $usuario->setCpf($usuarioData['cpf']);
                $usuario->setNome($usuarioData['nome']);
                $usuario->setDataNascimento($usuarioData['dataNascimento']);
                $usuario->setEmail($usuarioData['email']);
                $usuario->setTelefone($usuarioData['telefone']);
                $usuario->setSenha($usuarioData['senha']);
                return $usuario;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erro ao obter os dados do usuário: " . $e->getMessage();
            return null;
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
            $success = $this->updateDadosUsuario($usuario);

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

    private function updateDadosUsuario($usuario)
    {
        try {
            $conn = Data::conectar();

            $query = "UPDATE usuario SET cpf = :cpf, nome = :nome, dataNascimento = :dataNascimento, telefone = :telefone, senha = :senha WHERE email = :email";
            $stmt = $conn->prepare($query);

            // Vincula os parâmetros da consulta com os valores do objeto Usuario
            $stmt->bindValue(':cpf', $usuario->getCpf());
            $stmt->bindValue(':nome', $usuario->getNome());
            $stmt->bindValue(':dataNascimento', $usuario->getDataNascimento());
            $stmt->bindValue(':telefone', $usuario->getTelefone());
            $stmt->bindValue(':senha', $usuario->getSenha());
            $stmt->bindValue(':email', $_SESSION['email']);

            $stmt->execute();

            // Verifica se a atualização foi bem-sucedida
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false; 
            }
        } catch (PDOException $e) {
            echo "Erro ao atualizar os dados do usuário: " . $e->getMessage();
            return false;
        }
    }
    
}
