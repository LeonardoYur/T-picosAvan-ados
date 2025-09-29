CREATE DATABASE IF NOT EXISTS meu_banco;
USE meu_banco;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT DEFAULT 0,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha) VALUES
('João Silva', 'joao@email.com', MD5('senha123')),
('Maria Santos', 'maria@email.com', MD5('senha456')),
('Pedro Oliveira', 'pedro@email.com', MD5('senha789'));

INSERT INTO produtos (nome, descricao, preco, estoque) VALUES
('Notebook Dell', 'Notebook Dell Inspiron 15, 8GB RAM, 256GB SSD', 3500.00, 10),
('Mouse Logitech', 'Mouse sem fio Logitech M280', 89.90, 50),
('Teclado Mecânico', 'Teclado mecânico RGB, switches blue', 299.00, 25),
('Monitor LG 24"', 'Monitor LG 24 polegadas Full HD', 799.00, 15),
('Webcam HD', 'Webcam HD 1080p com microfone', 199.90, 30);