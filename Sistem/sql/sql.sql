
DataBaseName = template

/*Criação da tabela de rotinas*/

create table tbrotina(
	codigo serial not null,
	nome varchar(50) not null
);

alter table tbrotina add constraint pk_tbrotina primary key (codigo);


/*Criação da tabela de usuários*/

create table tbusuario(
	codigo serial not null,
	nome varchar(50) not null
);

alter table tbusuario add constraint pk_tbusuario primary key (codigo);

