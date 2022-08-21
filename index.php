<?php include ('config.php');?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME;?></title>
    <link  rel="stylesheet" href="./css/meu_estilo.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
</head>
<body class="fundofixo">

<!-- Área do menu -->
<?php include('menu_publico.php');?>
<a name="home">&nbsp;</a>

<main class="container">

<!-- Área do Carousel -->
<?php include('carousel.php');?>


<!-- Área de destaque -->
<?php include('produtos_destaque.php');?>
<a name="destaques">&nbsp;</a>


<!-- Área produtos em geral -->
<?php include('produtos_geral.php');?>
<a name="produtos">&nbsp;</a>

<!-- Área de reservas -->
<?php include('reserva_geral.php');?>
<a name="reservas">&nbsp;</a>

<hr>

<!-- Área do rodapé -->
<footer>
<?php include('rodape.php');?>
<a name="contato">&nbsp;</a>
</footer>

</main>


<!-- Area de links dos arquivos bootstrap js -->

<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

    
</body>
</html>

