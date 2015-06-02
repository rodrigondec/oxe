USE oxe;

CREATE TABLE users(
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	login varchar(50) NOT NULL,
	senha varchar(35) NOT NULL,
	privilégio varchar(10) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (login)
);

USE cne;

CREATE TABLE times(

);