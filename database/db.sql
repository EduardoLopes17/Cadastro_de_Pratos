
CREATE DATABASE Cadastro_de_Pratos;
USE Cadastro_de_Pratos;

CREATE TABLE pratos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(100) NOT NULL
);