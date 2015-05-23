USE oxe;

CREATE TABLE users (
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	login varchar(50) NOT NULL,
	senha varchar(35) NOT NULL,
	sistema varchar(10) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome),
	UNIQUE (login),
	UNIQUE (senha)
);

CREATE TABLE concurso_tradicional_animeke ( 
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	musica varchar(35) NOT NULL,
	origem_musica varchar(35) NOT NULL,
	nota_afinacao varchar(25) NOT NULL, 
	nota_tempo varchar(25) NOT NULL, 
	nota_diccao varchar(25) NOT NULL,
	nota_vibrato varchar(25) NOT NULL,
	nota_impostacao varchar(25) NOT NULL,
	nota_interpretacao varchar(25) NOT NULL,
	nota_finalizacoes varchar(25) NOT NULL,
	media varchar(6) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

CREATE TABLE concurso_livre_animeke ( 
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	musica varchar(35) NOT NULL,
	origem_musica varchar(35) NOT NULL,
	nota_afinacao varchar(25) NOT NULL, 
	nota_tempo varchar(25) NOT NULL, 
	nota_diccao varchar(25) NOT NULL,
	nota_vibrato varchar(25) NOT NULL,
	nota_impostacao varchar(25) NOT NULL,
	nota_interpretacao varchar(25) NOT NULL,
	nota_finalizacoes varchar(25) NOT NULL,
	media varchar(6) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

CREATE TABLE concurso_desfile_cosplay ( 
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	personagem varchar(35) NOT NULL,
	serie varchar(35) NOT NULL,
	outras_informacoes varchar(50),
	telefone varchar(14) NOT NULL,
	identidade varchar(14) NOT NULL,
	nota_fig_e_est varchar(25) NOT NULL,
	nota_int_e_per varchar(25) NOT NULL,
	media varchar(6) NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE concurso_tradicional_cosplay ( 
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	personagem varchar(35) NOT NULL,
	serie varchar(35) NOT NULL,
	outras_informacoes varchar(50),
	telefone varchar(14) NOT NULL,
	identidade varchar(14) NOT NULL,
	nota_fig_e_est varchar(25) NOT NULL,
	nota_apr varchar(25) NOT NULL,
	nota_fid varchar(25) NOT NULL,
	media varchar(6) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

CREATE TABLE concurso_livre_cosplay ( 
	id int NOT NULL auto_increment,
	nome varchar(35) NOT NULL,
	personagem varchar(35) NOT NULL,
	serie varchar(35) NOT NULL,
	outras_informacoes varchar(50),
	telefone varchar(14) NOT NULL,
	identidade varchar(14) NOT NULL,
	nota_fig_e_est varchar(25) NOT NULL,
	nota_apr varchar(25) NOT NULL,
	nota_cri varchar(25) NOT NULL,
	media varchar(6) NOT NULL,
	PRIMARY KEY (id),
	UNIQUE (nome)
);

INSERT INTO users (nome, login, senha, sistema) values ('Rodrigo Nunes de Castro', 'rodrigolnr@gmail.com', md5('3c1a0l1a0n6g0o'), 'admin'), ('Lucas Capistriano', 'lucas', md5('animeke'), 'animeke'), ('Tiago Filipe', 'tiago', md5('cosplay'), 'cosplay');

INSERT INTO concurso_desfile_cosplay (nome, serie, personagem, outras_informacoes, telefone, identidade) VALUES 
('Greyce', 'League of Legends', 'Vayne', '', '(84) 1111-8888', '111.ggg.ggg-gg'),
('Dessa','Marvel','Deadpool','', '(84) 2222-8888', '222.ggg.ggg-gg'),
('Sarah', 'League of Legens', 'Akali BloodMoon', '', '(84) 3333-8888', '333.ggg.ggg-gg'),
('Tiago', 'DC Universe', 'Super Man', '', '(84) 4444-8888', '444.ggg.ggg-gg'),
('Lucas', 'DC Universe', 'Silver Surfer', '', '(84) 5555-8888', '555.ggg.ggg-gg');

INSERT INTO concurso_livre_cosplay (nome, serie, personagem, outras_informacoes, telefone, identidade) VALUES 
('Greyce', 'League of Legends', 'Vayne', '', '1111-8888', '111.ggg.ggg-gg'),
('Dessa','Marvel','Deadpool','', '(84) 2222-8888', '222.ggg.ggg-gg'),
('Sarah', 'League of Legens', 'Akali BloodMoon', '', '(84) 3333-8888', '333.ggg.ggg-gg'),
('Tiago', 'DC Universe', 'Super Man', '', '(84) 4444-8888', '444.ggg.ggg-gg'),
('Lucas', 'DC Universe', 'Silver Surfer', '', '(84) 5555-8888', '555.ggg.ggg-gg');

INSERT INTO concurso_tradicional_cosplay (nome, serie, personagem, outras_informacoes, telefone, identidade) VALUES 
('Greyce', 'League of Legends', 'Vayne', '', '(84) 1111-8888', '111.ggg.ggg-gg'),
('Dessa','Marvel','Deadpool','', '(84) 2222-8888', '222.ggg.ggg-gg'),
('Sarah', 'League of Legens', 'Akali BloodMoon', '', '(84) 3333-8888', '333.ggg.ggg-gg'),
('Tiago', 'DC Universe', 'Super Man', '', '(84) 4444-8888', '444.ggg.ggg-gg'),
('Lucas', 'DC Universe', 'Silver Surfer', '', '(84) 5555-8888', '555.ggg.ggg-gg');