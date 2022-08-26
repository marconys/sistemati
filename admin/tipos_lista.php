<?php
//Incluindo variaveis do sistema
include ('../config.php');

//Incluindo o sistema de autenticação
include('acesso_com.php');

//Incluindo o Arquivo de conexão
include('../conexoes/conexao.php');

//Selecionando os dados e ordenando por ordem alfabetica
$consulta = "select * from tbtipos order by sigla_tipo asc";

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
    <title><?php echo SYS_NAME ." - Lista (".$totalLinhas.")"; ?> - Tipos </title>
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>

    <main class="container">
        <h1 class="breadcrump alert-warning glyphicon glyphicon-list-alt">Lista de Tipos</h1>
        <table class="table table-condensed table-hover tbopacidade" style="background-color: #f7ecb5;">
            <!--thead>th*8-->
            <thead>
                <th>ID</th>                
                <th>Sigla</th>
                <th>Rotulo</th>                
                <th class="largButton">
                    <a href="tipos_insere.php" class="btn largButton btn-primary btn-xs">
                        <span class="hidden-xs">Adicionar<br></span>
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </th>
            </thead> <!-- Final linha de cabeçalho da tabela -->
            <!-- tboby>tr>td*8 -->
            <tboby>
                <!-- Corpo da tabela -->
                <!--Abre estrutura de repetição-->
                <?php do { ?>
                    <tr>
                        <!-- Linha da tabela -->
                        <td><?php echo $linha['id_tipo']; ?></td>
                        <td>
                            <span class="visible-xs"><?php echo $linha['rotulo_tipo'];?></span>
                            <span class="hidden-xs"><?php echo $linha['sigla_tipo'];?></span>
                        </td>
                        <td>
                            <?php
                            if ($linha['disponivel_tipo'] == 'Não') {
                                echo ("<span class='glyphicon glyphicon-remove text-warning aria-hidden='true'></span>");
                            } else{
                                echo ("<span class='glyphicon glyphicon-ok text-info aria-hidden='true'></span>");
                            } 
                            ?>
                            <?php echo $linha['rotulo_tipo']; ?>
                        </td>                                                                      
                        <td>
                            <a href="tipos_atualiza.php?id_tipo=<?php echo $linha['id_tipo']; ?>" class="btn btn-warning largButton btn-xs">
                                <span class="hidden-xs">Alterar</span>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                            <button class="btn btn-danger largButton btn-xs delete" 
                            role="button" 
                            data-nome="<?php echo $linha['rotulo_tipo'];?>" 
                            data-id="<?php echo $linha['id_tipo'];?>">
                            <span class="hidden-xs">Excluir</span>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr> <!-- Final da linha da tabela -->
                <?php } while ($linha = $lista->fetch_assoc()); ?>
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
                    Deseja realmente<strong> excluir </strong> o tipo?
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
            $('a.delete-yes').attr('href', 'tipo_excluir.php?id_tipo='+id);
            //Abre o Modal
            $('#myModal').modal('show');

        });
    </script>

</body>

</html>