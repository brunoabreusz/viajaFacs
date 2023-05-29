<?php
class CompanhiaAerea
{
    private $idCompanhia;
    private $nomeCompanhia;

    public function getIdCompanhia() {
        return $this->idCompanhia;
    }

    public function setIdCompanhia($idCompanhia) {
        $this->idCompanhia = $idCompanhia;
    }

    public function getNomeCompanhia() {
        return $this->nomeCompanhia;
    }

    public function setNomeCompanhia($nomeCompanhia) {
        $this->nomeCompanhia = $nomeCompanhia;
    }
    
}