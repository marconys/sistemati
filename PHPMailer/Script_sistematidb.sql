-- create database sistemaDB;
 -- use sistemaDB;
-- estrutura da tabela de produtos
create table tbprodutos(
id_produto int(11) primary key auto_increment not null,
id_tipo_produto int  not null,
descri_produto varchar(100) not null,
resumo_produto varchar(1000) default null,
valor_produto decimal(10,2) default null,
imagem_produto varchar(50) default null,
destaque_produto enum('Sim', 'Não') not null,
disponivel_produto enum('Sim', 'Não') null default 'Não'
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbprodutos`
INSERT INTO `tbprodutos` (`id_produto`, `id_tipo_produto`, `descri_produto`, `resumo_produto`, `valor_produto`, `imagem_produto`, `destaque_produto`, `disponivel_produto`) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', '29.90', 'picanha_alho.jpg', 'Sim', 'Sim'),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', '29.90', 'fraldinha.jpg', 'Não', 'Sim'),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', '29.90', 'costelona.jpg', 'Sim', 'Sim'),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', '29.90', 'cupim.jpg', 'Sim', 'Sim'),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', '29.90', 'picanha_sem.jpg', 'Não', 'Sim'),
(6, 2, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', '29.90', 'strudel.jpg', 'Não', 'Sim'),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', '29.90', 'alcatra_pedra.jpg', 'Não', 'Sim'),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', '29.90', 'maminha.jpg', 'Não', 'Sim'),
(9, 2, 'Abacaxiiiiiiii', 'Abacaxi assado com canela ao creme de leite condensado ', '29.90', 'abacaxi.jpg', 'Não', 'Sim'),
(10, 3, 'Dolly Guaraná', 'Oi, pessoal, sou o Dollynho, seu amiguinho. Vamos cantar? Dolly Dolly Guaraná Dolly, o melhor. Dolly Guaraná O sabor brasileiro. Dolly, Dolly Guaraná ', '3.80', 'dolly.jpg', 'Não', 'Não');

-- estrutura da tabela tbtipos

create table tbtipos(
id_tipo int(11) primary key auto_increment not null,
sigla_tipo varchar(3) not null,
rotulo_tipo varchar(15) not null,
disponivel_tipo enum('Sim', 'Não') null default 'Não'
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbtipos`
INSERT INTO `tbtipos` (`id_tipo`, `sigla_tipo`, `rotulo_tipo`,`disponivel_tipo`) VALUES
(1, 'chu', 'Churrasco', 'Sim'),
(2, 'sob', 'Sobremesa', 'Sim'),
(3, 'beb', 'Bebidas', 'Não');

-- estrutura da tabela tbusuários

create table tbusuarios(
id_usuario int(11) primary key auto_increment not null,
login_usuario varchar(30) not null unique,
senha_usuario varchar(8) not null,
id_nivel_usuario int(11) not null,
foto_usuario varchar(60) default null
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbusuarios`

INSERT INTO `tbusuarios` (`id_usuario`, `login_usuario`, `senha_usuario`, `id_nivel_usuario`, `foto_usuario`) VALUES
(1, 'senac', '1234', 1, 'senac.png'),
(2, 'joao', '4568', 2, 'joao.png'),
(3, 'maria', '7894', 3, 'maria.png'),
(4, 'well', '1234', 1, 'well.png'),
(5, 'marconys', '1234', 1, 'marconys.png');


create table tbnivel(
id_nivel int(11) primary key auto_increment not null,
nome_nivel varchar(20) not null
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbnivel`

insert into tbnivel (id_nivel, nome_nivel) 
values (1,'Supervisor'),(2,'Comercial'),(3,'Cliente'),(4,'Desligado');

-- estrutura da tabela tbcliente

create table tbcliente(
id_cliente int(11) primary key auto_increment not null,
nome_cliente varchar(60) not null,
cpf_cliente varchar(11) not null unique,
email_cliente varchar(32) not null unique,
senha_cliente varchar(8) not null
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbcliente`

insert into `tbcliente` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `email_cliente`, `senha_cliente`)
values (6,'cliente', 12345678950, 'cliente@gmail.com', '1234');


-- Estrutura da tabela tbreserva

create table tbreserva(
id_reserva int(11) primary key auto_increment not null,
id_cliente_reserva int(11) not null,
data_reserva date not null,
hora_reserva time not null,
numero_mesa_reserva int (11) null,
numero_pessoas_reserva int (11) not null,
motivo_reserva varchar(100) null,
valor_reserva decimal(10,2) null default 59.90,
status_reserva varchar(20) null default 'Em análise',
parecer_reserva varchar(100) null

)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbreserva`

/*insert into tbreserva(id_reserva, id_cliente_reserva, data_reserva, hora_reserva, numero_mesa_reserva, 
numero_pessoas_reserva, motivo_reserva, valor_reserva, status_reserva, parecer_reserva)
values (default,1,"2022-10-09", "19:00:00", 20, 7, "Aniversário" ,default, default, default); */

-- restrição (constraint) da tabela produtos
alter table tbprodutos 
add constraint id_tipo_produto_fk foreign key (id_tipo_produto)
references tbtipos (id_tipo) on delete no action  on update no action;

-- restrição (constraint) da tabela tbreserva
alter table tbreserva
add constraint id_cliente_reserva_fk foreign key (id_cliente_reserva)
references tbcliente (id_cliente) on delete no action  on update no action;

-- restrição (constraint) da tabela tbusuario
alter table tbusuarios
add constraint id_nivel_usuario_fk foreign key (id_nivel_usuario)
references tbnivel (id_nivel) on delete no action  on update no action;

-- view tbprodutos

create view vw_tbprodutos as 
select p.id_produto,
      p.id_tipo_produto,
      t.sigla_tipo,
      t.rotulo_tipo,
      p.descri_produto,
      p.resumo_produto,
      p.valor_produto, 
      p.imagem_produto, 
      p.destaque_produto,
      p.disponivel_produto
      
     -- Extraindo dados da tabela tbprodutos 
      
from tbprodutos p
join tbtipos t 
where p.id_tipo_produto = t.id_tipo;

select * from vw_tbprodutos;
select * from tbtipos;
select * from tbusuarios;
select * from tbprodutos;
select * from tbcliente;
select * from tbreserva;
select* from tbnivel;

-- Extraindo dados da tabela tbreserva 
select r.id_reserva,
r.data_reserva,
r.hora_reserva,
r.motivo_reserva,
r.numero_pessoas_reserva,
r.valor_reserva,
r.status_reserva,
c.nome_cliente
from tbreserva r
INNER JOIN tbcliente c on r.id_cliente_reserva = c.id_cliente and  r.status_reserva = 'Confirmada' or r.status_reserva = 'Em análise';

-- Extraindo dados da tabela tusuarios 
select all u.id_usuario,
u.login_usuario,
u.foto_usuario,
n.nome_nivel
from tbusuarios u
INNER JOIN tbnivel n on u.id_usuario = n.id_nivel and u.login_usuario = u.login_usuario;

-- Procedure tbcliente_inserir

delimiter |
CREATE PROCEDURE tbcliente_inserir(
nome_cliente varchar(60), 
cpf_cliente varchar(11),
email_cliente varchar(32),
senha_cliente varchar(8)
)
BEGIN
insert usuarios (nome, email, senha,idnv_user,ativo) 
values (nome_cliente, cpf_cliente,email_cliente, md5(_senha));
    select * from tbcliente where id_cliente = (select @@identity);    
END
|

delimiter |