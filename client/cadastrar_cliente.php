<?php
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../conexoes/conexao.php');


if($_POST) {


    $nome_cliente = $_POST['nome_cliente'];
    $cpf_cliente = $_POST['cpf_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $senha_cliente = $_POST['senha_cliente'];

    $campos_insert = "nome_cliente, cpf_cliente, email_cliente, senha_cliente";
    $values = "'$nome_cliente' , '$cpf_cliente' , '$email_cliente' , '$senha_cliente'";

    $query = "insert into tbcliente ($campos_insert) values ($values);";
    $resultado = $conexao->query($query);

    // var_dump($$query);

    //Após o insert direciona a pagina
    if (mysqli_insert_id($conexao)) {
        header("location: ../admin/index.php");
    } else {
        header("location: ../admin/index.php");
    }

}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo SYS_NAME; ?> Cadastre-se </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <!-- Abre main -->
    <main class="container">
        <!-- Abre row -->
        <div class="row">
            <!-- Abre dimensionamento -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-3 col-md-offset- col-md-6">
                <h2 class="breadcrumb tex-danger">
                    <a href="../index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Cadastre-se
                </h2>

                <!-- Abre thumbnail -->
                <div class="thumbnail">
                    <!-- Abre alert -->
                    <div class="alert alert-info" role="alert">
                        <!-- Abre form -->
                        <form action="cadastrar_cliente.php" method="post" id="form_cadastrar_cliente" name="form_cadastrar_cliente" enctype="multipart/form-data">

                            <!-- nome_cliente -->
                            <label for="nome_cliente">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" maxlength="60" required placeholder="Digite o seu nome e sobrenome...">
                            </div>
                            <br>

                            <!-- cpf_cliente -->
                            <label for="cpf_cliente">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" maxlength="11" required placeholder="Digite o seu CPF sem pontos e traços...">
                            </div>
                            <br>

                            <!-- email_cliente -->
                            <label for="email_cliente">E-MAIL:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="email_cliente" name="email_cliente" maxlength="60" required placeholder="Digite o seu e-mail...">
                            </div>
                            <br>

                            <!-- senha_cliente -->
                            <label for="senha_cliente">SENHA:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" maxlength="12" placeholder="Digite a sua senha...">
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-success btn-block">
                        </form> <!-- fecha form -->
                    </div> <!-- fecha alert -->
                </div><!-- fecha thumnail -->
            </div> <!-- fecha dimensionamento -->
        </div><!-- fecha row -->
    </main><!-- fecha main -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>