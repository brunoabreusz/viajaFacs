<?php

require_once "conectionData.php";
require_once "PassagemAerea.php";
class Pagamento
{
    private $idPagamento;
    private $idPassagemAerea;
    private $metodoPagamento;
    private $valorPagamento;

    public function voosPagamento($idPassagemAerea = null, $idPassagemAereaV = null)
    {
        try {
            $conn = Data::conectar();

            $sql = $conn->prepare("SELECT p.idPassagemAerea, p.origem, p.destino, p.precoVooPrimeiraClasse, p.precoVooEconomico, p.dataHoraChegada, p.dataHoraSaida, p.assentos, c.nomeCompanhia 
            FROM passagem_aerea p 
            JOIN companhia_aerea c ON p.idCompanhiaAerea = c.idCompanhiaAerea 
            WHERE p.idPassagemAerea = :idPassagemAerea OR p.idPassagemAerea = :idPassagemAereaV");

            if ($idPassagemAerea) {
                $sql->bindParam(":idPassagemAerea", $idPassagemAerea);
            } else {
                $sql->bindParam(":idPassagemAerea", $idPassagemAereaV);
            }

            $sql->bindParam(":idPassagemAereaV", $idPassagemAereaV);
            $sql->execute();

            $listaVoo = array();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $voo = new PassagemAerea();
                $voo->setIdPassagemAerea($linha['idPassagemAerea']);
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setDataHoraChegada($linha['dataHoraChegada']);
                $voo->setDataHoraSaida($linha['dataHoraSaida']);
                $voo->setPrecoVooEconomico($linha['precoVooEconomico']);
                $voo->setPrecoVooPrimeiraClasse($linha['precoVooPrimeiraClasse']);
                $voo->setAssentos($linha['assentos']);
                $voo->setIdCompanhiaAerea($linha['nomeCompanhia']);
                $listaVoo[] = $voo;
            }

            return $listaVoo;
        } catch (PDOException $e) {
            echo "Falha na conexão: " . $e->getMessage();
            return null;
        }
    }


    public function getIdPagamento()
    {
        return $this->idPagamento;
    }

    public function setIdPagamento($idPagamento)
    {
        $this->idPagamento = $idPagamento;
    }

    public function getIdPassagemAerea()
    {
        return $this->idPassagemAerea;
    }

    public function setIdPassagemAerea($idPassagemAerea)
    {
        $this->idPassagemAerea = $idPassagemAerea;
    }

    public function getMetodoPagamento()
    {
        return $this->metodoPagamento;
    }

    public function setMetodoPagamento($metodoPagamento)
    {
        $this->metodoPagamento = $metodoPagamento;
    }

    public function getValorPagamento()
    {
        return $this->valorPagamento;
    }

    public function setValorPagamento($valorPagamento)
    {
        $this->valorPagamento = $valorPagamento;
    }
}
