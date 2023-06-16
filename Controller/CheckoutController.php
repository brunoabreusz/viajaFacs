<?php

require_once './Model/Pagamento.php';
require_once './Model/PassagemCliente.php';
require_once './Model/Usuario.php';

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

    public function PagamentoUser()
    {

        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        if (isset($_POST['idPassagemAerea']) && isset($_POST['idPassagemAereaV'])) {
            $idPassagemAerea = $_POST['idPassagemAerea'];
            $idPassagemAereaV = $_POST['idPassagemAereaV'];

            if (isset($_POST['primeiraClasse'])) {
                $valorSelecionado = $_POST['primeiraClasse'];
            } elseif (isset($_POST['precoEconomico'])) {
                $valorSelecionado = $_POST['precoEconomico'];
            }

            $pagamento1 = new Pagamento();
            $pagamento1->setIdPassagemAerea($idPassagemAerea);
            $pagamento1->setValorPagamento($valorSelecionado);

            $pagamento2 = new Pagamento();
            $pagamento2->setIdPassagemAerea($idPassagemAereaV);
            $pagamento2->setValorPagamento($valorSelecionado);

            $idUsuario = $_SESSION['idUsuario'];

            $pagamento1->buy($idUsuario);
            $pagamento2->buy($idUsuario);
            
            header('Location: user');

        } elseif (isset($_POST['idPassagemAerea'])) {
            $idPassagemAerea = $_POST['idPassagemAerea'];

            if (isset($_POST['primeiraClasse'])) {
                $valorSelecionado = $_POST['primeiraClasse'];
            } elseif (isset($_POST['precoEconomico'])) {
                $valorSelecionado = $_POST['precoEconomico'];
            }

            $pagamento = new Pagamento();
            $pagamento->setIdPassagemAerea($idPassagemAerea);
            $pagamento->setValorPagamento($valorSelecionado);

            $idUsuario = $_SESSION['idUsuario'];

            $pagamento->buy($idUsuario);

            header('Location: user');
        }
    }
}
