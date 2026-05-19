CREATE DATABASE IF NOT EXISTS cadastro_viatura_rotam
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE cadastro_viatura_rotam;

CREATE TABLE IF NOT EXISTS viaturas (
    id_vtr INT AUTO_INCREMENT PRIMARY KEY,
    prefixo_vtr VARCHAR(10) NOT NULL UNIQUE,
    modelo_vtr VARCHAR(50) NOT NULL,
    marca_vtr VARCHAR(50),
    placa_vtr VARCHAR(8) NOT NULL UNIQUE,
    ano_modelo INT,
    km_atual INT DEFAULT 0,
    cartao_manutencao VARCHAR(16),

    situacao_cautela VARCHAR(20) DEFAULT 'SEM_CAUTELA',
    situacao_operacional VARCHAR(20) DEFAULT 'DISPONIVEL',

    observacao TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS policiais (
    id_pol INT AUTO_INCREMENT PRIMARY KEY,
    posto_graduacao_pol VARCHAR(20) NOT NULL,
    nome_guerra_pol VARCHAR(50) NOT NULL,
    matricula VARCHAR(20) UNIQUE NOT NULL,
    celular_pol VARCHAR(15)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cautela_vtr (
    id_cautela INT AUTO_INCREMENT PRIMARY KEY,
    id_vtr INT NOT NULL,
    id_pol INT NOT NULL,
    data_inicio DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_devolucao DATETIME,
    observacao TEXT,

    CONSTRAINT fk_cautela_viaturas
        FOREIGN KEY (id_vtr)
        REFERENCES viaturas(id_vtr)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_cautela_policiais
        FOREIGN KEY (id_pol)
        REFERENCES policiais(id_pol)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS manutencao_vtr (
    id_manutencao INT AUTO_INCREMENT PRIMARY KEY,
    id_vtr INT NOT NULL,
    tipo_manutencao VARCHAR(20) NOT NULL,
    descricao_servico TEXT,
    km_baixa INT,
    os_cman VARCHAR(5),
    os_prime VARCHAR(5),
    km_proxima_revisao INT,
    oficina VARCHAR(100),
    data_baixa DATE,
    data_alta DATE,
    observacao TEXT,

    CONSTRAINT fk_manutencao_viaturas
        FOREIGN KEY (id_vtr)
        REFERENCES viaturas(id_vtr)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;