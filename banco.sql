create database sistema_login;

create table login (
    id int not null auto_increment,
    usuario varchar(50) not null,
    senha varchar(50) not null,
    primary key (id)
);
```