create database bm_autopecas;
use bm_autopecas;

create table users(
	id int primary key not null auto_increment,
    usuario varchar(200) not null,
    senha varchar(100) not null
);

create table produtos(
	id int primary key not null auto_increment,
    nome varchar(600) not null,
    quantidade int not null,
    imagem varchar(600),
    descricao_rapida varchar(600),
    descricao varchar(1000),
    preco varchar(10)
);

