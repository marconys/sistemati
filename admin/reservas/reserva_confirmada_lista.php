<?php
//Incluindo variaveis do sistema
include ('../../config.php');

//Incluindo o sistema de autenticação
include('../acesso_com.php');

//Incluindo o Arquivo de conexão
include('../../conexoes/conexao.php');

//Selecionando os dados e ordenando por ordem alfabetica
$consulta = "select r.id_reserva,
r.data_reserva,
r.hora_reserva,
r.motivo_reserva,
r.numero_pessoas_reserva,
r.numero_mesa_reserva,
r.valor_reserva,
r.status_reserva,
r.parecer_reserva,
C.email_cliente,
c.nome_cliente
from tbreserva r
INNER JOIN tbcliente c on r.id_cliente_reserva = c.id_cliente   
and r.status_reserva = 'Confirmada'";

//Buscar a lista completa de tipos
$lista = $conexao->query($consulta);

//Separar tipos por linha
$linha = $lista->fetch_assoc();

//Contar numero de linhas da lista
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
        <h1 class="breadcrump alert-success glyphicon glyphicon-ok">Reservas Confirmadas</h1>
        <table class="table table-condensed table-hover tbopacidade" style="background-color: #108c00;">
            <!-- Verifica se existe reservas em analise -->
        <?php if($linha == 0){
                echo "<div><h1 class='breadcrump alert-success'>Você não possui reservas para cancelar!</h1></div>";
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
                            if ($linha['status_reserva'] == "Negado" || $linha['status_reserva'] == 'Inativa') {
                                echo ("<span class='glyphicon glyphicon-remove text-warning aria-hidden='true'></span>");
                            } else if($linha['status_reserva'] == "Em análise"){
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
                            <a href="cancela_reserva.php?id_reserva=<?php echo $linha['id_reserva']; ?>" class="btn btn-danger largButton btn-xs">
                                <span class="hidden-xs">Cancelar</span>
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
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