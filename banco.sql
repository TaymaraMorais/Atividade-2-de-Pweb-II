create database login;

use login;

create table tb_usuarios
(
	id int auto_increment primary key,
    nome text not null,
    usuario text not null,
    email text not null,
    senha text not null
)
    