<?php
//Incluindo variáveis de ambiente, acesso e banco
include('../../config.php');
include('../acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
include('../../conexoes/conexao.php');

if ($_POST) {

    //Reber os dados do formulário
    //organizar os campos na mesma ordem
    
    $numero_mesa_reserva = $_POST['numero_mesa_reserva'];
    $valor_reserva = $_POST['valor_reserva'];
    $status_reserva = $_POST['status_reserva'];
    $parecer_reserva = $_POST['parecer_reserva'];

    //Campo do form para filtar o registro
    $id_filtro = $_POST['id_reserva'];

    //Consulta(query) Sql para inserção dos dados
    $query = "update tbreserva
                            set 
                            numero_mesa_reserva = '$numero_mesa_reserva',
                            valor_reserva = '$valor_reserva',
                            status_reserva = '$status_reserva',
                            parecer_reserva = '$parecer_reserva'
                            where id_reserva = '$id_filtro'";

    $resultado = $conexao->query($query);

    //Após a ação a página será direcionada
    if (mysqli_insert_id($conexao)) {
        header('location: reserva_analise_lista.php');
    } else {
        header('location: reserva_analise_lista.php');
    }
}

//Consulta para recuperar dados do filtro da chamada da página...
$id_alterar = $_GET['id_reserva'];
$query_busca = "select * from tbreserva where id_reserva = " . $id_alterar;
$lista = $conexao->query($query_busca);
$linha = $lista->fetch_assoc();
$totalLinhas = $lista->num_rows;

$consulta_fk = "select c.id_cliente,
c.nome_cliente,
C.email_cliente from tbcliente c
inner join tbreserva on id_cliente_reserva = id_cliente";

$lista_fk = $conexao->query($consulta_fk);
$linha_fk = $lista_fk->fetch_assoc();
$totalLinha_fk = $lista_fk->num_rows;



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SYS_NAME; ?> - Reserva (Analisar)</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="fundofixo">
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-warning">
                    <a href="reserva_analise_lista.php">
                        <button class="btn btn-warning">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Analisando Reservas
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-warning" role="alert">
                        <form action="analisar_reserva.php" method="post" id="form_analisar_reserva" name="form_analisar_reserva" enctype="multipart/form-data">
                            <!-- id_reserva -->
                            <label for="id_reserva">ID RESERVA:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span>
                                </span>
                                <input class="form-control" type="number" name="id_reserva" id="id_reserva" value="<?php echo $linha['id_reserva']; ?>" readonly>
                            </div>
                            <br>
                            <!-- radio status_reserva -->

                            <label for="status_reserva">Aprovar?</label>
                            <div class="input-group">


                                <label for="status_reserva_s" class="radio-inline">
                                    <input type="radio" name="status_reserva" id="status_reserva" value="Confirmada" <?php echo $linha['status_reserva'] == "Confirmada" ? "checked" : null; ?>>
                                    Sim
                                </label>
                                <label for="status_reserva_n" class="radio-inline">
                                    <input type="radio" name="status_reserva" id="status_reserva" value="Inativa" <?php echo $linha['status_reserva'] == "Inativa" ? "checked" : null; ?>>
                                    Não
                                </label>
                            </div>
                            <br>
                            <!-- Text numero_mesa_reserva -->
                            <label for="numero_mesa_reserva">NUMERO DA MESA:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input class="form-control" type="number" name="numero_mesa_reserva" id="numero_mesa_reserva" value="<?php echo $linha["numero_mesa_reserva"]; ?>">
                            </div>
                            <br>
                            <!-- number valor_reserva -->
                            <label for="valor_reserva">Valor: R$</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="valor_reserva" id="valor_reserva" min="0" step="0.01" class="form-control" value="<?php echo $linha['valor_reserva']; ?>">
                            </div>
                            <br>
                            <!-- Text parecer_reserva -->
                            <label for="parecer_reserva">PARECER:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                                </span>
                                <textarea name="parecer_reserva" id="parecer_reserva" cols="30" rows="4" placeholder="Faça aqui suas observações..." class="form-control"><?php echo $linha['parecer_reserva']; ?>
                                </textarea>
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Finalizar" name="enviar" id="enviar" class="btn btn-warning btn-block">
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