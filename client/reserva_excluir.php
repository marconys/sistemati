<?php 
//Incluindo o sistema de autenticação
include('../admin/acesso_com.php');
//Incluindo conexão com o banco de dados
include('../conexoes/conexao.php');

$id_prod = $_GET['id_reserva'];
//Removendo usando o método acumulador (vai que precisa outra hora)
$query = "update tbreserva set status_reserva = default where id_reserva = $id_prod;";
$resultado = $conexao->query($query);

if(mysqli_insert_id($conexao)){
    header('location: minha_reserva.php');
}{
    header('location: minha_reserva.php');
}

?>