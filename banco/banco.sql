create database noticiasCrud;
use noticiasCrud;

create table lauro_noticias(
    cd_noticia int not null auto_increment primary key,
    nm_titulo varchar(100), 
    nm_slug varchar(100), 
    nm_desc varchar(100), 
    nm_conteudo text, 
    nm_plcv varchar(100)
);