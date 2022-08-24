<?php 
//Incluindo variaveis do sistema
include ('../config.php');

//Incluindo o sistema de autenticação
include('../admin/acesso_com.php');

//Incluindo o Arquivo de conexão
include('../conexoes/conexao.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
    <title><?php echo SYS_NAME; ?> - Cancelar Reserva </title>
</head>
<body class="fundofixo">
    <?php include('menu_cliente.php');?>
    
</body>
</html>