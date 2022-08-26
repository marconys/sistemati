<?php
//Sistema de autenticação
include('acesso_com.php');
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../conexoes/conexao.php');


if($_POST){    
        
    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];
    $disponivel_tipo = $_POST['disponivel_tipo'];

        $campos_insert = "sigla_tipo,rotulo_tipo,disponivel_tipo";
        $values = "$sigla_tipo,'$rotulo_tipo','$disponivel_tipo'";
        
        $query = "insert into tbtipos ($campos_insert) values ($values);";
        $resultado = $conexao->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conexao)){
        header("location: tipos_lista.php");
    }else{
        header("location: tipos_lista.php");
    } 
}


//Chave estrangeira tipo
$query_tipo = "select * from tbtipos order by sigla_tipo asc";
$lista_fk = $conexao->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <<?php echo SYS_NAME; ?> - Inserir Tipos </title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Tipos
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="tipos_insere.php" method="post" id="form_tipos_insere" name="form_tipos_insere" enctype="multipart/form-data">
                            <!--Inserir o campo id_tipo oculto para uso no filtro -->
                            <input type="hidden" name="id_tipo" id="id_tipo">
                            <!-- id_tipo -->
                            <label for="rotulo_tipo">ROTULO:</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th-list  " aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="rotulo_tipo" name="rotulo_tipo" maxlength="100" required  placeholder="Digite o nome do tipo">
                            </div>
                            <br>
                            <!-- id_tipo -->
                            <label for="sigla_tipo">SIGLA:</label>                            
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th-list  " aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="sigla_tipo" name="sigla_tipo" maxlength="4" required  placeholder="Digite a sigla do produto com 3 caractéres">
                            </div>
                            <br>
                            <label for="disponivel_tipo">Disponível?</label>
                            <div class="input-group">
                                <label for="disponivel_tipo" class="radio-inline">
                                    <input type="radio" name="disponivel_tipo" id="disponivel_tipo" value="Sim">
                                    Sim
                                </label>
                                <label for="disponivel_tipo" class="radio-inline">
                                    <input type="radio" name="disponivel_tipo" id="disponivel_tipo" value="Não">
                                    Não
                                </label>
                            </div>
                            <br>    
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-success btn-block">
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