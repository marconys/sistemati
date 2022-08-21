<?php
//Conecta com o banco de dados
include('./conexoes/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>

<body>

    <main class="container">
        <h2 class="breadcrumb alert-danger">

            Reservas
        </h2>
        <div id="reserva" class="carousel slide" data-ride="carousel">
            <!--indicador do item-->
            <ol class="carousel-indicators">
                <li data-target="#reserva" class="active" data-slide-to="0"></li>
                <li data-target="#reserva" data-slide-to="1"></li>
                <li data-target="#reserva" data-slide-to="2"></li>
            </ol>
            <!--Imagens-->
            <div class="carousel-inner" role="listbox">
                <div class="item active"><img src="images/reserva_1.jpg" alt="" class="center-block"></div>
                <div class="item"><img src="images/reserva_2.jpg" alt="" class="center-block"></div>
                <div class="item"><img src="images/reserva_3.jpg" alt="" class="center-block"></div>
            </div>
            <a href="#reserva" class="left carousel-control" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
        <a href="#reserva" class="right carousel-control" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>

        </div>
        <br>

        <div class="col-sm-1 col-md-12">
            <div class="thumbnail alert-success">
                <img src="images/icone_reservar.png" alt="">
                <br>
                <div class="alert-success">
                    <!-- Botão principal -->
                    <div class="btn btn-group btn-group-justified" role="group">
                        <div class="btn-group">
                            <button class="btn btn-default disabled" style="cursor:pointer;">
                                FAÇA A SUA RESERVA JÁ!
                            </button>
                        </div>
                    </div><!-- Fecha botão principal -->
                    <!-- Botão reservar -->
                    <div class="btn btn-group btn-group-justified" role="group">
                        <!-- Botão reservar -->
                        <div class="btn-group">
                            <a href="admin/index.php">
                                <button class="btn btn-success">
                                    Reservar
                                </button>
                            </a>
                        </div><!-- Fecha reservar -->
                    </div>
                    <!-- Fecha Botão reservar -->
                </div><!-- fecha alert-danger -->
            </div><!-- fecha thumbnail -->
        </div><!-- fecha o dimensionamento -->
    </main>
</body>

</html>