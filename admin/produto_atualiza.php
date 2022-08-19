    <?php 
    //Incluindo variáveis de ambiente, acesso e banco
    include('../config.php');
    include('acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
    include('../conexoes/conexao.php');

    if($_POST){
    //Guardando o nome da imagem no banco de dados e o arquivo na pasta images;
        if($_FILES['imagem_produto']['name']){
            $nome_img = $_FILES['imagem_produto']['name'];
            $tmp_img = $_FILES['imagem_produto']['tmp_name'];
            $pasta_img = "../images".$nome_img;
            move_uploaded_file($tmp_img,$pasta_img);        
        } else{
        $nome_img = $_POST['imagem_produto_atual'];
        }

        //Reber os dados do formulário
        //organizar os campos na mesma ordem
        $id_tipo_produto = $_POST['id_tipo_produto'];
        $destaque_produto = $_POST['destaque_produto'];
        $descri_produto = $_POST['descri_produto'];
        $resumo_produto = $_POST['resumo_produto'];
        $valor_produto = $_POST['valor_produto'];
        $disponivel_produto = $_POST['disponivel_produto'];
        $imagem_produto = $nome_img;

        //Campo do form para filtar o registro
        $id_filtro = $_POST['id_produto'];

        //Consulta(query) Sql para inserção dos dados
        $query = "update tbprodutos
                            set destaque_produto = '".$destaque_produto."',
                            descri_produto = '".$descri_produto."',
                            resumo_produto = '".$resumo_produto."',
                            valor_produto = ".$valor_produto.", 
                            disponivel_produto = '".$disponivel_produto."',
                            imagem_produto = '".$imagem_produto."'
                            where id_produto = ".$id_filtro.";";

        $resultado = $conexao->query($query);

        //Após a ação a página será direcionada
        if(mysqli_insert_id($conexao)){
            header('location: produtos_lista.php');
        }else{
        header('location: produtos_lista.php');
        }

    }

    //Consulta para recuperar dados do filtro da chamada da página...
    $id_alterar = $_GET['id_produto'];
    $query_busca = "select * from tbprodutos where id_produto = ".$id_alterar;
    $lista = $conexao->query($query_busca);
    $linha = $lista->fetch_assoc();
    $totalLinhas = $lista->num_rows;

    $consulta_fk = "select * from tbtipos order by rotulo_tipo asc";

    $lista_fk = $conexao->query($consulta_fk);
    $linha_fk = $lista_fk->fetch_assoc();
    $totalLinha_fk = $lista_fk->num_rows;
    

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><<?php echo SYS_NAME;?> - Admin (Alterar)</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/meu_estilo.css" rel="stylesheet" type="text/css">
</head>
<body class="">
    <?php include('menu_adm.php');?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <h2 class="breadcrumb tex-danger">
                    <a href="produtos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Produtos
                </h2>
            </div>
        </div>
    </main>
    
</body>
</html>