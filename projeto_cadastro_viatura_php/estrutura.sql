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
    renavam_mt VARCHAR(20),
    chassi_mt VARCHAR(30),
    ano_modelo INT,
    km_total INT DEFAULT 0,
    status_mt VARCHAR(30) DEFAULT 'ATIVA',
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP,
    observacao TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS policiais (
    id_pol INT AUTO_INCREMENT PRIMARY KEY,
    nome_pol VARCHAR(50) NOT NULL,
    sobrenome_pol VARCHAR(50),
    matricula VARCHAR(20) UNIQUE,
    celular_pol VARCHAR(15),
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS acautelamento_mt (
    id_acautelamento INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    id_pol INT NOT NULL,
    data_inicio DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_devolucao DATETIME,
    observacao TEXT,

    CONSTRAINT fk_acautelamento_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_acautelamento_policiais
        FOREIGN KEY (id_pol)
        REFERENCES policiais(id_pol)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS manutencao_mt (
    id_manutencao INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    km_atual INT NOT NULL,
    km_proxima_revisao INT,
    tipo_manutencao VARCHAR(50),
    descricao_servico TEXT,
    oficina VARCHAR(100),
    valor_manutencao DECIMAL(10,2),
    data_manutencao DATE,
    data_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    observacao TEXT,

    CONSTRAINT fk_manutencao_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS abastecimento_mt (
    id_abastecimento INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    km_abastecimento INT NOT NULL,
    litros DECIMAL(8,2),
    valor_abastecimento DECIMAL(10,2),
    posto VARCHAR(100),
    data_abastecimento DATE,
    observacao TEXT,

    CONSTRAINT fk_abastecimento_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS documentos_mt (
    id_documento INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    tipo_documento VARCHAR(50),
    data_vencimento DATE,
    observacao TEXT,

    CONSTRAINT fk_documentos_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS checklist_mt (
    id_checklist INT AUTO_INCREMENT PRIMARY KEY,
    id_mt INT NOT NULL,
    id_pol INT,
    data_checklist DATETIME DEFAULT CURRENT_TIMESTAMP,
    farol_ok BOOLEAN DEFAULT TRUE,
    freio_ok BOOLEAN DEFAULT TRUE,
    pneu_ok BOOLEAN DEFAULT TRUE,
    oleo_ok BOOLEAN DEFAULT TRUE,
    sirene_ok BOOLEAN DEFAULT TRUE,
    observacao TEXT,

    CONSTRAINT fk_checklist_motos
        FOREIGN KEY (id_mt)
        REFERENCES motos(id_mt)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_checklist_policiais
        FOREIGN KEY (id_pol)
        REFERENCES policiais(id_pol)
        ON DELETE SET NULL
        ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;