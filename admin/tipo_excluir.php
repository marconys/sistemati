<?php 
//Incluindo o sistema de autenticação
include('acesso_com.php');
//Incluindo conexão com o banco de dados
include('../conexoes/conexao.php');

$id_tipo = $_GET['id_tipo'];

$query = "update tbtipos set disponivel_tipo = default where id_tipo = $id_tipo;";
$resultado = $conexao->query($query);

if(mysqli_insert_id($conexao)){
    header('location: tipos_lista.php');
}{
    header('location: tipos_lista.php');
}


?>