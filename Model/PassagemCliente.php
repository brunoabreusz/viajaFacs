<?php
class Passagem
{
    private $idPassagem;
    private $idVoo;
    private $idUsuario;
    private $statusCheckin;
    private $statusCancelamento;
    
    public function getIdPassagem() {
        return $this->idPassagem;
    }

    public function setIdPassagem($idPassagem) {
        $this->idPassagem = $idPassagem;
    }

    public function getIdVoo() {
        return $this->idVoo;
    }

    public function setIdVoo($idVoo) {
        $this->idVoo = $idVoo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getStatusCheckin() {
        return $this->statusCheckin;
    }

    public function setStatusCheckin($statusCheckin) {
        $this->statusCheckin = $statusCheckin;
    }

    public function getStatusCancelamento() {
        return $this->statusCancelamento;
    }

    public function setStatusCancelamento($statusCancelamento) {
        $this->statusCancelamento = $statusCancelamento;
    }
}