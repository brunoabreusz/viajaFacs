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

            $data = new Data();
            $conn = $data->conectar();

            $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            $result = $stmt->fetch();

            if ($result) {
                // Credenciais corretas
                session_start();
                $_SESSION['email'] = $email;
                header('Location: user');                
                exit();
            } else {
                // Credenciais inválidas
                header('Location: index.php?url=login&error=1');
                exit();
            }
        }

        require 'View/login.html';
    }
}

?>


