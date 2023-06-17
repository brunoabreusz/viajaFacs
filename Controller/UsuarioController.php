<?php
require_once "./Model/Usuario.php";
require_once './Model/conectionData.php';

class UsuarioController {
   public function cadastrarUsuario() {
       // Verifica se o email já está cadastrado
       $email = $_POST['email'];
       $usuario = new Usuario();
       if ($usuario->verificarEmailCadastrado($email)) {
           echo "<script>alert('O email já está cadastrado.');</script>";
           require "View/register.html";
           exit();
       }

       // Cria um objeto Usuário com os dados do formulário
       $user = new Usuario();
       $user->setCpf($_POST['cpf']);
       $user->setNome($_POST['nome']);
       $user->setDataNascimento($_POST['dataNascimento']);
       $user->setEmail($email);
       $user->setTelefone($_POST['telefone']);
       $user->setSenha($_POST['senha']);
       
       // Inclui o usuário no banco de dados
       $user->incluir();
   
       header('Location: /viajaFacs/login');
       exit(); 
   }

}