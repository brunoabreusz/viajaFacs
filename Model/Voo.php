<?php
class Voo
{
    private $idVoo;
    private $idCompanhiaAerea;
    private $origem;
    private $destino;
    private $dataHoraSaida;
    private $dataHoraChegada;
    private $assentos;
    private $precoVoo;

    public function getIdVoo() {
        return $this->idVoo;
    }

    public function setIdVoo($idVoo) {
        $this->idVoo = $idVoo;
    }

    public function getIdCompanhiaAerea() {
        return $this->idCompanhiaAerea;
    }

    public function setIdCompanhiaAerea($idCompanhiaAerea) {
        $this->idCompanhiaAerea = $idCompanhiaAerea;
    }

    public function getOrigem() {
        return $this->origem;
    }

    public function setOrigem($origem) {
        $this->origem = $origem;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function setDestino($destino) {
        $this->destino = $destino;
    }

    public function getDataHoraSaida() {
        return $this->dataHoraSaida;
    }

    public function setDataHoraSaida($dataHoraSaida) {
        $this->dataHoraSaida = $dataHoraSaida;
    }

    public function getDataHoraChegada() {
        return $this->dataHoraChegada;
    }

    public function setDataHoraChegada($dataHoraChegada) {
        $this->dataHoraChegada = $dataHoraChegada;
    }

    public function getAssentos() {
        return $this->assentos;
    }

    public function setAssentos($assentos) {
        $this->assentos = $assentos;
    }

    public function getPrecoVoo() {
        return $this->precoVoo;
    }

    public function setPrecoVoo($precoVoo) {
        $this->precoVoo = $precoVoo;
    }

}