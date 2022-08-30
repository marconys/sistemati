<?php 
//inclui conexão com o banco
include('../../conexoes/conexao.php');
//inclui variavel de ambiente
include('../../config.php');
//inclui acesso
include('../acesso_com.php');
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/meu_estilo.css" rel="stylesheet" type="text/css">
    <title><?php echo SYS_NAME ." - Lista (".$totalLinhas.")"; ?> - Reservas </title>
</head>

<body class="fundofixo">
    <?php include('index.php');?>
    <main class="container">
        <h1 class="breadcrump alert-danger glyphicon glyphicon-list-alt">Buascar Reservas</h1>
        <table class="table table-condensed table-hover tbopacidade" style="background-color: #ff7f73;">
            
          <!-- Verifica se existe reservas em analise -->
          <?php if($linha == 0){
                echo "<div><h1 class='breadcrump alert-danger'>Nenum resultado encontrado para!</h1></div>";
            }else { ?>
            <thead>
                <th>ID RESERVA</th>                
                <th>DATA</th>
                <th>HORA</th>
                <th>STATUS DA RESERVA</th>
                <th>MOTIVO</th>
                <th>MUMERO DE PESSOAS</th> 
                <th>VALOR</th> 
                <th>NOME CLIENTE</th> 
                <th>NÚMERO DA MESA</th>  
                <th>PARECER</th>            
                <th class="largButton">
                    <img src="../../images/logochurrascopequeno.png" alt="" class="largButton">
                </th>
            </thead> <!-- Final linha de cabeçalho da tabela -->
            <!-- tboby>tr>td*8 -->
            <tboby>
                <!-- Corpo da tabela -->
                <!--Abre estrutura de repetição-->
                <?php do { ?>
                    <tr>
                        <!-- Linha da tabela -->
                        <td><?php echo $linha['id_reserva']; ?></td>
                        <td class="hidden"><?php echo $linha['status_reserva']; ?></td>
                        <td>
                            <span class="hidden-xs"><?php echo $linha['data_reserva'];?></span>
                        </td>
                        <td><?php echo $linha['hora_reserva']; ?></td>
                        <td>
                            <?php
                            if ($linha['status_reserva'] == 'Inativa' || $linha['status_reserva'] == 'Espirada') {
                                echo ("<span class='glyphicon glyphicon-remove text-danger aria-hidden='true'></span>");
                            } 
                            ?>
                            <?php echo $linha['status_reserva']; ?>                           
                        </td> 
                        <td><?php echo $linha['motivo_reserva']; ?></td>
                        <td><?php echo $linha['numero_pessoas_reserva']; ?></td> 
                        <td><?php echo number_format($linha['valor_reserva'], 2, ',', '.'); ?></td>  
                        <td><?php echo $linha['nome_cliente']; ?></td>
                        <td><?php echo $linha['numero_mesa_reserva']; ?></td> 
                        <td><?php echo $linha['parecer_reserva']; ?></td>                                                                 
                        

                        <td>
                            <a href="ativa_reserva.php?id_reserva=<?php echo $linha['id_reserva']; ?>" class="btn btn-success largButton btn-xs">
                                <span class="hidden-xs">Reativar</span>
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr> <!-- Final da linha da tabela -->
                <?php } while ($linha = $lista->fetch_assoc());} ?>
            </tboby> <!-- Final do corpo da tabela -->

        </table>

    </main>
    
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>