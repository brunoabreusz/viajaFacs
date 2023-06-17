
# 1 Criar Tabela usuario:

CREATE TABLE usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(14) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    dataNascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

# 2 Criar Tabela companhia_area:

CREATE TABLE companhia_aerea (
    idCompanhiaAerea INT PRIMARY KEY,
    nomeCompanhia VARCHAR(255)
);

# 3 Criar Tabela passagem_aerea:

CREATE TABLE passagem_aerea (
    idPassagemAerea INT PRIMARY KEY AUTO_INCREMENT,
    idCompanhiaAerea INT,
    origem VARCHAR(255),
    destino VARCHAR(255),
    dataHoraSaida DATETIME,
    dataHoraChegada DATETIME,
    assentos INT,
    precoVooPrimeiraClasse INT,
    precoVooEconomico INT,
    FOREIGN KEY (idCompanhiaAerea) REFERENCES companhia_aerea(idCompanhiaAerea)
);

# 4 Criar Tabela pagamento:

CREATE TABLE pagamento (
    idPagamento INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    idPassagemAerea INT,
    valorPagamento VARCHAR(255),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario),
    FOREIGN KEY (idPassagemAerea) REFERENCES passagem_aerea(idPassagemAerea)
);

# 5 Criar Tabela passagem_cliente:

CREATE TABLE passagem_cliente (
    idPassagem INT PRIMARY KEY AUTO_INCREMENT,
    idPagamento INT,
    idUsuario INT,
    statusCheckin TINYINT(1),
    statusCancelamento TINYINT(1),
    FOREIGN KEY (idPagamento) REFERENCES pagamento(idPagamento),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

# 6 Trigger passagem_cliente
DELIMITER //

CREATE TRIGGER tr_preenche_passagem_cliente
AFTER INSERT ON pagamento
FOR EACH ROW
BEGIN
  DECLARE idUsuario INT;
  DECLARE idPassagem INT;
  
  -- Obter o idUsuario do pagamento inserido
  SET idUsuario = NEW.idUsuario;
  
  -- Obter o próximo idPassagem da tabela passagem_cliente
  SET idPassagem = (SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'passagem_cliente');
  
  -- Verificar se o idUsuario é válido
  IF idUsuario IS NOT NULL THEN
    -- Inserir informações na tabela passagem_cliente
    INSERT INTO passagem_cliente (idPassagem, idPagamento, idUsuario, statusCheckin, statusCancelamento)
    VALUES (idPassagem, NEW.idPagamento, idUsuario, 0, 0);
  ELSE
    SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = 'ID do usuário não encontrado.';
  END IF;
END //

DELIMITER ;

# 7 Criar Tabela reclamacao:

CREATE TABLE reclamacao (
    idReclamacao INT PRIMARY KEY AUTO_INCREMENT,
    idUsuario INT,
    comentarioUsuario VARCHAR(255),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);


# 8 Inserts Companhia:

INSERT INTO companhia_aerea (idCompanhiaAerea, nomeCompanhia) VALUES
    (1, 'Latam Airlines'),
    (2, 'Azul'),
    (3, 'Gol Airlines'),
    (4, 'VoePass');

# 8 Insert Passagem Aerea:

INSERT INTO passagem_aerea (idCompanhiaAerea, origem, destino, dataHoraSaida, dataHoraChegada, assentos, precoVooPrimeiraClasse, precoVooEconomico) VALUES 
    (1, 'São Paulo', 'Salvador', '2023-06-06 07:00:00', '2023-07-07 10:00:00', 50, 340, 300),
    (3, 'São Paulo', 'Rio de Janeiro', '2023-06-06 08:00:00', '2023-06-06 09:30:00', 104, 400, 350),
    (2, 'Rio de Janeiro', 'São Paulo', '2023-06-07 10:00:00', '2023-06-07 11:30:00', 125, 400, 350),
    (1, 'São Paulo', 'Salvador', '2023-06-08 12:00:00', '2023-06-08 15:30:00', 76, 380, 330),
    (2, 'Salvador', 'São Paulo', '2023-06-09 16:00:00', '2023-06-09 19:30:00', 53, 380, 330),
    (4, 'São Paulo', 'Belo Horizonte', '2023-06-10 09:00:00', '2023-06-10 11:30:00', 122, 420, 370),
    (4, 'Belo Horizonte', 'São Paulo', '2023-06-11 12:00:00', '2023-06-11 14:30:00', 60, 420, 370),
    (2, 'Rio de Janeiro', 'Salvador', '2023-06-12 15:00:00', '2023-06-12 18:30:00', 148, 360, 310),
    (1, 'Salvador', 'Rio de Janeiro', '2023-06-13 19:00:00', '2023-06-13 22:30:00', 87, 360, 310),
    (1, 'Rio de Janeiro', 'Belo Horizonte', '2023-06-14 10:00:00', '2023-06-14 12:30:00', 52, 400, 350),
    (3, 'Belo Horizonte', 'Rio de Janeiro', '2023-06-15 13:00:00', '2023-06-15 15:30:00', 128, 400, 350),
    (2, 'Salvador', 'Belo Horizonte', '2023-06-16 16:00:00', '2023-06-16 18:30:00', 64, 380, 330),
    (4, 'Belo Horizonte', 'Salvador', '2023-06-17 19:00:00', '2023-06-17 22:30:00', 106, 380, 330),
    (1, 'São Paulo', 'Salvador', '2023-06-18 07:30:00', '2023-06-18 11:00:00', 120, 360, 310),
    (3, 'Salvador', 'São Paulo', '2023-06-19 08:00:00', '2023-06-19 09:30:00', 79, 360, 310),
    (4, 'São Paulo', 'Belo Horizonte', '2023-06-20 10:00:00', '2023-06-20 11:30:00', 65, 400, 350),
    (3, 'Salvador', 'Rio de Janeiro', '2023-06-21 12:00:00', '2023-06-21 15:30:00', 133, 400, 350),
    (2, 'Rio de Janeiro', 'Salvador', '2023-06-22 16:00:00', '2023-06-22 19:30:00', 90, 380, 330),
    (1, 'Belo Horizonte', 'São Paulo', '2023-06-23 09:00:00', '2023-06-23 11:30:00', 102, 380, 330),
    (4, 'São Paulo', 'Salvador', '2023-06-24 12:00:00', '2023-06-24 14:30:00', 52, 420, 370),
    (3, 'Salvador', 'Rio de Janeiro', '2023-06-25 15:00:00', '2023-06-25 18:30:00', 77, 420, 370),
    (2, 'Rio de Janeiro', 'Belo Horizonte', '2023-06-26 10:00:00', '2023-06-26 12:30:00', 95, 360, 310),
    (1, 'São Paulo', 'Salvador', '2023-06-27 13:00:00', '2023-06-27 15:30:00', 61, 360, 310),
    (3, 'Salvador', 'São Paulo', '2023-06-28 16:00:00', '2023-06-28 18:30:00', 110, 400, 350),
    (2, 'São Paulo', 'Belo Horizonte', '2023-06-29 19:00:00', '2023-06-29 22:30:00', 79, 400, 350),
    (4, 'Belo Horizonte', 'São Paulo', '2023-06-30 10:00:00', '2023-06-30 12:30:00', 57, 420, 370),
    (4, 'São Paulo', 'Belo Horizonte', '2023-07-01 13:00:00', '2023-07-01 15:30:00', 97, 420, 370),
    (3, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-02 16:00:00', '2023-07-02 18:30:00', 81, 360, 310),
    (1, 'Salvador', 'Belo Horizonte', '2023-07-03 19:00:00', '2023-07-03 22:30:00', 122, 360, 310),
    (3, 'Rio de Janeiro', 'Salvador', '2023-07-04 10:00:00', '2023-07-04 12:30:00', 70, 400, 350),
    (4, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-05 13:00:00', '2023-07-05 15:30:00', 146, 400, 350),
    (1, 'Salvador', 'Belo Horizonte', '2023-07-06 16:00:00', '2023-07-06 18:30:00', 92, 380, 330),
    (4, 'Belo Horizonte', 'Salvador', '2023-07-07 19:00:00', '2023-07-07 22:30:00', 77, 380, 330),
    (2, 'São Paulo', 'Salvador', '2023-07-08 07:00:00', '2023-07-08 10:00:00', 130, 340, 300),
    (1, 'Salvador', 'São Paulo', '2023-07-09 08:00:00', '2023-07-09 09:30:00', 87, 340, 300),
    (3, 'Rio de Janeiro', 'Belo Horizonte', '2023-07-10 10:00:00', '2023-07-10 11:30:00', 94, 380, 330),
    (4, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-11 12:00:00', '2023-07-11 14:30:00', 56, 380, 330),
    (2, 'São Paulo', 'Salvador', '2023-07-12 15:00:00', '2023-07-12 18:30:00', 121, 360, 310),
    (3, 'Salvador', 'São Paulo', '2023-07-13 19:00:00', '2023-07-13 22:30:00', 78, 360, 310),
    (4, 'São Paulo', 'Belo Horizonte', '2023-07-14 14:30:00', '2023-07-14 17:00:00', 110, 400, 350),
    (1, 'Salvador', 'Rio de Janeiro', '2023-07-15 15:00:00', '2023-07-15 18:30:00', 135, 400, 350),
    (2, 'Rio de Janeiro', 'Salvador', '2023-07-16 09:00:00', '2023-07-16 12:30:00', 64, 380, 330),
    (3, 'Belo Horizonte', 'São Paulo', '2023-07-17 10:00:00', '2023-07-17 11:30:00', 102, 380, 330),
    (1, 'São Paulo', 'Salvador', '2023-07-18 12:00:00', '2023-07-18 14:30:00', 50, 420, 370),
    (2, 'Salvador', 'Rio de Janeiro', '2023-07-19 13:00:00', '2023-07-19 15:30:00', 79, 420, 370),
    (4, 'São Paulo', 'Belo Horizonte', '2023-07-20 16:00:00', '2023-07-20 18:30:00', 60, 360, 310),
    (1, 'Belo Horizonte', 'São Paulo', '2023-07-21 19:00:00', '2023-07-21 22:30:00', 128, 360, 310),
    (3, 'Salvador', 'Rio de Janeiro', '2023-07-22 10:00:00', '2023-07-22 12:30:00', 148, 400, 350),
    (2, 'Rio de Janeiro', 'Salvador', '2023-07-23 13:00:00', '2023-07-23 15:30:00', 87, 400, 350),
    (4, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-24 16:00:00', '2023-07-24 18:30:00', 52, 380, 330);