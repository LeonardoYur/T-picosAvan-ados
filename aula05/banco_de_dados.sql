CREATE DATABASE IF NOT EXISTS dbaula05;
USE dbaula05;

CREATE TABLE IF NOT EXISTS Clientes (
    Id_Cliente INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    Endereco VARCHAR(200),
    Cidade VARCHAR(100),
    Telefone VARCHAR(20)
);

-- Inserção de 30 registros fictícios
INSERT INTO Clientes (Nome, Endereco, Cidade, Telefone) VALUES
('Ana Silva', 'Rua das Flores, 123', 'São Paulo', '(11) 98765-4321'),
('João Pereira', 'Av. Brasil, 456', 'Rio de Janeiro', '(21) 99876-5432'),
('Maria Oliveira', 'Rua A, 50', 'Belo Horizonte', '(31) 91234-5678'),
('Pedro Santos', 'Rua Central, 200', 'Curitiba', '(41) 93456-7890'),
('Carla Souza', 'Rua das Palmeiras, 12', 'Fortaleza', '(85) 98877-6655'),
('Lucas Lima', 'Rua Nova, 88', 'Porto Alegre', '(51) 97766-5544'),
('Fernanda Rocha', 'Av. Paulista, 999', 'São Paulo', '(11) 92345-6789'),
('Ricardo Mendes', 'Rua 7 de Setembro, 10', 'Recife', '(81) 91222-3344'),
('Juliana Alves', 'Rua Bahia, 15', 'Salvador', '(71) 93444-5566'),
('Marcelo Costa', 'Rua Goiás, 80', 'Goiânia', '(62) 94567-1234'),
('Patrícia Nunes', 'Rua Ceará, 102', 'Natal', '(84) 95678-9876'),
('Roberto Martins', 'Av. Atlântica, 300', 'Florianópolis', '(48) 97865-1234'),
('Aline Cardoso', 'Rua das Acácias, 20', 'Manaus', '(92) 96789-4567'),
('Eduardo Fernandes', 'Rua Amazonas, 70', 'Belém', '(91) 97654-3210'),
('Beatriz Ferreira', 'Rua XV, 45', 'Campo Grande', '(67) 92321-4567'),
('André Barbosa', 'Rua Independência, 300', 'Vitória', '(27) 99812-3344'),
('Renata Ribeiro', 'Rua Santos Dumont, 40', 'João Pessoa', '(83) 98765-7788'),
('Gustavo Carvalho', 'Av. das Torres, 90', 'Maceió', '(82) 93210-1234'),
('Camila Batista', 'Rua Projetada, 60', 'Aracaju', '(79) 95555-6666'),
('Fábio Lopes', 'Rua Bela Vista, 25', 'São Luís', '(98) 97612-3456'),
('Tatiane Moraes', 'Rua 1, 13', 'Teresina', '(86) 91234-5678'),
('Vinícius Duarte', 'Rua Azul, 77', 'Cuiabá', '(65) 94567-8765'),
('Letícia Teixeira', 'Rua Rosa, 88', 'Palmas', '(63) 98765-0000'),
('Hugo Barros', 'Rua Verde, 99', 'Macapá', '(96) 93456-7890'),
('Sofia Castro', 'Rua Amarela, 10', 'Boa Vista', '(95) 98877-6655'),
('Mariana Rezende', 'Rua Lilás, 44', 'Porto Velho', '(69) 97654-3210'),
('Diego Azevedo', 'Rua Dourada, 55', 'Belém', '(91) 98765-1111'),
('Catarina Gomes', 'Rua Diamante, 66', 'Fortaleza', '(85) 93456-2222'),
('Rafael Souza', 'Rua Esmeralda, 77', 'São Paulo', '(11) 92345-3333'),
('Isabela Monteiro', 'Av. Central, 888', 'Rio de Janeiro', '(21) 99876-4444');