<?php 

session_start(); //Inica a sessão obs: não pode haver nenhum comando ou comentario acima de session_start()


include('config.php')?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo SYS_NAME; ?> Reserva e Cadastro </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_publico.php');?>
    <!-- Abre main -->
    <main class="container">
        <!-- Abre row -->
        <div class="row">
            <!-- Abre dimensionamento -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-3 col-md-offset- col-md-6">
                <h2 class="breadcrumb tex-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Cadastre-se & Reserve
                    <?php 
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        //Após imprimir destroi a variavel para não imprimir novamente
                        unset( $_SESSION['msg']);
                    }
                    ?>
                </h2>

                <!-- Abre thumbnail -->
                <div class="thumbnail">
                    <!-- Abre alert -->
                    <div class="alert alert-info" role="alert">
                        <!-- Abre form -->
                        <form action="client/reserva_e_cadastro.php" method="post" id="form_reserva_e_cadastro" name="form_reserva_e_cadastro" enctype="multipart/form-data">

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
                            <h2 class="breadcrumb tex-success">
                                    <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-cutlery"></span>
                                    </button>
                                Faça a sua reserva
                            </h2>
                            <!--Inserir o campo id_cliente_reserva -->
                            <input class="hidden" type="text" name="id_cliente" id="id_cliente">
                            <label for="data_reserva">QUAL A DATA DA RESERVA?</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </span>
                                <input type="date" class="form-control" id="data_reserva" name="data_reserva" required >
                            </div>
                            <br>
                            <label for="hora_reserva">QUAL O HORÁRIO DA RESERVA?</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </span>
                                <input type="time" class="form-control" id="hora_reserva" name="hora_reserva" required>
                            </div>
                            <br>
                            <label for="numero_pessoas_reserva">QUANTAS PESSOAS?</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" id="numero_pessoas_reserva" name="numero_pessoas_reserva" min="1" step="1" required>
                            </div> 
                            <br>                           

                             <!-- valor_reserva-->
                             <label class="" for="valor_reserva">VALOR R$:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                </span>
                                <input type="number" class="form-control" id="valor_reserva" name="valor_reserva" value="59.90" readonly>
                            </div>
                            <br>
                            <br>
                            <label for="motivo_reserva">MOTIVO ESPECIAL?</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="motivo_reserva" name="motivo_reserva" maxlength="10" placeholder="Conta pra gente o motivo especial...">
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar e Reservar" name="enviar" id="enviar" class="btn btn-success btn-block">
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