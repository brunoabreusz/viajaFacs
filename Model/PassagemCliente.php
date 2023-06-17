<?php

require_once 'conectionData.php';

class PassagemCliente
{
    private $idPassagem;
    private $idPagamento;
    private $idUsuario;
    private $statusCheckin;
    private $statusCancelamento;

    public function passagens($idUsuario)
    {
        $conn = Data::conectar();
        $sql = "SELECT pc.idPassagem, pc.idPagamento, pc.idUsuario, pc.statusCheckin, pc.statusCancelamento, pa.origem, pa.destino, pa.dataHoraSaida, pa.dataHoraChegada
                FROM passagem_cliente AS pc
                INNER JOIN passagem_aerea AS pa ON pc.idPassagem = pa.idPassagemAerea
                WHERE pc.idUsuario = :idUsuario";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $stmt->execute();
        $passagens = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $passagens;
    }

    public function alterarStatusCheckin($idPassagem)
    {
        $conn = Data::conectar();
        $sql = "UPDATE passagem_cliente SET statusCheckin = 1 WHERE idPassagem = :idPassagem";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPassagem', $idPassagem);
        $stmt->execute();
    }

    public function alterarStatusCancelamento($idPassagem)
    {
        $conn = Data::conectar();
        $sql = "UPDATE passagem_cliente SET statusCancelamento = 1 WHERE idPassagem = :idPassagem";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idPassagem', $idPassagem);
        $stmt->execute();
    }

    public function getIdPassagem()
    {
        return $this->idPassagem;
    }

    public function getIdPagamento()
    {
        return $this->idPagamento;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getStatusCheckin()
    {
        return $this->statusCheckin;
    }

    public function getStatusCancelamento()
    {
        return $this->statusCancelamento;
    }

    public function setIdPassagem($idPassagem)
    {
        $this->idPassagem = $idPassagem;
    }

    public function setIdPagamento($idPagamento)
    {
        $this->idPagamento = $idPagamento;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setStatusCheckin($statusCheckin)
    {
        $this->statusCheckin = $statusCheckin;
    }

    public function setStatusCancelamento($statusCancelamento)
    {
        $this->statusCancelamento = $statusCancelamento;
    }
}

// DELIMITER //

// CREATE TRIGGER tr_preenche_passagem_cliente
// AFTER INSERT ON pagamento
// FOR EACH ROW
// BEGIN
//   DECLARE idUsuario INT;
//   DECLARE idPassagem INT;
  
//   -- Obter o idUsuario do pagamento inserido
//   SET idUsuario = NEW.idUsuario;
  
//   -- Obter o próximo idPassagem da tabela passagem_cliente
//   SET idPassagem = (SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'passagem_cliente');
  
//   -- Verificar se o idUsuario é válido
//   IF idUsuario IS NOT NULL THEN
//     -- Inserir informações na tabela passagem_cliente
//     INSERT INTO passagem_cliente (idPassagem, idPagamento, idUsuario, statusCheckin, statusCancelamento)
//     VALUES (idPassagem, NEW.idPagamento, idUsuario, 0, 0);
//   ELSE
//     SIGNAL SQLSTATE '45000'
//       SET MESSAGE_TEXT = 'ID do usuário não encontrado.';
//   END IF;
// END //

// DELIMITER ;