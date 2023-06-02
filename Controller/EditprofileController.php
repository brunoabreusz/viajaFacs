<?php

require_once './Model/conectionData.php';
require_once './Model/Usuario.php';

class EditprofileController
{

    public function View()
    {

        session_start();

        $usuario = $this->obterDadosDoUsuario();
        // Verifica se o usuário está logado
        if (isset($_SESSION['email'])) {
            require "View/user_path/editprofile.php";
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
}
