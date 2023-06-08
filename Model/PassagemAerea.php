<?php

require_once "conectionData.php";

class PassagemAerea
{
    private $idPassagemAerea;
    private $idCompanhiaAerea;
    private $origem;
    private $destino;
    private $dataHoraSaida;
    private $dataHoraChegada;
    private $assentos;
    private $precoVooEconomico;
    private $precoVooPrimeiraClasse;


    public function pesqVoos()
    {
        try {
            $conn = Data::conectar();

            $origem = $this->origem;
            $destino = $this->destino;

            $sql = $conn->prepare("SELECT p.origem, p.destino, p.precoVooPrimeiraClasse, p.precoVooEconomico, p.dataHoraChegada, p.dataHoraSaida, p.assentos, c.nomeCompanhia
            FROM passagem_aerea p JOIN companhia_aerea c ON p.idCompanhiaAerea = c.idCompanhiaAerea WHERE p.origem = :origem AND p.destino = :destino");

            $sql->bindParam(":origem", $origem);
            $sql->bindParam(":destino", $destino);

            $sql->execute();

            $listaVoo = array();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $voo = new PassagemAerea();
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setDataHoraChegada($linha['dataHoraChegada']);
                $voo->setDataHoraSaida($linha['dataHoraSaida']);
                $voo->setPrecoVooEconomico($linha['precoVooEconomico']);
                $voo->setPrecoVooPrimeiraClasse($linha['precoVooPrimeiraClasse']);
                $voo->setAssentos($linha['assentos']);
                $voo->setIdCompanhiaAerea($linha['nomeCompanhia']);
                array_push($listaVoo, $voo);
            }

            return $listaVoo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function pesqVoosInvert()
    {
        try {
            $conn = Data::conectar();

            $origem = $this->destino; // Inverte origem e destino
            $destino = $this->origem;

            $sql = $conn->prepare("SELECT p.origem, p.destino, p.precoVooPrimeiraClasse, p.precoVooEconomico, p.dataHoraChegada, p.dataHoraSaida, p.assentos, c.nomeCompanhia
            FROM passagem_aerea p JOIN companhia_aerea c ON p.idCompanhiaAerea = c.idCompanhiaAerea WHERE p.origem = :origem AND p.destino = :destino");

            $sql->bindParam(":origem", $origem);
            $sql->bindParam(":destino", $destino);

            $sql->execute();

            $listaVoo = array();

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $voo = new PassagemAerea();
                $voo->setOrigem($linha['origem']);
                $voo->setDestino($linha['destino']);
                $voo->setDataHoraChegada($linha['dataHoraChegada']);
                $voo->setDataHoraSaida($linha['dataHoraSaida']);
                $voo->setPrecoVooEconomico($linha['precoVooEconomico']);
                $voo->setPrecoVooPrimeiraClasse($linha['precoVooPrimeiraClasse']);
                $voo->setAssentos($linha['assentos']);
                $voo->setIdCompanhiaAerea($linha['nomeCompanhia']);
                array_push($listaVoo, $voo);
            }

            return $listaVoo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function getIdPassagemAerea()
    {
        return $this->idPassagemAerea;
    }

    public function setIdPassagemAerea($idPassagemAerea)
    {
        $this->idPassagemAerea = $idPassagemAerea;
    }

    public function getIdCompanhiaAerea()
    {
        return $this->idCompanhiaAerea;
    }

    public function setIdCompanhiaAerea($idCompanhiaAerea)
    {
        $this->idCompanhiaAerea = $idCompanhiaAerea;
    }

    public function getOrigem()
    {
        return $this->origem;
    }

    public function setOrigem($origem)
    {
        $this->origem = $origem;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getDataHoraSaida()
    {
        return $this->dataHoraSaida;
    }

    public function setDataHoraSaida($dataHoraSaida)
    {
        $this->dataHoraSaida = $dataHoraSaida;
    }

    public function getDataHoraChegada()
    {
        return $this->dataHoraChegada;
    }

    public function setDataHoraChegada($dataHoraChegada)
    {
        $this->dataHoraChegada = $dataHoraChegada;
    }

    public function getAssentos()
    {
        return $this->assentos;
    }

    public function setAssentos($assentos)
    {
        $this->assentos = $assentos;
    }

    public function getPrecoVooEconomico()
    {
        return $this->precoVooEconomico;
    }

    public function setPrecoVooEconomico($precoVooEconomico)
    {
        $this->precoVooEconomico = $precoVooEconomico;
    }

    public function getPrecoVooPrimeiraClasse()
    {
        return $this->precoVooPrimeiraClasse;
    }

    public function setPrecoVooPrimeiraClasse($precoVooPrimeiraClasse)
    {
        $this->precoVooPrimeiraClasse = $precoVooPrimeiraClasse;
    }
}
