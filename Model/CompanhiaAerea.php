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
    
    // SQL para criação das companhias.
    // INSERT INTO companhia_aerea (idCompanhiaAerea, nomeCompanhia) VALUES
    // (1, 'Latam Airlines'),
    // (2, 'Azul'),
    // (3, 'Gol Airlines'),
    // (4, 'VoePass');

}