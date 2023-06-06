
# Criar Tabela usuario:

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(14) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    dataNascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

# Criar Tabela passagem:

CREATE TABLE passagem (
    idPassagem INT PRIMARY KEY AUTO_INCREMENT,
    idVoo INT,
    idUsuario INT,
    statusCheckin TINYINT(1),
    statusCancelamento TINYINT(1),
    FOREIGN KEY (idVoo) REFERENCES voo(idVoo),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);

# Criar Tabela voo:

CREATE TABLE voo (
    idVoo INT PRIMARY KEY,
    idCompanhiaAerea INT,
    origem VARCHAR(255),
    destino VARCHAR(255),
    dataHoraSaida DATETIME,
    dataHoraChegada DATETIME,
    assentos INT,
    precoVoo INT,
    FOREIGN KEY (idCompanhiaAerea) REFERENCES companhia_aerea(idCompanhiaAerea)
);

# Criar Tabela companhia_area:

CREATE TABLE companhia_aerea (
    idCompanhiaAerea INT PRIMARY KEY,
    nomeCompanhia VARCHAR(255)
);

# Criar Tabela pagamento:

CREATE TABLE pagamento (
    idPagamento INT PRIMARY KEY,
    idPassagem INT,
    metodoPagamento VARCHAR(255),
    valorPagamento VARCHAR(255),
    FOREIGN KEY (idPassagem) REFERENCES passagem(idPassagem)
);

# Criar Tabela reclamacao:

CREATE TABLE reclamacao (
    idReclamacao INT PRIMARY KEY,
    idPassagem INT,
    comentarioUsuario VARCHAR(255),
    FOREIGN KEY (idPassagem) REFERENCES passagem(idPassagem)
);