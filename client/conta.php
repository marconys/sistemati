<!-- Salvar como: admin/adm_options.php -->
<!doctype html>
<html lang="pt-br">

<head>
    <title>
        <<?php echo SYS_NAME; ?> - Área do Cliente</title>
            <meta charset="utf-8">
            <!-- Link arquivos Bootstrap css -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="fundofixo">
    <main class="container">
        <h1 class="breadcrumb">Área do Cliente</h1>
        <div class="row">
            <!-- manter os elementos na linha -->            

            <!-- CLIENTE NOVA RESERVA -->
            <div class="col-sm-8 col-md-6">
                <div class="thumbnail alert-success">
                    <img src="" alt="">
                    <br>
                    <div class="alert-success">
                        <!-- Botão principal -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled" style="cursor:pointer;">
                                    NOVA RESERVA
                                </button>
                            </div>
                        </div>
                        <!-- Fecha botão principal -->
                        <!-- Botão principal Reservar -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <!-- Botão Meus Dados -->
                            <div class="btn-group">
                                <a href="nova_reserva.php">
                                    <button class="btn btn-success">
                                        Reservar
                                    </button>
                                </a>
                            </div><!-- Fecha botão Reservar -->
                        </div> <!-- Fecha botão principal Reservar -->
                    </div><!-- fecha alert-success -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha o dimensionamento -->
            <!-- FECHA cliente NOVA RESERVA -->

            <!-- CLIENTE RESERVAS -->
            <div class="col-sm-8 col-md-6">
                <div class="thumbnail alert-danger">
                    <img src="" alt="">
                    <br>
                    <div class="alert-danger">
                        <!-- Botão principal -->
                        <div class="btn btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <button class="btn btn-default disabled" style="cursor:pointer;">
                                    MINHAS RESERVAS
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
        </div><!-- fecha row -->
    </main>
    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>