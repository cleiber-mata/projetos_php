CREATE DATABASE IF NOT EXISTS cadastro_viatura_rotam
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE cadastro_viatura_rotam;

CREATE TABLE IF NOT EXISTS motos (
    id_mt INT AUTO_INCREMENT PRIMARY KEY,
    prefixo_mt VARCHAR(10) NOT NULL UNIQUE,
    modelo_mt VARCHAR(50) NOT NULL,
    marca_mt VARCHAR(50),
    placa_mt VARCHAR(8) NOT NULL UNIQUE,
    ano_modelo INT,
    km_atual INT DEFAULT 0,
    status_mt VARCHAR(30) DEFAULT 'ATIVA',
    observacao TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS policiais (
    id_pol INT AUTO_INCREMENT PRIMARY KEY,
    posto_graduacao_pol VARCHAR(20) NOT NULL,
    nome_guerra_pol VARCHAR(50) NOT NULL,
    matricula VARCHAR(20) UNIQUE NOT NULL,
    celular_pol VARCHAR(15),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS cautela_mt (
    id_cautela INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    id_pol INT NOT NULL,
    data_inicio DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_devolucao DATETIME,
    observacao TEXT,

    CONSTRAINT fk_cautela_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_cautela_policiais
        FOREIGN KEY (id_pol)
        REFERENCES policiais(id_pol)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS manutencao_mt (
    id_manutencao INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    km_baixa INT NOT NULL,
    km_proxima_revisao INT,
    tipo_manutencao VARCHAR(50),
    descricao_servico TEXT,
    oficina VARCHAR(100),
    data_baixa DATE,
    data_alta DATE,
    observacao TEXT,

    CONSTRAINT fk_manutencao_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;