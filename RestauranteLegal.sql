CREATE TABLE pratos (
idPrato INT AUTO_INCREMENT PRIMARY KEY,
nomePrato VARCHAR(100) NOT NULL UNIQUE,
descricao VARCHAR(255),
preco DECIMAL(6,2) NOT NULL
)

INSERT INTO pratos
(nomePrato, descricao, preco)
VALUES
('Strogonoff de Frango','Frango em pedaços com molho de Strogonoff acompanhados com deliciosos champignons. Acompanhado arroz e batata palha',34.99),
('Lasanha a Bolonhesa','Deliciosas folhas de massa produzida na casa com queijo, presunto e molho de tomate com carne moida. Acompanhado de arroz, feijão e batata frita.',46.99),
('Frango a Milsanesa','Delicioso peito de frango à milanesa. Acompanhado de arroz, feijão e batata frita',37.99),
('Fillet Mignon ao Molho Madeira','Filé Mignon ao molho madeira. Acompanha arroz e batata rústica',87.99),
('Costela ao Molho Barbecue','Costela ao molho barbecue. Acompanhado arroz e cebola à milanesa.',59.99);


CREATE TABLE bebidas (
idBebidas INT AUTO_INCREMENT PRIMARY KEY,
nomeBebidas VARCHAR(100) NOT NULL,
volumeml DECIMAL(6,2) NOT NULL,
alcoolico VARCHAR(1) NOT NULL,
descricao VARCHAR(255),
preco DECIMAL(6,2) NOT NULL,
CONSTRAINT chk_alcoolico
CHECK (alcoolico IN (S,N))
);

INSERT INTO bebidas
(nomeBebidas, volumeml, alcoolico, descricao, preco)
VALUES
('Água',500,'N','Garrafinha de plátisco que contem água mineral fresca.',5.00),
('Limonada',700,'N','Um copo de Limonada fresca, com açúcar a escolha com fatias de limão e gelo',12.50),
('Caipirinha Cremosa de Maracujá',250,'S','Um copo pequeno com uma polpa de maracuja, 1 dose de vodka, 2 colheres de açúcar, gelo picado e Creme de Leite.',18.50),
('Cosmopolitan',250,'S','Um drink fresco com 1 dose de vodka, 1 suco de limão, 50ml suco de cranberry, 1 dose de licor de laranja e gelo',22.50),
('Coca-Cola',350,'N','Uma latinha de coca-cola',8.50);

CREATE TABLE sobremesas(
idSobremesas INT AUTO_INCREMENT PRIMARY KEY,
NomeSobremesas VARCHAR(100) NOT NULL UNIQUE,
descricao VARCHAR(255),
preco DECIMAL(6,2) NOT NULL
);

INSERT INTO sobremesas
(NomeSobremesas, descricao, preco)
VALUES
('Pudim de Leite Condensado', 'Pudim tradicional com calda de caramelo', 12.00),
('Brigadeiro', 'Doce de chocolate feito com leite condensado', 4.50),
('Brownie', 'Bolo de chocolate com casquinha crocante', 10.00),
('Cheesecake', 'Torta cremosa de queijo com cobertura de morango', 15.00),
('Mousse de Maracujá', 'Sobremesa cremosa com sabor de maracujá', 9.00);