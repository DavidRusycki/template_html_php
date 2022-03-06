
DataBaseName = template

/*Criação da tabela de rotinas*/

create table tbrotina(
	codigo serial not null,
	nome varchar(50) not null
);

alter table tbrotina add constraint pk_tbrotina primary key (codigo);

/* Valores padrões para rotinas */
INSERT INTO TBROTINA VALUES (1, 'login');
INSERT INTO TBROTINA VALUES (2, 'rotinas');


/*Criação da tabela de usuários*/

create table tbusuario(
	codigo serial not null,
	nome varchar(50) not null
);

alter table tbusuario add constraint pk_tbusuario primary key (codigo);

