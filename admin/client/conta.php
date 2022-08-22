<!-- Salvar como: admin/adm_options.php -->
<!doctype html>
<html lang="pt-br">
<head>
<title>Área do Cliente</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>
<body class="fundofixo">
<main class="container">
<h1 class="breadcrumb">Área do  Cliente</h1>
<div class="row"><!-- manter os elementos na linha -->

<!-- CLIENTE RESERVAS --> 
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-danger">
        <img src="" alt="">
        <br>
        <div class="alert-danger">
            <!-- Botão principal -->                    
            <div class="btn btn-group btn-group-justified" role="group">
                <div class="btn-group" >
                    <button class="btn btn-default disabled" style="cursor:pointer;">
                        RESERVAS
                    </button>
                </div>
            </div>
            <!-- Fecha botão principal -->
            <!-- Botões Minhas reservas e Nova Reserva -->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- botão Listar -->
                <div class="btn-group">
                   <a href="minha_reserva.php">
                       <button class="btn btn-danger">
                            Minhas Reservas
                        </button>
                   </a>
                </div><!-- Fecha botão Minhas reservas -->
                <!-- botão Nova -->
                <div class="btn-group">
                   <a href="nova_reserva.php">
                       <button class="btn btn-danger">
                            Nova Reserva
                        </button>
                   </a>
                </div><!-- Fecha botão Nova Reserva -->
            </div>
            <!-- Botões Minhas reservas e Nova Reserva -->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA Cliente RESERVAS -->

<!-- CLIENTE MINHA CONTA --> 
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-warning">
        <img src="" alt="">
        <br>
        <div class="alert-warning">
            <!-- Botão principal -->                    
            <div class="btn btn-group btn-group-justified" role="group">
                <div class="btn-group" >
                    <button class="btn btn-default disabled" style="cursor:pointer;">
                        MINHA CONTA
                    </button>
                </div>
            </div>
            <!-- Fecha botão principal -->
            <!-- Botões Ver e alterar -->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- botão Listar -->
                <div class="btn-group">
                   <a href="mostrar_dados.php">
                       <button class="btn btn-warning">
                            Ver
                        </button>
                   </a>
                </div><!-- Fecha botão ver -->
                <!-- botão alterar -->
                <div class="btn-group">
                   <a href="alterar_dados.php">
                       <button class="btn btn-warning">
                            Alterar
                        </button>
                   </a>
                </div><!-- Fecha botão alterar -->
            </div>
            <!-- Botões Ver e alterar-->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA cliente MINHA CONTA -->   

<!-- CLIENTE PEDIDOS --> 
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-info">
        <img src="../images/icone_user.png" alt="">
        <br>
        <div class="alert-info">
            <!-- Botão principal -->                    
            <div class="btn btn-group btn-group-justified" role="group">
                <div class="btn-group" >
                    <button class="btn btn-default disabled" style="cursor:pointer;">
                        PEDIDOS
                    </button>
                </div>
            </div>
            <!-- Fecha botão principal -->
            <!-- Botão Meus Pedidos -->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- botão Meus Pedidos -->
                <div class="btn-group">
                   <a href="usuarios_lista.php">
                       <button class="btn btn-info">
                            Meus Pedidos
                        </button>
                   </a>
                </div><!-- Fecha botão Meus Pedidos -->
            </div>
            <!-- Fecha botão Meus Pedidos -->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA CLIENTE PEDIDOS -->         
                           
</div><!-- fecha row -->
</main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>