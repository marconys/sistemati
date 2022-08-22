<!-- Salvar como: admin/adm_options.php -->
<!doctype html>
<html lang="pt-br">
<head>
<title><<?php echo SYS_NAME; ?> - Área do Cliente</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
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
            <!-- Botão Minhas reservas-->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- Botão Minhas reservas -->
                <div class="btn-group">
                   <a href="minha_reserva.php">
                       <button class="btn btn-danger">
                            Minhas Reservas
                        </button>
                   </a>
                </div><!-- Fecha botão Minhas reservas -->
            </div> <!-- Fecha botão principal Minhas reservas -->
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
            <!-- Botão principal Meus Dados -->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- Botão Meus Dados -->
                <div class="btn-group">
                   <a href="mostrar_dados.php">
                       <button class="btn btn-warning">
                            Meus Dados
                        </button>
                   </a>
                </div><!-- Fecha botão Meus Dados -->
            </div> <!-- Fecha botão principal Meus Dados -->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA cliente MINHA CONTA -->   

<!-- CLIENTE PEDIDOS --> 
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-info">
        <img src="" alt="">
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
                   <a href="pedidos_cliente.php">
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