<?php
//Sistema de autenticação
include('acesso_com.php');
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../conexoes/conexao.php');


if($_POST){
    
        if (isset($_POST['enviar'])) {
            $nome_img = $_FILES['imagem_produto']['name'];
            $tmp_img = $_FILES['imagem_produto']['tmp_name'];
            $pasta_img = "../images/" . $nome_img;
            move_uploaded_file($tmp_img, $pasta_img);
        }
    

        $id_tipo_produto = $_POST['id_tipo_produto'];
        $destaque_produto = $_POST['destaque_produto'];        
        $descri_produto = $_POST['descri_produto'];        
        $resumo_produto = $_POST['resumo_produto'];        
        $valor_produto = $_POST['valor_produto'];        
        $imagem_produto = $_FILES['imagem_produto']['name'];

        $campos_insert = "id_tipo_produto,destaque_produto,descri_produto,resumo_produto,valor_produto,imagem_produto";
        $values = "$id_tipo_produto,'$destaque_produto','$descri_produto','$resumo_produto',$valor_produto,'$imagem_produto'";
        
        $query = "insert into tbprodutos ($campos_insert) values ($values);";
        $resultado = $conexao->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conexao)){
        header("location: produtos_lista.php");
    }else{
        header("location: produtos_lista.php");
    } 
}


//Chave estrangeira tipo
$query_tipo = "select * from tbtipos order by rotulo_tipo asc";
$lista_fk = $conexao->query($query_tipo);
$linha_fk = $lista_fk->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <<?php echo SYS_NAME; ?> - Inserir Produtos </title>
            <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
</head>

<body class="fundofixo">
    <?php include('menu_adm.php'); ?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-2 col-md-8">
                <h2 class="breadcrumb tex-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Produtos
                </h2>
                <div class="thumbnail">
                    <!-- Abre thumbnail -->
                    <div class="alert alert-danger" role="alert">
                        <form action="produtos_insere.php" method="post" id="form_produtos_insere" name="form_produtos_insere" enctype="multipart/form-data">
                            <!--Inserir o campo id_produto oculto para uso no filtro -->
                            <input type="hidden" name="id_produto" id="id_produto">
                            <!-- Select id_tipo_produto -->
                            <label for="id_tipo_produto">Tipo</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>

                                <select name="id_tipo_produto" id="id_tipo_produto" class="form-control" required>
                                    <?php do { ?>
                                        <option value="<?php echo $linha_fk['id_tipo']; ?>">
                                            <?php echo $linha_fk['rotulo_tipo']; ?>
                                        </option>
                                    <?php } while ($linha_fk = $lista_fk->fetch_assoc());
                                    $linha_fk = mysqli_num_rows($lista_fk);
                                    if ($linha_fk > 0) {
                                        mysqli_data_seek($lista_fk, 0);
                                        $linha_fk = $lista_fk->fetch_assoc();
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <!-- radio destaque_produto -->
                            <label for="destaque_produto">Destaque?</label>
                            <div class="input-group">
                                <label for="destaque_produto_s" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Sim">
                                    Sim
                                </label>
                                <label for="destaque_produto_n" class="radio-inline">
                                    <input type="radio" name="destaque_produto" id="destaque_produto" value="Não">
                                    Não
                                </label>
                            </div>
                            <br>
                            <!-- Text descri_produto -->
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" class="form-control" id="descri_produto" name="descri_produto" maxlength="100" required  placeholder="Digite o titulo do produto...">
                            </div>
                            <br>
                            <!-- textarea de resumo_produto -->
                            <label for="resumo_produto">Resumo</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto..." class="form-control">
                                </textarea>
                            </div>
                            <br>
                            <!-- number valor_produto -->
                            <label for="valor_produto">Valor: R$</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="valor_produto" id="valor_produto" min="0" step="0.01" class="form-control">
                            </div>
                            <br>
                            <!-- file imagem-->
                            <label for="imagem_produto">Nova</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <img src="" alt="" name="imagem" id="imagem" class="img-responsive">
                                <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="image/*">
                            </div>
                            <br>
                            <!-- Botão Enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" class="btn btn-danger btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Script para a imagem -->
    <script>
        document.getElementById("imagem_produto").onchange = function() {
            var reader = new FileReader();
            if (this.files[0].size > 528385) {
                alert("A imagem deve ter no máximo 500KB");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide();
                $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                $("#imagem_produto").unwrap();
                return false;

            }
            // Verifica se o input do titpo file possui dado
            if (this.files[0].type.indexOf("image") == -1) {
                alert("Formato inválido, escolha uma imagem!");
                $("#imagem").attr("src", "blank");
                $("#imagem").hide();
                $("#imagem_produto").wrap('<form>').closest('form').get(0).reset();
                $("#imagem_produto").unwrap();
                return false;
            };
            reader.onload = function(e) {
                //Obter dados  carregados e renderizar a miniatura
                document.getElementById("imagem").src = e.target.result;
                $("#imagem").show();
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>