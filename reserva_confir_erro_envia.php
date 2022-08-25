
<?php
//Conexão com banco
include('./conexoes/conexao.php');

use PHPMailer\PHPMailer\PHPMailer;



        $nome_cliente = $_POST['nome_cliente'];        
        $cpf_cliente = $_POST['cpf_cliente'];        
        $email_cliente = $_POST['email_cliente'];        
        $senha_cliente = $_POST['senha_cliente'];

        $campos_insert = "nome_cliente,cpf_cliente,email_cliente,senha_cliente";
        $values = "'$nome_cliente','$cpf_cliente','$email_cliente','$senha_cliente'";
        
        $query = "insert into tbcliente ($campos_insert) values ($values);";
        $resultado = $conexao->query($query);

     // var_dump($query);

    //Após o insert direciona a pagina
   if(mysqli_insert_id($conexao)){
        header("location: index.php");
    }else{
        header("location: index.php");
    } 

    
?>
   
        <?php

                include('./PHPMailer/PHPMailer.php');
                include('./PHPMailer/SMTP.php');

                // Instanciando um objeto apartir da classe PHPMailer e informando o titpo de servidor
                $email = new PHPMailer();
                $email->isMail();
                $email->isHTML(true);
                $email->CharSet = "utf-8";


                //Configuração do servidor de email
                $email->isSMTP();
                $email->Host = "smtp.mail.yahoo.com";
                $email->Port = "587";
                $email->SMTPSecure = "tls";
                $email->SMTPAuth = "true";
                $email->Username = "marconyspinheiro@yahoo.com.br";
                $email->Password = "";

                //Configuração da msg                
                $email->setFrom($email->Username, "Churrasqueiro & Churrascow"); // remetente
                $email->addAddress($nome_cliente); // destinatário
                $email->Subject = "Churrascow! Seja Bem-Vindo!!";
                
                //Corpo do email
                
                $body_email = "Você recebeu uma menssagem de: Churrasqueiro & Churrascow (Churrascow.com.br):
                <br><br> Olá: '$cliente' <br> Seja muito bem vindo a família do Churrascou!<br>
                Use o seu e-mail '$email_cli' para fazer  login em nosso site! ";

                $email->Body = $body_email;

                //Verifica envio do e-mail
                if ($email->send()) {
                    echo "<h2>Cadastro Realizado com sucesso com sucesso!</h2>";
                } else {
                    echo "<h2>Falha ao enviar a menssagem</h2>" . $email->ErrorInfo;
                }

                ?>