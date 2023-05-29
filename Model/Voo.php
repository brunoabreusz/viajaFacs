<?php
class Voo
{
    private $numeroVoo;
    private $nomeCompanhia;
    private $Origem;
    private $Destino;
    private $dataHoraS;
    private $dataHoraC;
    private $assentos;
    private $precoVoo;

    public function getNumeroVoo() {
        return $this->numeroVoo;
    }

    public function setNumeroVoo($numeroVoo) {
        $this->numeroVoo = $numeroVoo;
    }

    public function getNomeCompanhia() {
        return $this->nomeCompanhia;
    }

    public function setNomeCompanhia($nomeCompanhia) {
        $this->nomeCompanhia = $nomeCompanhia;
    }

    public function getOrigem() {
        return $this->Origem;
    }

    public function setOrigem($Origem) {
        $this->Origem = $Origem;
    }

    public function getDestino() {
        return $this->Destino;
    }

    public function setDestino($Destino) {
        $this->Destino = $Destino;
    }

    public function getDataHoraS() {
        return $this->dataHoraS;
    }

    public function setDataHoraS($dataHoraS) {
        $this->dataHoraS = $dataHoraS;
    }

    public function getDataHoraC() {
        return $this->dataHoraC;
    }

    public function setDataHoraC($dataHoraC) {
        $this->dataHoraC = $dataHoraC;
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