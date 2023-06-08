
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
    idPassagemAerea INT PRIMARY KEY,
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

# 4 Criar Tabela passagem_cliente:

CREATE TABLE passagem_cliente (
    idPassagem INT PRIMARY KEY AUTO_INCREMENT,
    idPassagemAerea INT,
    idUsuario INT,
    statusCheckin TINYINT(1),
    statusCancelamento TINYINT(1),
    FOREIGN KEY (idPassagemAerea) REFERENCES passagem_aerea(idPassagemAerea),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

# 5 Criar Tabela pagamento:

CREATE TABLE pagamento (
    idPagamento INT PRIMARY KEY,
    idPassagem INT,
    metodoPagamento VARCHAR(255),
    valorPagamento VARCHAR(255),
    FOREIGN KEY (idPassagem) REFERENCES passagem_cliente(idPassagem)
);

# 6 Criar Tabela reclamacao:

CREATE TABLE reclamacao (
    idReclamacao INT PRIMARY KEY,
    idPassagem INT,
    comentarioUsuario VARCHAR(255),
    FOREIGN KEY (idPassagem) REFERENCES passagem_cliente(idPassagem)
);


# 7 Inserts Companhia:

INSERT INTO companhia_aerea (idCompanhiaAerea, nomeCompanhia) VALUES
    (1, 'Latam Airlines'),
    (2, 'Azul'),
    (3, 'Gol Airlines'),
    (4, 'VoePass');

# 8 Insert Passagem Aerea:

INSERT INTO passagem_aerea (idPassagemAerea, idCompanhiaAerea, origem, destino, dataHoraSaida, dataHoraChegada, assentos, precoVooPrimeiraClasse, precoVooEconomico)
VALUES 
    (1, 1, 'São Paulo', 'Salvador', '2023-06-06 07:00:00', '2023-07-07 10:00:00', 50, 340, 300),
    (2, 3, 'São Paulo', 'Rio de Janeiro', '2023-06-06 08:00:00', '2023-06-06 09:30:00', 104, 400, 350),
    (3, 2, 'Rio de Janeiro', 'São Paulo', '2023-06-07 10:00:00', '2023-06-07 11:30:00', 125, 400, 350),
    (4, 1, 'São Paulo', 'Salvador', '2023-06-08 12:00:00', '2023-06-08 15:30:00', 76, 380, 330),
    (5, 2, 'Salvador', 'São Paulo', '2023-06-09 16:00:00', '2023-06-09 19:30:00', 53, 380, 330),
    (6, 4, 'São Paulo', 'Belo Horizonte', '2023-06-10 09:00:00', '2023-06-10 11:30:00', 122, 420, 370),
    (7, 4, 'Belo Horizonte', 'São Paulo', '2023-06-11 12:00:00', '2023-06-11 14:30:00', 60, 420, 370),
    (8, 2, 'Rio de Janeiro', 'Salvador', '2023-06-12 15:00:00', '2023-06-12 18:30:00', 148, 360, 310),
    (9, 1, 'Salvador', 'Rio de Janeiro', '2023-06-13 19:00:00', '2023-06-13 22:30:00', 87, 360, 310),
    (10, 1, 'Rio de Janeiro', 'Belo Horizonte', '2023-06-14 10:00:00', '2023-06-14 12:30:00', 52, 400, 350),
    (11, 3, 'Belo Horizonte', 'Rio de Janeiro', '2023-06-15 13:00:00', '2023-06-15 15:30:00', 128, 400, 350),
    (12, 2, 'Salvador', 'Belo Horizonte', '2023-06-16 16:00:00', '2023-06-16 18:30:00', 64, 380, 330),
    (13, 4, 'Belo Horizonte', 'Salvador', '2023-06-17 19:00:00', '2023-06-17 22:30:00', 106, 380, 330),
    (14, 1, 'São Paulo', 'Salvador', '2023-06-18 07:30:00', '2023-06-18 11:00:00', 120, 360, 310),
    (15, 3, 'Salvador', 'São Paulo', '2023-06-19 08:00:00', '2023-06-19 09:30:00', 79, 360, 310),
    (16, 4, 'São Paulo', 'Belo Horizonte', '2023-06-20 10:00:00', '2023-06-20 11:30:00', 65, 400, 350),
    (17, 3, 'Salvador', 'Rio de Janeiro', '2023-06-21 12:00:00', '2023-06-21 15:30:00', 133, 400, 350),
    (18, 2, 'Rio de Janeiro', 'Salvador', '2023-06-22 16:00:00', '2023-06-22 19:30:00', 90, 380, 330),
    (19, 1, 'Belo Horizonte', 'São Paulo', '2023-06-23 09:00:00', '2023-06-23 11:30:00', 102, 380, 330),
    (20, 4, 'São Paulo', 'Salvador', '2023-06-24 12:00:00', '2023-06-24 14:30:00', 52, 420, 370),
    (21, 3, 'Salvador', 'Rio de Janeiro', '2023-06-25 15:00:00', '2023-06-25 18:30:00', 77, 420, 370),
    (22, 2, 'Rio de Janeiro', 'Belo Horizonte', '2023-06-26 10:00:00', '2023-06-26 12:30:00', 95, 360, 310),
    (23, 1, 'São Paulo', 'Salvador', '2023-06-27 13:00:00', '2023-06-27 15:30:00', 61, 360, 310),
    (24, 3, 'Salvador', 'São Paulo', '2023-06-28 16:00:00', '2023-06-28 18:30:00', 110, 400, 350),
    (25, 2, 'São Paulo', 'Belo Horizonte', '2023-06-29 19:00:00', '2023-06-29 22:30:00', 79, 400, 350),
    (26, 4, 'Belo Horizonte', 'São Paulo', '2023-06-30 10:00:00', '2023-06-30 12:30:00', 57, 420, 370),
    (27, 4, 'São Paulo', 'Belo Horizonte', '2023-07-01 13:00:00', '2023-07-01 15:30:00', 97, 420, 370),
    (28, 3, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-02 16:00:00', '2023-07-02 18:30:00', 81, 360, 310),
    (29, 1, 'Salvador', 'Belo Horizonte', '2023-07-03 19:00:00', '2023-07-03 22:30:00', 122, 360, 310),
    (30, 3, 'Rio de Janeiro', 'Salvador', '2023-07-04 10:00:00', '2023-07-04 12:30:00', 70, 400, 350),
    (31, 4, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-05 13:00:00', '2023-07-05 15:30:00', 146, 400, 350),
    (32, 1, 'Salvador', 'Belo Horizonte', '2023-07-06 16:00:00', '2023-07-06 18:30:00', 92, 380, 330),
    (33, 4, 'Belo Horizonte', 'Salvador', '2023-07-07 19:00:00', '2023-07-07 22:30:00', 77, 380, 330),
    (34, 2, 'São Paulo', 'Salvador', '2023-07-08 07:00:00', '2023-07-08 10:00:00', 130, 340, 300),
    (35, 1, 'Salvador', 'São Paulo', '2023-07-09 08:00:00', '2023-07-09 09:30:00', 87, 340, 300),
    (36, 3, 'Rio de Janeiro', 'Belo Horizonte', '2023-07-10 10:00:00', '2023-07-10 11:30:00', 94, 380, 330),
    (37, 4, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-11 12:00:00', '2023-07-11 14:30:00', 56, 380, 330),
    (38, 2, 'São Paulo', 'Salvador', '2023-07-12 15:00:00', '2023-07-12 18:30:00', 121, 360, 310),
    (39, 3, 'Salvador', 'São Paulo', '2023-07-13 19:00:00', '2023-07-13 22:30:00', 78, 360, 310),
    (40, 4, 'São Paulo', 'Belo Horizonte', '2023-07-14 14:30:00', '2023-07-14 17:00:00', 110, 400, 350),
    (41, 1, 'Salvador', 'Rio de Janeiro', '2023-07-15 15:00:00', '2023-07-15 18:30:00', 135, 400, 350),
    (42, 2, 'Rio de Janeiro', 'Salvador', '2023-07-16 09:00:00', '2023-07-16 12:30:00', 64, 380, 330),
    (43, 3, 'Belo Horizonte', 'São Paulo', '2023-07-17 10:00:00', '2023-07-17 11:30:00', 102, 380, 330),
    (44, 1, 'São Paulo', 'Salvador', '2023-07-18 12:00:00', '2023-07-18 14:30:00', 50, 420, 370),
    (45, 2, 'Salvador', 'Rio de Janeiro', '2023-07-19 13:00:00', '2023-07-19 15:30:00', 79, 420, 370),
    (46, 4, 'São Paulo', 'Belo Horizonte', '2023-07-20 16:00:00', '2023-07-20 18:30:00', 60, 360, 310),
    (47, 1, 'Belo Horizonte', 'São Paulo', '2023-07-21 19:00:00', '2023-07-21 22:30:00', 128, 360, 310),
    (48, 3, 'Salvador', 'Rio de Janeiro', '2023-07-22 10:00:00', '2023-07-22 12:30:00', 148, 400, 350),
    (49, 2, 'Rio de Janeiro', 'Salvador', '2023-07-23 13:00:00', '2023-07-23 15:30:00', 87, 400, 350),
    (50, 4, 'Belo Horizonte', 'Rio de Janeiro', '2023-07-24 16:00:00', '2023-07-24 18:30:00', 52, 380, 330);