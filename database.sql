-- @block Criação da base de dados
DROP DATABASE IF EXISTS ProjetoPWS_A;
CREATE DATABASE IF NOT EXISTS ProjetoPWS_A;
USE ProjetoPWS_A;

-- @block Criação de um utilizador especifico para aceder à base de dados
CREATE USER 'grupo_a'@'localhost' IDENTIFIED BY 'grupo_a_123';
GRANT ALL PRIVILEGES ON ProjetoPWS_A.* TO 'grupo_a'@'localhost';

-- @block Criação da tabela 'empresas'
CREATE TABLE IF NOT EXISTS empresas(
    id              INT             NOT NULL        AUTO_INCREMENT,
    designSocial    varchar(30)     NOT NULL,
    email           varchar(255)    NOT NULL        UNIQUE,
    telefone        varchar(9)      NOT NULL        UNIQUE,
    NIF             VARCHAR(9)      NOT NULL        UNIQUE,
    morada          VARCHAR(50)     NOT NULL,
    codPostal       VARCHAR(8)      NOT NULL,
    localidade      VARCHAR(30)     NOT NULL,
    capitalSocial   DECIMAL(8,2)    NOT NULL DEFAULT 0.00,
    CONSTRAINT pk_empresas_id PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block Criação da tabela 'users'
CREATE TABLE IF NOT EXISTS users(
    id              INT             NOT NULL        AUTO_INCREMENT,
    username        VARCHAR(50)     NOT NULL        UNIQUE,
    password        VARCHAR(255)    NOT NULL,
    email           VARCHAR(255)    NOT NULL        UNIQUE,
    telefone        VARCHAR(9)      NOT NULL        UNIQUE,
    NIF             VARCHAR(9)      NOT NULL        UNIQUE,
    morada          VARCHAR(255)     NOT NULL,  
    codPostal       VARCHAR(8)      NOT NULL,  
    localidade      VARCHAR(30)     NOT NULL,  
    role            enum('admin', 'funcionario', 'cliente')      NOT NULL,  
    ativo           BOOLEAN         NOT NULL        ,
    CONSTRAINT pk_users_id PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block Criação da tabela 'ivas'
CREATE TABLE IF NOT EXISTS ivas(
    id              INT             NOT NULL        AUTO_INCREMENT,
    percentagem     INT             NOT NULL,
    descricao       VARCHAR(255)    NOT NULL,
    vigor           BOOLEAN         NOT NULL,
    CONSTRAINT pk_ivas_id PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block Criação da tabela 'produtos'
CREATE TABLE IF NOT EXISTS produtos(
    referencia      INT             NOT NULL        AUTO_INCREMENT,
    descricao       VARCHAR(255)    NOT NULL,
    preco           DECIMAL(8,2)    NOT NULL,
    stock           INT             NOT NULL,
    iva_id          INT             NOT NULL,
    CONSTRAINT pk_produtos_id PRIMARY KEY(referencia),
    CONSTRAINT pk_produtos_iva_id FOREIGN KEY(iva_id) REFERENCES ivas(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block Criação da tabela 'faturas'
CREATE TABLE IF NOT EXISTS faturas(
    id              INT             AUTO_INCREMENT,
    data            DATETIME        ,
    valorTotal      DECIMAL(8,2),
    ivaTotal        DECIMAL(8,2),
    estado          enum('em lancamento', 'emitida') NOT NULL ,
    cliente_id      INT,
    funcionario_id  INT,
    CONSTRAINT pk_faturas_id PRIMARY KEY(id),
    CONSTRAINT pk_faturas_cliente_id FOREIGN KEY(cliente_id) REFERENCES users(id),
    CONSTRAINT pk_faturas_funcionario_id FOREIGN KEY(funcionario_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block Criação da tabela 'linhas_faturas'
CREATE TABLE IF NOT EXISTS linhas_faturas(
    id              INT             AUTO_INCREMENT,
    quantidade      INT             NOT NULL,
    valor           DECIMAL(8,2)    , 
    valor_iva       INT            ,
    fatura_id       INT             NOT NULL,
    produto_id      INT             NOT NULL,
    CONSTRAINT pk_linhas_faturas_id PRIMARY KEY(id),
    CONSTRAINT pk_linhas_faturas_fatura_id FOREIGN KEY(fatura_id) REFERENCES faturas(id),
    CONSTRAINT pk_linhas_faturas_produto_id FOREIGN KEY(produto_id) REFERENCES produtos(referencia)
);


-- INSERÇÂO de DADOS
-- @block
INSERT INTO ivas(percentagem, descricao, vigor) VALUES
    (23, 'Taxa Normal', true),
    (13, 'Taxa Intermedia', true),
    (6, 'Taxa Reduzida', true),
    (30, 'Taxa Alta', false);

-- @BLOCK
INSERT INTO produtos(descricao, preco, stock, iva_id) VALUES
    ('Arroz', 2.99, 30, 1),
    ('Carne', 5.49, 5, 1),
    ('Agua 5L', 1.09, 40, 2),
    ('Azeite', 8.99, 20, 1),
    ('Papel Higienico', 2.99, 0, 3),
    ('Sacos', 0.99, 25, 1),
    ('Sal', 4.99, 30, 1),
    ('Leite', 3.49, 10, 2),
    ('Açucar', 2.19, 0, 3),
    ('Banana', 1.29, 399, 2),
    ('Limao', 1.79, 35, 1),
    ('Pepino', 0.49, 17, 2),
    ('Cenoura', 0.69, 56, 1),
    ('Ananas', 4.19, 4, 3),
    ('Batata', 1.00, 37, 3),
    ('Tomate', 1.29, 299, 2),
    ('Laranja', 1.39, 0, 1),
    ('Morango', 1.29, 40, 2);

-- @block
INSERT INTO users(username, password, email, telefone, NIF, morada, codPostal, localidade, role, ativo) VALUES
    ('marco', '$2a$12$WsGTi0qEHoylfM8xf/l9Qu6gJSEMG03kXngGpW.mjwa.VnoN3XEvu', 'marco@gmail.com', '987654321', '123321421', 'Rua da invenção', '2220-893', 'Lisboa', 'admin', true),
    ('tomas', '$2a$12$mv.nhdNq0X0K3Z36Gdh6E.roHtvHxC6gIAZoPM1cLRRJ0AueFHcQW', 'tomas@gmail.com', '983454321', '132321421', 'Rua do teste', '2100-083', 'Aveiro', 'funcionario', true),
    ('roberto', '$2a$12$XmiFj9k0E4JXuxumOpd9ROCyizfrJlDF7g2iKd0WFU1GQr8HRfXzu', 'roberto@gmail.com', '987633321', '123231421', 'Rua da avenida', '1200-113', 'Porto', 'funcionario', true),
    ('diogo', '$2a$12$MvDzcAa6xY9kTnnmVLgsn.TLO2T.z.sFUSbysjMjyQ0PTIIjCQvhi', 'diogo@gmail.com', '987654444', '193121421', 'Rua da rua', '2220-111', 'Lisboa', 'cliente', true),
    ('bernardo', '$2a$12$zzpnKSU35sbTHyzKgmhPD.2xVgnBPi6nmC3tz8pVdPOi/3j1ZD2uu', 'bernardo@gmail.com', '981234321', '983321421', 'Avenida Central', '2999-911', 'Leiria', 'cliente', true),
    ('pedro', '$2a$12$Lu7CNRy7h4.umc4j8HJ8fOhp0/V93KeXPWkWUE3b.FT/7WcOjAzhe', 'pedro@gmail.com', '981298621', '983321221', 'Avenida Junta', '3949-921', 'Evora', 'cliente', true);

-- @block
INSERT INTO empresas(designSocial, email, telefone, NIF, morada, codPostal, localidade) VALUES
    ('Fatura+', 'geral@fatura-plus.pt', '255854123', '433673912', 'Rua da Fé', '2400-015', 'Leiria');

-- @block
INSERT INTO faturas(data, estado, cliente_id, funcionario_id) VALUES
    ('2022-05-27 15:56:07', 'emitida', 4, 1),
    ('2022-03-07 21:16:23', 'emitida', 5, 2),
    ('2022-04-12 09:12:47', 'emitida', 6, 3),
    ('2022-05-30 10:11:35', 'emitida', 5, 1);

-- @block
INSERT INTO linhas_faturas(quantidade, fatura_id, produto_id) VALUES
    (3, 1, 3),
    (1, 1, 1),
    (10, 1, 4),
    (1, 1, 6),
    (8, 2, 2),
    (4, 2, 9),
    (7, 2, 1),
    (20, 2, 10),
    (16, 2, 11),
    (5, 3, 2),
    (4, 3, 12),
    (11, 3, 4),
    (9, 3, 7),
    (2, 3, 10),
    (1, 4, 14),
    (5, 4, 13),
    (7, 4, 15),
    (9, 4, 18),
    (11, 4, 13),
    (14, 4, 3);

-- @block
UPDATE linhas_faturas
SET valor = (SELECT preco FROM produtos WHERE produtos.referencia = linhas_faturas.produto_id);

-- @block
UPDATE linhas_faturas
SET valor_iva = (
    SELECT (
        SELECT percentagem
        FROM ivas
        WHERE ivas.id = produtos.iva_id)
    FROM produtos
    WHERE produtos.referencia = linhas_faturas.produto_id);

-- @block
UPDATE faturas 
SET valorTotal = (SELECT SUM(linhas_faturas.valor * linhas_faturas.quantidade) FROM linhas_faturas WHERE linhas_faturas.fatura_id=faturas.id);

UPDATE faturas 
SET ivaTotal = (SELECT SUM(linhas_faturas.valor * linhas_faturas.valor_iva * 0.01 * linhas_faturas.quantidade) FROM linhas_faturas WHERE linhas_faturas.fatura_id=faturas.id);

UPDATE empresas
SET capitalSocial = (SELECT SUM(valorTotal) FROM faturas)
WHERE id=1;