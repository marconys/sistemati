<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="produtos_lista.php">Produtos</a></li>
                <li><a href="tipos_lista.php">Tipos</a></li>
                <li><a href="usuarios_lista.php">Usuários</a></li>
                <li><a href="menu_adm_cliente.php">Clientes</a></li>
                <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>                
            </ul>
        </div> <!-- Fecha nav a direita-->
    </div>
    </nav> <!-- Fecha barra de navegação-->
</body>
</html>