<?php 
//Incluindo o sistema de autenticação
include('acesso_com.php');
//Incluindo conexão com o banco de dados
include('../conexoes/conexao.php');

$id_user= $_GET['id_usuario'];
//Removendo usando músculos (Força bruta)
$query = "delete from tbnivel where id_usuario = $id_user;";
$resultado = $conexao->query($query);

if(mysqli_insert_id($conexao)){
    header('location: usuarios_lista.php');
}{
    header('location: usuarios_lista.php');
}




?>