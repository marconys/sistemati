<?php
//Incluindo variavel de ambiente e conexão com o banco
include('config.php');
include('./conexoes/conexao.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SYS_NAME; ?> - Reservas</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="nav navbar-inverse">
        <div class="container-fluid">
            <!-- Agrupamento para exibição em mobile-->
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#defaultNavbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">
                    <img src="./images/logochurrascopequeno.png" alt="">
                </a>
            </div> <!-- Fecha o grupamento para exibição em mobile-->
            <div class="collapse navbar-collapse" id="#defaultNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                    <li><a href="index.php#produtos">Produtos</a></li>
                    <li><a href="index.php#destaques">Destaques</a></li>
                    <li><a href="index.php#reservas">Reserva</a></li>
                    <li><a href="index.php#contato">Contato</a></li>
                </ul>
            </div> <!-- Fecha nav a direita-->
        </div>
    </nav> <!-- Fecha barra de navegação-->
    <main class="container">
        <div class="row">
            <!-- Abre dimensionamento -->
            <div class="col-xs-12 col-sm-offset-3 col-sm-3 col-md-offset- col-md-6">
                <h2 class="breadcrumb tex-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Faça a sua seserva agora!
                </h2>
                <div class="breadcrumb tex-danger">
                    <h3 class="titulo titulo-oferta">POR APENAS 50,90</h3>
                    <h4>Faça uma reserva com mais de 5 pessoas e garanta
                        70% de desconto no rodízio para o titular da Reserva,e mais 10%
                        de desconto em todas as bebidas da comada da mesa associada a reserva
                    </h4>
                    <h5>As reservas são permitidas com um prazo mínimo de 12 horas de antecedência
                        e no máximo 60 dias.
                    </h5>
                </div>



                <!-- Abre thumbnail -->
                <div class="thumbnail">
                    <div class="alert alert-success" role="alert">
                        <!-- Abre formulário -->
                        <form action="cadastre-se.php" method="post" id="form_cadastre-se" name="form_cadastre-se" enctype="text/plain">
                            <label for="data_reserva">QUAL A DATA DA RESERVA?</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                </span>
                                <input type="date" class="form-control" id="data_reserva" name="data_reserva" required>
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
                            <label for="motivo_reserva">MOTIVO ESPECIAL?</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="motivo_reserva" name="motivo_reserva" maxlength="10" placeholder="Conta pra gente o motivo especial...">
                            </div>
                            <br>
                            <label for="nome_cliente">NOME COMPLETO</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" maxlength="100" required placeholder="Digite o seu nome completo...">
                            </div>
                            <br>
                            <label for="email_cliente">EMAIL</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="email_cliente" name="email_cliente" maxlength="100" required placeholder="email@email.com.br">
                            </div>
                            <br>
                            <label for="cpf_cliente">CPF</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" maxlength="11" required placeholder="Digite o seu CPF Sem pontos e traços">
                            </div>
                            <br>
                            <label for="senha_cliente">SENHA</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </span>
                                <input type="password" class="form-control" id="senha_cliente" name="senha_cliente" maxlength="12" required placeholder="Digite a sua senha...">
                            </div>
                            <br>
                            <input type="submit" value="ENVIAR" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                        <!-- fecha formulário -->
                        <!-- Fecha alert-sucess -->
                    </div>
                    <!-- Fecha thumbnail -->
                </div>
                <!-- Fecha dimensionamento -->
            </div>

        </div>

        <footer>
            <?php include('rodape.php'); ?>
        </footer>
    </main>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>