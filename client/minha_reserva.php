<?php
//Incluindo variaveis do sistema
include ('../config.php');

//Incluindo o sistema de autenticação
include('../admin/acesso_com.php');

//Incluindo o Arquivo de conexão
include('../conexoes/conexao.php');

$email = $_SESSION['login_usuario'];

//Selecionando os dados e ordenando por ordem alfabetica
$consulta = "select r.id_reserva,
r.data_reserva,
r.hora_reserva,
r.motivo_reserva,
r.numero_pessoas_reserva,
r.valor_reserva,
r.status_reserva,
C.email_cliente,
c.nome_cliente
from tbreserva r
INNER JOIN tbcliente c on r.id_cliente_reserva = c.id_cliente   
and c.email_cliente = '$email'";

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
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
    <title><?php echo SYS_NAME ." - Lista (".$totalLinhas.")"; ?> - Reservas </title>
</head>

<body class="fundofixo">
    <?php include('menu_cliente.php'); ?>

    <main class="container">
        <h1 class="breadcrump alert-danger glyphicon glyphicon-list-alt">Minhas Reservas</h1>
        <table class="table table-condensed table-hover tbopacidade" style="background-color: #e4b9b9;">
            <!-- Verifica se existe reservas em analise -->
        <?php if($linha == 0){
                echo "<div><h1 class='breadcrump alert-danger'>Você não possui reservas!</h1></div>";
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
                <th class="largButton">
                    <img src="../images/logochurrascopequeno.png" alt="" class="largButton">
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
                            if ($linha['status_reserva'] == "Negado" || $linha['status_reserva'] == 'Inativa' || $linha['status_reserva'] == 'Espirada') {
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
                        <td>
                        <button class="btn btn-danger largButton btn-xs delete" 
                            role="button"                             
                            data-id="<?php echo $linha['id_reserva'];?>"
                            data-nome="<?php echo $linha['data_reserva'];?>" >
                            <span class="hidden-xs">Excluir</span>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr> <!-- Final da linha da tabela -->
                <?php } while ($linha = $lista->fetch_assoc());} ?>
            </tboby> <!-- Final do corpo da tabela -->

        </table>

    </main>
    <!-- Inicio do modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-danger">Atenção!</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente<strong> excluir </strong> a reserva para a data?
                    <h3><span class="text-danger nome"></span></h3>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                    <button class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>                         
    </div> <!-- Fim do modal -->
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Script para o modal -->
    <script type="text/javascript">
        $('.delete').on('click', function(){
            //Busca o valor do atributo data-nome
            var nome = $(this).data('nome');
            //Busca o valor do atributo data-id
            var id = $(this).data('id');
            //Insere o nome do item na confirmação do modal
            $('span.nome').text(nome);
            //Envia o id através do link do butão confirmar
            $('a.delete-yes').attr('href', 'reserva_excluir.php?id_reserva='+id);
            //Abre o Modal
            $('#myModal').modal('show');

        });
    </script>

</body>

</html>