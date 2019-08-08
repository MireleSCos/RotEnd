create SCHEMA rotend;
use rotend;


CREATE TABLE tb_estados (
  uf char(2) NOT NULL PRIMARY KEY,
  nome varchar(20) NOT NULL
);

CREATE TABLE tb_cidades(
  id int auto_increment primary key,
  estado char(2) NOT NULL,
  nome varchar(50) NOT NULL,
  foreign key (estado) references tb_estados(uf)
);
create table pessoa(
    
    nome varchar (50) not null,
    cpf varchar (14) not null primary key,
    email varchar (100) not null unique,
    endereco varchar (30) not null,
    telefone varchar (15) not null,
    senha varchar (20) not null,
    cod_local int not null,
    tipousuario int not null,
    foreign key (cod_local) references tb_cidades (id)
);
create table status_ro(
    cod_status int primary key,
    nome varchar(10) not null
);
insert into status_ro values ('0','Andamento');
insert into status_ro values ('1','Concluida');
insert into status_ro values ('2','Impossivel');
insert into status_ro values ('3','Cancelada');
insert into status_ro values ('4','Fechada');
create table rotas(
    cod_rota int not null auto_increment,
    saida varchar(200) not null,
    chegada varchar(200) not null,
    pontos varchar(60000) not null,
    agente  varchar (14) not null,
    dat_in date not null,
    dat_fi date not null,
    status_ro int not null,
    dat_fi_ver date,
    obs varchar (200),
    foreign key (status_ro)references status_ro(cod_status),
    foreign key (agente) references pessoa(cpf),
    primary key (cod_rota)

);

create table agente(
    
    cpf varchar (14) not null primary key,
    gerente varchar (14) not null,
    foreign key (cpf) references pessoa (cpf),
    foreign key (gerente) references pessoa (cpf)

);
create table tipoServico(
    
    cod_ser int primary key ,
    nome varchar(25) not null

);
insert into tiposervico values ('1','Visita Periodica');
insert into tiposervico values ('2','Denucia');
insert into tiposervico values ('3','Combate a focos');
insert into tiposervico values ('4','Outros');
create table status_obs(
    descricao varchar(30) primary key
);
insert into status_obs values ('aberta');
insert into status_obs values ('fechada');
insert into status_obs values ('Direcionada');
create table obsrota(
    id int auto_increment primary key,
    id_ger varchar (14) not null,
    id_agen varchar (14) not null,
    id_rota int not null,
    obs varchar (200) not null,
    status_obs varchar(30) not null,
    dat_ob date not null,
    respon  varchar (14) not null,
    foreign key (id_agen) references pessoa (cpf),
    foreign key (id_ger) references pessoa (cpf),
    foreign key (respon) references pessoa (cpf),
    foreign key (id_rota) references rotas (cod_rota),
    foreign key (status_obs) references status_obs(descricao)

);
create table solic_servico(
    cod int auto_increment primary key,
    dat_so date not null,
    dat_at date not null,
    endereco varchar(1000) not null,
    cod_ser int not null,
    descricao varchar(300),
    cod_local int not null,
    cidadao varchar (14) not null ,
    status_at varchar(30) not null,
    respon  varchar (14) not null,
    foreign key (respon) references pessoa (cpf),
    foreign key (status_at) references status_obs(descricao),
    foreign key (cidadao) references pessoa (cpf),
    foreign key (cod_local) references tb_cidades (id),
    foreign key (cod_ser)references tipoServico(cod_ser)
);
