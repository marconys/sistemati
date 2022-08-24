<?php 
//Incluindo o sistema de autenticação
include('acesso_com.php');
//Incluindo conexão com o banco de dados
include('../conexoes/conexao.php');

$id_prod = $_GET['id_produto'];
/*//Removendo usando músculos (Força bruta)
$query = "delete from tbprodutos where id_produto = $id_prod;";
$resultado = $conexao->query($query);

if(mysqli_insert_id($conexao)){
    header('location: produtos_lista.php');
}{
    header('location: produtos_lista.php');
}
*/
//Removendo usando o método acumulador (vai que precisa outra hora)
$query = "update tbprodutos set disponivel_produto = default where id_produto = $id_prod;";
$resultado = $conexao->query($query);

if(mysqli_insert_id($conexao)){
    header('location: produtos_lista.php');
}{
    header('location: produtos_lista.php');
}


?>