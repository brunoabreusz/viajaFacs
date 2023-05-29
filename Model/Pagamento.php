<?php
class Pagamento
{
    private $idPagamento;
    private $idPassagem;
    private $metodoPagamento;
    private $valorPagamento;

    public function getIdPagamento() {
        return $this->idPagamento;
    }

    public function setIdPagamento($idPagamento) {
        $this->idPagamento = $idPagamento;
    }

    public function getIdPassagem() {
        return $this->idPassagem;
    }

    public function setIdPassagem($idPassagem) {
        $this->idPassagem = $idPassagem;
    }

    public function getMetodoPagamento() {
        return $this->metodoPagamento;
    }

    public function setMetodoPagamento($metodoPagamento) {
        $this->metodoPagamento = $metodoPagamento;
    }

    public function getValorPagamento() {
        return $this->valorPagamento;
    }

    public function setValorPagamento($valorPagamento) {
        $this->valorPagamento = $valorPagamento;
    }
    
}