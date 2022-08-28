<?php 
// Incluindo o sistema de autenticação
include('acesso_com.php');
?>

<!-- Salvar como: admin/adm_options.php -->
<!doctype html>
<html lang="pt-br">
<head>
<title>Área Administrativa Clientes</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>
<body class="fundofixo">
    <?php include('menu_header_adm_cliente.php');?>
<main class="container">
<h1 class="breadcrumb">Área Administrativa Clientes</h1>
<div class="row"><!-- manter os elementos na linha -->

<!-- RESERVAS EM ANÁLISE --> 
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-warning">
        <img src="../images/reserva_analise.png" alt="">
        <br>
        <div class="alert-warning">
            <!-- Botão principal -->                    
            <div class="btn btn-group btn-group-justified" role="group">
                <div class="btn-group" >
                    <button class="btn btn-default disabled" style="cursor:pointer;">
                        RESERVAS EM ANÁLISE
                    </button>
                </div>
            </div>
            <!-- Fecha botão principal -->
            <!-- Botões  principal Listar -->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- botão Listar -->
                <div class="btn-group">
                   <a href="reservas/reserva_analise_lista.php">
                       <button class="btn btn-warning">
                            Listar
                        </button>
                   </a>
                </div><!-- Fecha botão Listar -->
                
            </div>
            <!-- Fecha botão principal Listar -->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA ADM PRODUTOS -->

<!-- RESERVAS CONFIRMADAS -->  
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-success">
        <img src="../images/reserva_confirmada.png" alt="">
        <br>
        <div class="alert-success">
            <!-- Botão principal -->                    
            <div class="btn btn-group btn-group-justified" role="group">
                <div class="btn-group" >
                    <button class="btn btn-default disabled" style="cursor:pointer;">
                        RESERVAS CONFIRMADAS
                    </button>
                </div>
            </div>
            <!-- Fecha botão principal -->
            <!-- Botão principal Listar-->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- botão Listar -->
                <div class="btn-group">
                   <a href="reservas/reserva_confirmada.php">
                       <button class="btn btn-success">
                            Listar
                        </button>
                   </a>
                </div><!-- Fecha botão Listar -->
                
            </div>
            <!-- Fecha Botão principal Listar -->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA ADM TIPOS -->   

<!-- RESERVAS CANCELADAS --> 
<div class="col-sm-6 col-md-4">
    <div class="thumbnail alert-danger">
        <img src="../images/reserva_cancelada.png" alt="">
        <br>
        <div class="alert-danger">
            <!-- Botão principal -->                    
            <div class="btn btn-group btn-group-justified" role="group">
                <div class="btn-group" >
                    <button class="btn btn-default disabled" style="cursor:pointer;">
                    RESERVAS CANCELADAS
                    </button>
                </div>
            </div>
            <!-- Fecha botão principal -->
            <!-- Botão principal Listar-->
            <div class="btn btn-group btn-group-justified" role="group">
               <!-- botão Listar -->
                <div class="btn-group">
                   <a href="reservas/reserva_cancelada.php">
                       <button class="btn btn-danger">
                            Listar
                        </button>
                   </a>
                </div><!-- Fecha botão Listar -->
            </div>
            <!-- Fecha Botão principal Listar -->
        </div><!-- fecha alert-danger -->        
    </div><!-- fecha thumbnail -->
</div><!-- fecha o dimensionamento -->
<!-- FECHA ADM USUÁRIOS -->         
                           
</div><!-- fecha row -->
</main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>