<?php

require_once './Model/Pagamento.php';
class CheckoutController
{
    public function Checkout()
    {
        $idPassagemAerea = isset($_POST['ida']) ? $_POST['ida'] : null;
        $idPassagemAereaV = isset($_POST['volta']) ? $_POST['volta'] : null;
    
        $meuVoo = new Pagamento();
    
        $listaVooIda = $idPassagemAerea ? $meuVoo->voosPagamento($idPassagemAerea) : null;
        $listaVooVolta = $idPassagemAereaV ? $meuVoo->voosPagamento($idPassagemAereaV) : null;
    
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }
    
        require "View/checkout.php";
    }
    
}