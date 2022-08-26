<?php
//Incluindo variáveis de ambiente, acesso e banco
include('../config.php');
include('acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
include('../conexoes/conexao.php');

if ($_POST) {

    //Reber os dados do formulário
    //organizar os campos na mesma ordem
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];
    $disponivel_tipo = $_POST['disponivel_tipo'];

    //Campo do form para filtar o registro
    $id_filtro = $_POST['id_tipo'];

    //Consulta(query) Sql para inserção dos dados
    $query = "update tbtipos
                            set sigla_tipo = '" . $sigla_tipo . "',
                            rotulo_tipo = '" . $rotulo_tipo . "',
                            disponivel_tipo = '" . $disponivel_tipo . "'
                            where id_tipo = " . $id_filtro . ";";

    $resultado = $conexao->query($query);

    //Após a ação a página será direcionada
    if (mysqli_insert_id($conexao)) {
        header('location: tipos_lista.php');
    } else {
        header('location: tipos_lista.php');
    }
}

//Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_tipo'];
$query_busca = "select * from tbtipos where id_tipo = " . $id_alterar;
$lista = $conexao->query($query_busca);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;

$consulta_fk = "select * from tbtipos order by sigla_tipo asc";

$lista_fk = $conexao->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$totalLinha_fk = $lista_fk->num_rows;


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <<?php echo SYS_NAME; ?> - Atualizar Tipos </title>
            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Tipos
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="tipos_atualiza.php" method="post" id="form_tipos_atualiza" name="tipos_atualiza" enctype="multipart/form-data">
                            <!--Inserir o campo id_usuário oculto para uso no filtro -->
                            <input type="hidden" name="id_tipo" id="id_tipo" value="<?php echo $linha['id_tipo']; ?>">
                             <!-- rotulo_tipo -->
                            <label for="rotulo_tipo">ROTULO:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="rotulo_tipo" id="rotulo_tipo" class="form-control" maxlength="15" value="<?php echo $linha['rotulo_tipo']; ?>">
                            </div>
                            <br>
                            <!-- sigla_tipo -->
                            <label for="sigla_tipo">SIGLA:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="sigla_tipo" id="sigla_tipo" class="form-control" maxlength="3"  value="<?php echo $linha['sigla_tipo']; ?>">
                            </div>
                            <br>
                            <!-- disponivel_tipo -->
                            <label for="disponivel_tipo">Disponível?</label>
                            <label for="disponivel_tipo_s" class="radio-inline">
                                <input type="radio" name="disponivel_tipo" id="disponivel_tipo" value="Sim" <?php echo $linha['disponivel_tipo'] == "Sim" ? "checked" : null; ?>>
                                Sim
                            </label>
                            <label for="disponivel_tipo_n" class="radio-inline">
                                <input type="radio" name="disponivel_tipo" id="disponivel_tipo" value="Não" <?php echo $linha['disponivel_tipo'] == "Não" ? "checked" : null; ?>>
                                Não
                            </label>
                    </div>
                    <br>

                    <!-- Botão Enviar -->
                    <input type="submit" value="Atualizar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
<?php
mysqli_free_result($lista);
mysqli_free_result($lista_fk);

?>