CREATE DATABASE IF NOT EXISTS ProjetoPWS_A;
USE ProjetoPWS_A;

-- @block
CREATE TABLE IF NOT EXISTS empresas(
    id              INT             NOT NULL        AUTO_INCREMENT,
    designSocial    varchar(30)     NOT NULL,
    email           varchar(255)    NOT NULL        UNIQUE,
    telefone        varchar(9)      NOT NULL        UNIQUE,
    NIF             VARCHAR(9)      NOT NULL        UNIQUE,
    morada          VARCHAR(50)     NOT NULL,
    codPostal       VARCHAR(8)      NOT NULL,
    localidade      VARCHAR(30)     NOT NULL,
    capitalSocial   FLOAT           NOT NULL,
    CONSTRAINT pk_empresas_id PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block
CREATE TABLE IF NOT EXISTS users(
    id              INT             NOT NULL        AUTO_INCREMENT,
    username        VARCHAR(50)     NOT NULL        UNIQUE,
    password        VARCHAR(30)     NOT NULL,
    email           VARCHAR(255)    NOT NULL        UNIQUE,
    telefone        VARCHAR(9)      NOT NULL        UNIQUE,
    NIF             VARCHAR(9)      NOT NULL        UNIQUE,
    morada          VARCHAR(50)     NOT NULL,  
    codPostal       VARCHAR(8)      NOT NULL,  
    localidade      VARCHAR(30)      NOT NULL,  
    role            enum('admin', 'funcionario', 'cliente')      NOT NULL,  
    CONSTRAINT pk_users_id PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block
CREATE TABLE IF NOT EXISTS ivas(
    id              INT             NOT NULL        AUTO_INCREMENT,
    percentagem     INT             NOT NULL,
    descricao       TEXT            NOT NULL,
    vigor           BOOL            NOT NULL,
    CONSTRAINT pk_ivas_id PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block
CREATE TABLE IF NOT EXISTS produtos(
    referencia      INT             NOT NULL        AUTO_INCREMENT,
    descricao       TEXT            NOT NULL,
    preco           float           NOT NULL,
    stock           INT             NOT NULL,
    iva_id          INT             NOT NULL,
    CONSTRAINT pk_produtos_id PRIMARY KEY(referencia),
    CONSTRAINT pk_produtos_iva_id FOREIGN KEY(iva_id) REFERENCES ivas(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block
CREATE TABLE IF NOT EXISTS faturas(
    id              INT             NOT NULL        AUTO_INCREMENT,
    data            DATETIME        NOT NULL,
    valorTotal      FLOAT           NOT NULL,
    ivaTotal        FLOAT           NOT NULL,
    estado          enum('em lancamento', 'emitida') NOT NULL,
    cliente_id      INT             NOT NULL,
    funcionario_id  INT             NOT NULL,
    CONSTRAINT pk_faturas_id PRIMARY KEY(id),
    CONSTRAINT pk_faturas_cliente_id FOREIGN KEY(cliente_id) REFERENCES users(id),
    CONSTRAINT pk_faturas_funcionario_id FOREIGN KEY(funcionario_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- @block
CREATE TABLE IF NOT EXISTS linhas_faturas(
    id              INT             NOT NULL       AUTO_INCREMENT,
    quantidade      INT             NOT NULL,
    valor           FLOAT           NOT NULL, 
    valor_iva       FLOAT           NOT NULL,
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
    ('Ovos', 2.99, 50, 3);

-- @block
INSERT INTO users(username, password, email, telefone, NIF, morada, codPostal, localidade, role) VALUES
    ('marco', '123', 'marco@gmail.com', '987654321', '123321421', 'Rua da invenção', '2220-893', 'Lisboa', 'admin'),
    ('tomas', '123', 'tomas@gmail.com', '983454321', '132321421', 'Rua do teste', '2100-083', 'Aveiro', 'funcionario'),
    ('roberto', '123', 'roberto@gmail.com', '987633321', '123231421', 'Rua da avenida', '1200-113', 'Porto', 'funcionario'),
    ('diogo', '123', 'diogo@gmail.com', '987654444', '193121421', 'Rua da rua', '2220-111', 'Lisboa', 'cliente'),
    ('bernardo', '123', 'bernardo@gmail.com', '981234321', '983321421', 'Avenida Central', '2999-911', 'Leiria', 'cliente'),
    ('pedro', '123', 'pedro@gmail.com', '981298621', '983321221', 'Avenida Junta', '3949-921', 'Evora', 'cliente');


