CREATE DATABASE ADMESCOLA;
USE ADMESCOLA;
/* ===========================
   TABELA ALUNOS
   =========================== */
CREATE TABLE Alunos (
    Aluno_id SMALLINT AUTO_INCREMENT,
    Nome VARCHAR(40) NOT NULL,
    Email VARCHAR(80) GENERATED ALWAYS AS (CONCAT(Nome, '@aluno.com')) STORED,
    Numero BIGINT NOT NULL,
    Cursando VARCHAR(20) NOT NULL,
    data_nascimento DATE NOT NULL,
    Quant_Faltas TINYINT,
    Senha VARCHAR(10) not null
    PRIMARY KEY (Aluno_id)
);

/* ===========================
   TABELA PROFESSORES
   =========================== */
CREATE TABLE Professores (
    Professores_id SMALLINT AUTO_INCREMENT,
    Nome VARCHAR(40) NOT NULL,
    Email VARCHAR(80) GENERATED ALWAYS AS (CONCAT(Nome, '@professor.com')) STORED,
    Numero BIGINT NOT NULL,
    especializacao VARCHAR(30),
     Senha VARCHAR(10) not null
    PRIMARY KEY (Professores_id)
);

/* ===========================
   TABELA DISCIPLINAS
   =========================== */
CREATE TABLE Disciplina (
    Disciplina_id TINYINT AUTO_INCREMENT,
    Nome VARCHAR(30) NOT NULL,
    descricao VARCHAR(80),
    PRIMARY KEY (Disciplina_id)
);

/* ===========================
   TABELA TURMAS
   =========================== */
CREATE TABLE Turmas (
    Turma_id SMALLINT AUTO_INCREMENT,
    Disciplina_id TINYINT,
    Professor_resp SMALLINT,
    Aluno_id SMALLINT,
    FOREIGN KEY (Disciplina_id) REFERENCES Disciplina(Disciplina_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Professor_resp) REFERENCES Professores(Professores_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Aluno_id) REFERENCES Alunos(Aluno_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (Turma_id)
);

/* ===========================
   TABELA NOTAS
   =========================== */
CREATE TABLE Notas (
    Nota_id SMALLINT AUTO_INCREMENT,
    Aluno_id SMALLINT,
    Disciplina_id TINYINT,
    Nota1 DECIMAL(5,2),
    Nota2 DECIMAL(5,2),
    Media DECIMAL(5,2) AS ((Nota1 + Nota2) / 2) STORED,
    FOREIGN KEY (Aluno_id) REFERENCES Alunos(Aluno_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Disciplina_id) REFERENCES Disciplina(Disciplina_id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (Nota_id)
);

/* ===========================
   INSERT DISCIPLINAS
   =========================== */
INSERT INTO Disciplina (Nome, descricao) VALUES
('Historia', 'Estudo da historia geral'),
('Matematica', 'Estudo dos numeros'),
('Fisica', 'Estudo dos fenomenos fisicos'),
('Quimica', 'Estudo das substancias'),
('Geografia', 'Estudo do planeta');

/* ===========================
   INSERT PROFESSORES
   =========================== */
INSERT INTO Professores (Numero, Nome, especializacao) VALUES
(11223344556, 'Silva', 'Historia'),
(22334455667, 'Souza', 'Matematica'),
(33445566778, 'Almeida', 'Fisica'),
(44556677889, 'Oliveira', 'Quimica'),
(55667788990, 'Santos', 'Geografia');

/* ===========================
   INSERT ALUNOS
   =========================== */
INSERT INTO Alunos (Numero, Cursando, Nome, data_nascimento, Quant_Faltas) VALUES
(12345678901, 'Historia', 'Jose', '2005-05-06', 0),
(98765432102, 'Matematica', 'Maria', '2004-10-12', 1),
(45678901234, 'Fisica', 'Carlos', '2003-08-19', 2),
(32109876543, 'Quimica', 'Ana', '2005-02-22', 3),
(65432109876, 'Geografia', 'Pedro', '2006-07-14', 0);

/* ===========================
   INSERT TURMAS (IDs já existem!)
   =========================== */
INSERT INTO Turmas (Disciplina_id, Professor_resp, Aluno_id) VALUES
(1, 1, 1),  -- Jose em Historia com Prof. Silva
(2, 2, 2),  -- Maria em Matematica com Prof. Souza
(3, 3, 3),  -- Carlos em Fisica com Prof. Almeida
(4, 4, 4),  -- Ana em Quimica com Prof. Oliveira
(5, 5, 5);  -- Pedro em Geografia com Prof. Santos

/* ===========================
   INSERT NOTAS
   =========================== */
INSERT INTO Notas (Aluno_id, Disciplina_id, Nota1, Nota2) VALUES
(1, 1, 8.5, 9.0),
(2, 2, 7.0, 6.5),
(3, 3, 5.5, 7.5);
