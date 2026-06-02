-- ==========================================
-- RESET COMPLETO DA BIBLIOTECA
-- Apaga todos os dados e reinicia os IDs
-- ==========================================


USE biblioteca_estrutura;

SET FOREIGN_KEY_CHECKS = 0;

DELETE FROM emprestimo;
DELETE FROM livro;
DELETE FROM leitor;
DELETE FROM atendente;
DELETE FROM categoria;

ALTER TABLE emprestimo AUTO_INCREMENT = 1;
ALTER TABLE livro AUTO_INCREMENT = 1;
ALTER TABLE leitor AUTO_INCREMENT = 1;
ALTER TABLE atendente AUTO_INCREMENT = 1;
ALTER TABLE categoria AUTO_INCREMENT = 1;

SET FOREIGN_KEY_CHECKS = 1;