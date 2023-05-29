<?php
class Passagem
{
    private $idPassagem;
    private $usuario;
    private $voo;
    private $statusCheckin;
    private $statusCancelamento;
    
    public function getIdPassagem() {
        return $this->idPassagem;
    }

    public function setIdPassagem($idPassagem) {
        $this->idPassagem = $idPassagem;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getVoo() {
        return $this->voo;
    }

    public function setVoo($voo) {
        $this->voo = $voo;
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