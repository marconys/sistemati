<?php
//Incluindo variaveis do sistema
include('../config.php');

//Incluindo o sistema de autenticação
include('../admin/acesso_com.php');

//Incluindo o Arquivo de conexão
include('../conexoes/conexao.php');

//Filtra o usuário logado
$email_cliente = $_SESSION['login_usuario'];



if($_POST){

    
//consulta no banco de dados
$consulta = "select from tbcliente where email_cliente = '$email_cliente' order by id_cliente";


    
    $id_cliente_reserva = $_POST['id_cliente'];
    $data_reserva = $_POST['data_reserva'];
    $hora_reserva = $_POST['hora_reserva'];
    $numero_pessoas_reserva = $_POST['numero_pessoas_reserva'];
    $motivo_reserva = $_POST['motivo_reserva'];

    $campos_insert = "id_cliente_reserva,data_reserva,hora_reserva,numero_pessoas_reserva,motivo_reserva";
        $values = "$id_cliente_reserva,'$data_reserva','$hora_reserva', $numero_pessoas_reserva, '$motivo_reserva'";
        
        $query = "insert into tbcliente ($campos_insert) values ($values);";
        $resultado = $conexao->query($query);

        


    //Após o insert direciona a pagina
   if(mysqli_insert_id($conexao)){
        header("location: minha_reserva.php");
    }else{
        header("location: minha_reserva.php");
    }


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <title><?php echo SYS_NAME ?> Reservar</title>
</head>

<body class="fundofixo">

    <?php include('menu_cliente.php'); ?>

    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="index.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Faça a sua reserva
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-success" role="alert">
                        <!-- Abre formulário -->
                        <form action="nova_reserva.php" method="post" id="form_nova_reserva" name="form_nova_reserva" enctype="text/plain">                            
                            <!--Inserir o campo id_cliente_reserva -->
                            <input class="hidden" type="text" name="id_cliente" id="id_cliente">
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
                            <input type="submit" value="RESERVAR" name="enviar" id="enviar" class="btn btn-success btn-block">
                        </form>
                        <!-- fecha formulário -->
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>