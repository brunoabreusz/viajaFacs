<?php 
require_once "./Model/Usuario.php";

class UsuarioController{
   public function Usuario(){
   // Atribui os valores no banco de dados:
   $user = new Usuario();
   $user->setCpf($_POST['cpf']);
   $user->setNome($_POST['nome']);
   $user->setDataNascimento($_POST['dataNascimento']);
   $user->setEmail($_POST['email']);
   $user->setTelefone($_POST['telefone']);
   $user->setSenha($_POST['senha']);
   $user->incluir();
   
   header('Location: /viajaFacs/login');
   exit(); 
   }
}
