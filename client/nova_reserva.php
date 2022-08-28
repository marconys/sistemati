<?php
    //Incluindo variáveis de ambiente, acesso e banco
    include('../config.php');
    include('../admin/acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
    include('../conexoes/conexao.php');    

    $email = $_SESSION['login_usuario'];

    if ($_POST) {

        //Reber os dados do formulário
        //organizar os campos na mesma ordem
        $id_cliente_reserva = $_POST['id_cliente_reserva'];
        $data_reserva = $_POST['data_reserva'];
        $hora_reserva = $_POST['hora_reserva'];
        $numero_pessoas = $_POST['numero_pessoas_reserva'];
        $nome_cliente = $_POST['nome_cliente'];
        $motivo_reserva = $_POST['motivo_reserva'];

        
        $campos_insert = "id_cliente_reserva,data_reserva,hora_reserva,numero_pessoas_reserva,nome_cliente,motivo_reserva";
        $values = "$id_cliente_reserva,'$data_reserva','$hora_reserva',$numero_pessoas,'$nome_cliente','$motivo_reserva'";
        
        $query = "insert into tbreserva ($campos_insert) values ($values);";
        $resultado = $conexao->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conexao)){
        header("location: minha_reserva.php");
    }else{
        header("location: nova_reserva.php");
    } 

    
}


//Chave estrangeira tipo


$query_cliente = "select * from tbcliente where email_cliente = '$email'";
$lista_fk = $conexao->query($query_cliente);
$linha_fk = $lista_fk->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <<?php echo SYS_NAME; ?> - Nova Reserva </title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_cliente.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-success">
                    <a href="index.php">
                        <button class="btn btn-success">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Realizando Nova Reserva
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-success" role="alert">
                        <form action="nova_reserva.php" method="post" id="form_nova_reserva" name="form_nova_reserva" enctype="multipart/form-data">
                            <!--Inserir o campo id_reserva oculto para uso no filtro -->
                            <input type="hidden" name="id_reserva" id="id_reserva">
                            <!--Inserir o campo id_cliente_reserva oculto -->
                            <input type="hidden" name="id_cliente_reserva" id="id_cliente_reserva" value="<?php echo $linha_fk['id_cliente'];?>">
                            <!-- Select id_cliente_reserva -->
                            <label for="email_cliente">USUÁRIO</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="email_cliente" name="email_cliente" value="<?php echo $_SESSION['login_usuario'];?>" maxlength="100" required readonly>
                            </div>
                            <br>
                            <label for="nome_cliente">NOME:</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="nome_cliente" name="nome_cliente" maxlength="100" required  placeholder="Digite o nome do titular da reserva">
                            </div>
                            <br>
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
                            <!-- Botão Enviar -->
                            <input type="submit" value="Reservar" name="enviar" id="enviar" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Script para a imagem -->
    <script>
        document.getElementById("foto_usuario").onchange = function() {
            var reader = new FileReader();
            if (this.files[0].size > 528385) {
                alert("A imagem deve ter no máximo 500KB");
                $("#foto").attr("src", "blank");
                $("#foto").hide();
                $("#foto_usuario").wrap('<form>').closest('form').get(0).reset();
                $("#ifoto_usuario").unwrap();
                return false;

            }
            // Verifica se o input do titpo file possui dado
            if (this.files[0].type.indexOf("image") == -1) {
                alert("Formato inválido, escolha uma imagem!");
                $("#foto").attr("src", "blank");
                $("#foto").hide();
                $("#foto_usuario").wrap('<form>').closest('form').get(0).reset();
                $("#foto_usuario").unwrap();
                return false;
            };
            reader.onload = function(e) {
                //Obter dados  carregados e renderizar a miniatura
                document.getElementById("foto").src = e.target.result;
                $("#foto").show();
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>