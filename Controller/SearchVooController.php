<?php

require_once "./Model/PassagemAerea.php";

class SearchVooController
{
    public function SearchVoo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $passagem = $_POST['passagem'];

            if ($passagem === 'idaVolta') {
                $origem = $_POST['origem'];
                $destino = $_POST['destino'];

                $cidadesPermitidas = array('Belo Horizonte', 'Salvador', 'Rio de Janeiro', 'São Paulo');

                if (in_array($origem, $cidadesPermitidas) && in_array($destino, $cidadesPermitidas)) {
                    $meuVoo = new PassagemAerea();
                    $meuVoo->setOrigem($origem);
                    $meuVoo->setDestino($destino);
                    $listaVoo = $meuVoo->pesqVoos();

                    session_start();
                    if (!isset($_SESSION['email'])) {
                        header('Location: index.php?url=login');
                        exit();
                    }

                    if (!empty($listaVoo)) {
                        // Chamar a função pesqVoosInvert() do modelo PassagemAerea passando a lista de voos
                        $meuVooInvert = new PassagemAerea();
                        $meuVooInvert->setOrigem($destino); // Inverte origem e destino
                        $meuVooInvert->setDestino($origem); // Inverte origem e destino
                        $listaVooInvertida = $meuVooInvert->pesqVoos();
                    } else {
                        // Caso não haja voos, atribuir uma lista vazia
                        $listaVooInvertida = [];
                    }

                    require 'View/tickets.php';
                } else {
                    header('Location: /viajaFacs/searchVooError');
                    exit();
                }
            }
        } elseif ($passagem === 'ida') {
            $origem = $_POST['origem'];
            $destino = $_POST['destino'];

            $cidadesPermitidas = array('Belo Horizonte', 'Salvador', 'Rio de Janeiro', 'São Paulo');

            if (in_array($origem, $cidadesPermitidas) && in_array($destino, $cidadesPermitidas)) {
                $meuVoo = new PassagemAerea();
                $meuVoo->setOrigem($origem);
                $meuVoo->setDestino($destino);
                $listaVoo = $meuVoo->pesqVoos();

                session_start();
                if (!isset($_SESSION['email'])) {
                    header('Location: index.php?url=login');
                    exit();
                }

                require 'View/ticket.php';
            } else {
                header('Location: /viajaFacs/searchVooError');
                exit();
            }
        }
    }


    public function SearchVooError()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: index.php?url=login');
            exit();
        }

        require 'View/ticketsError.html';
    }
}
