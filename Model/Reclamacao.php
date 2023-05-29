<?php
class Reclamacao
{
    private $idReclamacao;
    private $idPassagem;
    private $comentarioUsuario;

    public function getIdReclamacao() {
        return $this->idReclamacao;
    }

    public function setIdReclamacao($idReclamacao) {
        $this->idReclamacao = $idReclamacao;
    }

    public function getIdPassagem() {
        return $this->idPassagem;
    }

    public function setIdPassagem($idPassagem) {
        $this->idPassagem = $idPassagem;
    }

    public function getComentarioUsuario() {
        return $this->comentarioUsuario;
    }

    public function setComentarioUsuario($comentarioUsuario) {
        $this->comentarioUsuario = $comentarioUsuario;
    }

}