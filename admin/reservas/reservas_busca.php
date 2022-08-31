<?php 
//inclui conexão com o banco
include('../../conexoes/conexao.php');
//inclui variavel de ambiente
include('../../config.php');
//inclui acesso
include('../acesso_com.php');

$busca = ($_GET['buscar_reserva']);

$consulta = "select r.id_reserva,
r.data_reserva,
r.hora_reserva,
r.motivo_reserva,
r.numero_pessoas_reserva,
r.numero_mesa_reserva,
r.parecer_reserva,
r.valor_reserva,
r.status_reserva,
c.nome_cliente,
c.cpf_cliente
from tbreserva r
INNER JOIN tbcliente c on r.id_cliente_reserva = c.id_cliente and  r.status_reserva LIKE '%$busca%'
or r.data_reserva LIKE '%$busca%' or c.cpf_cliente LIKE '%$busca%' ";

$lista = $conexao->query($consulta);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;


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
                <th>CPF</th>               
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
                        <td><?php echo $linha['cpf_cliente']; ?></td>
                        <td class="hidden"><?php echo $linha['status_reserva']; ?></td>
                        <td>
                            <span class="hidden-xs"><?php echo $linha['data_reserva'];?></span>
                        </td>
                        <td><?php echo $linha['hora_reserva']; ?></td>
                        <td>
                            <?php
                            if ($linha['status_reserva'] == 'Inativa' || $linha['status_reserva'] == 'Espirada') {
                                echo ("<span class='glyphicon glyphicon-remove text-danger aria-hidden='true'></span>");
                            } else if ($linha['status_reserva'] == 'Em análise') {
                                echo ("<span class='glyphicon glyphicon-time text-warning aria-hidden='true'></span>");
                            } else{
                                echo ("<span class='glyphicon glyphicon-ok text-success aria-hidden='true'></span>");
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
                            <a href="analisar_reserva.php?id_reserva=<?php echo $linha['id_reserva']; ?>" class="btn btn-info largButton btn-xs">
                                <span class="hidden-xs">Analisar</span>
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </a>
                            
                            <a href="ativa_reserva.php?id_reserva=<?php echo $linha['id_reserva']; ?>" class="btn btn-success largButton btn-xs">
                                <span class="hidden-xs">Reativar</span>
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                            </a>
                            <a href="cancela_reserva.php?id_reserva=<?php echo $linha['id_reserva']; ?>" class="btn btn-danger largButton btn-xs">
                                <span class="hidden-xs">Cancelar</span>
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                            </a>
                            <a href="reserva_conf_envia.php?id_reserva=<?php echo $linha['id_reserva']; ?>" class="btn btn-info largButton btn-xs">
                                <span class="hidden-xs">Enviar</span>
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
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