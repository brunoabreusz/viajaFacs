<?php

require_once './Model/conectionData.php';

class LoginController
{
    public function Login()
    {
        // Verifica se o formulário foi enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            // $data = new Data();
            $conn = Data::conectar();

            $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            $result = $stmt->fetch();

            if ($result) {
                // Credenciais corretas
                $nome = $this->obterNomeUsuarioDoBancoDeDados($email, $senha);
                if ($nome) {
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['nome'] = $nome;
                    header('Location: user');
                    exit();
                } else {
                    header('Location: index.php?url=login&error=1');
                    exit();
                }
            } else {
                // Credenciais inválidas
                header('Location: index.php?url=login&error=1');
                exit();
            }
        }

        require 'View/login.html';
    }

    public function obterNomeUsuarioDoBancoDeDados($email, $senha)
    {
        // $data = new Data();
        $conn = Data::conectar();

        // Procura no banco de dados o email e a senha.
        $query = "SELECT nome FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result) {
            return $result['nome'];
        } else {
            return null; // Usuário não encontrado
        }
    }
}
