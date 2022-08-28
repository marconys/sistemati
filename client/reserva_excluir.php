<?php 
//Incluindo o sistema de autenticação
include('../admin/acesso_com.php');
//Incluindo conexão com o banco de dados
include('../conexoes/conexao.php');

$id_res = $_GET['id_reserva'];
//Removendo usando o método acumulador (vai que precisa outra hora)
$query = "update tbreserva set status_reserva = 'Inativa', parecer_reserva = 'Cancelado Pelo cliente' where id_reserva = $id_res;";
$resultado = $conexao->query($query);

if(mysqli_insert_id($conexao)){
    header('location: minha_reserva.php');
}{
    header('location: minha_reserva.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Cancelamento</title>
</head>
<body>
    
    
</body>
</html>