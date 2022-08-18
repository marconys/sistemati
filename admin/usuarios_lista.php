<?php
//Incluindo o sistema de autenticação
include('acesso_com.php');

//Incluindo o Arquivo de conexão
include('../conexoes/conexao.php');

//Selecionando os dados
$consulta = "select * from tbusuarios order by login_usuario asc";

//Buscar a lista completa de usuarios
$lista = $conexao->query($consulta);

//Separar usuarios por linha
$linha = $lista->fetch_assoc();

//Contar numero de linhas da lista
$totalLinhas = $lista->num_rows;
?>