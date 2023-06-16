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
                $dadosUsuario = $this->obterDadosUsuarioDoBancoDeDados($email, $senha);
                if ($dadosUsuario) {
                    $idUsuario = $dadosUsuario['idUsuario'];
                    $nome = $dadosUsuario['nome'];
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['idUsuario'] = $idUsuario; // Adiciona o ID do usuário à sessão
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

    public function obterDadosUsuarioDoBancoDeDados($email, $senha)
    {
        $conn = Data::conectar();

        $query = "SELECT idUsuario, nome FROM usuario WHERE email = :email AND senha = :senha";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result) {
            $dadosUsuario = [
                'idUsuario' => $result['idUsuario'],
                'nome' => $result['nome']
            ];
            return $dadosUsuario;
        } else {
            return null; // Usuário não encontrado
        }
    }
}
