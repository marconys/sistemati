<?php
//Variaveis de ambiente
include('../config.php');
//Conexão com banco
include('../conexoes/conexao.php');


if($_POST){
    
        if (isset($_POST['enviar'])) {
            $nome_img = $_FILES['foto_cliente']['name'];
            $tmp_img = $_FILES['imagem_produto']['tmp_name'];
            $pasta_img = "../images/" . $nome_img;
            move_uploaded_file($tmp_img, $pasta_img);
        }
    

        $nome_cliente = $_POST['nome_cliente'];
        $cpf_cliente = $_POST['cpf_cliente'];        
        $email_cliente = $_POST['email_cliente'];        
        $senha_cliente = $_POST['senha_cliente'];       
        $foto_cliente = $_FILES['foto_cliente']['name'];

        $campos_insert = "nome_cliente,cpf_cliente,email_cliente,senha_cliente,foto_cliente";
        $values = "$nome_cliente,'$cpf_cliente','$email_cliente','$senha_cliente','$foto_cliente'";
        
        $query = "insert into tbcliente ($campos_insert) values ($values);";
        $resultado = $conexao->query($query);

     // var_dump($$query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conexao)){
        header("location: ../admin/login.php");
    }else{
        header("location: ../admin/login.php");
    } }
?>
    
