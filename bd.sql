CREATE DATABASE atendimento;

USE atendimento;

CREATE TABLE chamados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(100),
    descricao TEXT,
    status VARCHAR(50) DEFAULT 'aberto',
    data_abertura DATETIME DEFAULT CURRENT_TIMESTAMP
);
