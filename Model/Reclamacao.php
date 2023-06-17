<?php

require_once 'conectionData.php';
require_once 'Usuario.php';

class Reclamacao
{
    private $idReclamacao;
    private $idPassagem;
    private $comentarioUsuario;
    private $idUsuario;

    public function inserirReclamacao($idUsuario, $comentarioUsuario)
    {
        $conn = Data::conectar();
        $sql = "INSERT INTO reclamacao (idUsuario, comentarioUsuario) VALUES (:idUsuario, :comentarioUsuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->bindParam(':comentarioUsuario', $comentarioUsuario);
        $stmt->execute();
    }

    public function consultarReclamacao($idUsuario)
    {
        $conn = Data::conectar();
        $sql = "SELECT * FROM reclamacao WHERE idUsuario = :idUsuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
        $reclamacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $reclamacoes;
    }
    


    public function getIdReclamacao()
    {
        return $this->idReclamacao;
    }

    public function setIdReclamacao($idReclamacao)
    {
        $this->idReclamacao = $idReclamacao;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getComentarioUsuario()
    {
        return $this->comentarioUsuario;
    }

    public function setComentarioUsuario($comentarioUsuario)
    {
        $this->comentarioUsuario = $comentarioUsuario;
    }
}
