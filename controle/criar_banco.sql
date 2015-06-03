drop database oxe;
create database oxe;
USE oxe;

CREATE TABLE admins(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	login varchar(30) NOT NULL,
	senha varchar(32) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (login)
);

insert into admins (nome, login, senha) values ('rodrigo', 'rodrigondec', md5('3c1a0l1a0n6g0o'));

drop database cne;
create database cne;
USE cne;

CREATE TABLE capitaes(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	login varchar(30) NOT NULL,
	senha varchar(32) NOT NULL,
	nick varchar(35) NOT NULL,
	telefone varchar(14) NOT NULL,
	cpf varchar(14) NOT NULL,
	PRIMARY KEY (id)
);

insert into capitaes (nome, login, senha, nick, telefone, cpf) values ('tiago', 'tiago@email.com', md5('tiago'), 'Anoubys', '(84) 998184097', '016.887.454-75');

CREATE TABLE jogadores(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	nick varchar(35) NOT NULL,
	cpf varchar(14) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE times(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	sigla varchar(10) NOT NULL,
	id_capitao int,
	id_integrante_2 int,
	id_integrante_3 int,
	id_integrante_4 int,
	id_integrante_5 int,
	id_reserva_1 int,
	id_reserva_2 int,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (sigla),
	FOREIGN KEY (id_capitao) REFERENCES capitaes(id),
	FOREIGN KEY (id_integrante_2) REFERENCES jogadores(id),
	FOREIGN KEY (id_integrante_3) REFERENCES jogadores(id),
	FOREIGN KEY (id_integrante_4) REFERENCES jogadores(id),
	FOREIGN KEY (id_integrante_5) REFERENCES jogadores(id),
	FOREIGN KEY (id_reserva_1) REFERENCES jogadores(id),
	FOREIGN KEY (id_reserva_2) REFERENCES jogadores(id)
);