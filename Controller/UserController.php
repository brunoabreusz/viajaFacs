<?php

require_once './Model/PassagemCliente.php';
require_once './Model/Reclamacao.php';

class UserController
{
    public function Logar()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        $idUsuario = $_SESSION['idUsuario'];
        $passagemCliente = new PassagemCliente();
        $passagens = $passagemCliente->passagens($idUsuario);

        require 'View/user.php';
    }

    public function checkIn()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        $idUsuario = $_SESSION['idUsuario'];
        $passagemCliente = new PassagemCliente();
        $passagens = $passagemCliente->passagens($idUsuario);

        require 'View/user_path/checkin.php';
    }

    public function alterarStatusCheckin()
    {
        $idPassagem = $_POST['idPassagem'];
        $checkin = new PassagemCliente();
        $checkin->alterarStatusCheckin($idPassagem);

        header('Location: ../user');
    }

    public function alterarStatusCancelamento()
    {
        $idPassagem = $_POST['idPassagem'];
        $cancelamento = new PassagemCliente();
        $cancelamento->alterarStatusCancelamento($idPassagem);

        header('Location: ../user');
    }


    public function centerHelp()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        $idUsuario = $_SESSION['idUsuario'];
        $passagemCliente = new PassagemCliente();
        $passagens = $passagemCliente->passagens($idUsuario);
        
        $reclamacao = new Reclamacao();
        $reclamacoes = $reclamacao->consultarReclamacao($idUsuario);
        
        require 'View/user_path/centerhelp.php';
    }

    public function centerHelpInsert()
    {
        $idUsuario = $_POST['idUsuario'];
        $comentarioUsuario = $_POST['comentarioUsuario'];

        $passagemCliente = new PassagemCliente();
        $passagens = $passagemCliente->passagens($idUsuario);

        $reclamacao = new Reclamacao();
        $reclamacao->inserirReclamacao($idUsuario, $comentarioUsuario);

        $reclamacoes = $reclamacao->consultarReclamacao($idUsuario);

        header('Location: ../user');
    }

    public function cancellation()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        $idUsuario = $_SESSION['idUsuario'];
        $passagemCliente = new PassagemCliente();
        $passagens = $passagemCliente->passagens($idUsuario);

        require 'View/user_path/cancellation.php';
    }
}
