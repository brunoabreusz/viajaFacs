<?php

require_once 'conectionData.php';

class PassagemCliente
{
    private $idPassagem;
    private $idPagamento;
    private $idUsuario;
    private $statusCheckin;
    private $statusCancelamento;

    // public function realizarCheckin($idPassagem)
    // {
    //     try {
    //         $conn = Data::conectar();

    //         // Verificar se o idPassagem existe na tabela passagem_cliente
    //         $sqlVerify = $conn->prepare("SELECT idPassagem FROM passagem_cliente WHERE idPassagem = :idPassagem");
    //         $sqlVerify->bindParam(':idPassagem', $idPassagem);
    //         $sqlVerify->execute();

    //         // Verificar se há resultados encontrados
    //         if ($sqlVerify->rowCount() > 0) {
    //             // Atualizar o statusCheckin para 1
    //             $sql = $conn->prepare("UPDATE passagem_cliente SET statusCheckin = 1 WHERE idPassagem = :idPassagem");
    //             $sql->bindParam(':idPassagem', $idPassagem);
    //             $sql->execute();

    //             echo "Check-in realizado com sucesso!";
    //         } else {
    //             echo "O ID da Passagem está inválido.";
    //         }
    //     } catch (PDOException $e) {
    //         echo "Connection failed: " . $e->getMessage();
    //     }
    // }

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