<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa Reservas</title>
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
                <img src="../images/logochurrascopequeno.png" alt="">
            </a>
        </div> <!-- Fecha o grupamento para exibição em mobile-->
        <div class="collapse navbar-collapse" id="#defaultNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button class="btn btn-danger navbar-btn disabled">
                        Olá, <?php echo $_SESSION['login_usuario'];?>
                    </button>
                </li>
                <li class="active"><a href="../index.php">Home</a></li>
                <li><a href="reserva_analise_lista.php">Em Análise</a></li>
                <li><a href="reserva_confirmada_lista.php">Confirmadas</a></li>
                <li><a href="reserva_cancelada_lista.php">Cancelada</a></li>
                <li><a href="../menu_adm_cliente.php">Clientes</a></li>
                <!-- Formulário de busca -->
                <form action="reservas_busca.php" method="get" name="form_busca" id="form_busca" class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <div class="input-group">
                            <input type="text" class="form-control" placeholder="Busca por CPF, Ststus e Data" name="buscar_reserva" id="buscar_reserva" size="25" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div> <!-- Fecha input-group -->
                    </form>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>                
            </ul>
        </div> <!-- Fecha nav a direita-->
    </div>
    </nav> <!-- Fecha barra de navegação-->
</body>
</html>