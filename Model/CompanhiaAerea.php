<?php
class CompanhiaAerea
{
    private $idCompanhiaAerea;
    private $nomeCompanhia;

    public function getIdCompanhiaAerea() {
        return $this->idCompanhiaAerea;
    }

    public function setIdCompanhiaAerea($idCompanhiaAerea) {
        $this->idCompanhiaAerea = $idCompanhiaAerea;
    }

    public function getNomeCompanhia() {
        return $this->nomeCompanhia;
    }

    public function setNomeCompanhia($nomeCompanhia) {
        $this->nomeCompanhia = $nomeCompanhia;
    }
    
}