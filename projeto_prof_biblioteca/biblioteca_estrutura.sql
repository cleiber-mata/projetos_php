-- Estrutura limpa do banco de dados: biblioteca_estrutura
-- Gerado a partir do arquivo biblioteca_estrutura.sql
-- Apenas estrutura: sem INSERT, sem dados de teste.
-- Tabela emprestimo já criada com id_emprestimo como PRIMARY KEY AUTO_INCREMENT.

CREATE DATABASE IF NOT EXISTS `biblioteca_estrutura`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE `biblioteca_estrutura`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- Tabela: atendente
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `atendente` (
  `id_atendente` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_atendente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_atendente`),
  UNIQUE KEY `id_atendente_UNIQUE` (`id_atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabela: categoria
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabela: leitor
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `leitor` (
  `id_leitor` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_leitor` VARCHAR(45) NOT NULL,
  `email_leitor` VARCHAR(45) NOT NULL,
  `telefone_leitor` VARCHAR(20) NOT NULL,
  `data_nasc_leitor` DATE NOT NULL,
  `genero_leitor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_leitor`),
  UNIQUE KEY `id_leitor_UNIQUE` (`id_leitor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabela: livro
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo_livro` VARCHAR(45) NOT NULL,
  `autor_livro` VARCHAR(45) NOT NULL,
  `editora_livro` VARCHAR(45) NOT NULL,
  `edicao_livro` CHAR(3) NOT NULL,
  `ano_livro` YEAR(4) NOT NULL,
  `categoria_id_categoria` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_livro`),
  UNIQUE KEY `id_livro_UNIQUE` (`id_livro`),
  KEY `fk_livro_categoria1_idx` (`categoria_id_categoria`),
  CONSTRAINT `fk_livro_categoria1`
    FOREIGN KEY (`categoria_id_categoria`)
    REFERENCES `categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------
-- Tabela: emprestimo
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id_emprestimo` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `leitor_id_leitor` INT(10) UNSIGNED NOT NULL,
  `livro_id_livro` INT(10) UNSIGNED NOT NULL,
  `atendente_id_atendente` INT(10) UNSIGNED NOT NULL,
  `data_emprestimo` DATE NOT NULL,
  `devolucao_emprestimo` DATE NOT NULL,
  `status_emprestimo` VARCHAR(20) NOT NULL DEFAULT 'EMPRESTADO',
  PRIMARY KEY (`id_emprestimo`),
  KEY `fk_leitor_has_livro_livro1_idx` (`livro_id_livro`),
  KEY `fk_leitor_has_livro_leitor_idx` (`leitor_id_leitor`),
  KEY `fk_leitor_has_livro_atendente1_idx` (`atendente_id_atendente`),
  CONSTRAINT `fk_leitor_has_livro_atendente1`
    FOREIGN KEY (`atendente_id_atendente`)
    REFERENCES `atendente` (`id_atendente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_leitor_has_livro_leitor`
    FOREIGN KEY (`leitor_id_leitor`)
    REFERENCES `leitor` (`id_leitor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_leitor_has_livro_livro1`
    FOREIGN KEY (`livro_id_livro`)
    REFERENCES `livro` (`id_livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
