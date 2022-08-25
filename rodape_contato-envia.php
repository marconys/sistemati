<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Após 15 segundo a página será redirecionada para index.php-->
    <meta http-equiv="refresh" content="10;URL=index.php">
    <title>Verificação de contato</title>
    <link rel="stylesheet" href="./css/meu_estilo.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
</head>

<body class="fundofixo">
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    include('menu_publico.php'); ?>
    <main class="container">
        <section>
            <div class="jumbotron alert-success text-center">
                <h1 class="text-alert-success">Agradecemos o Contato</h1>
                <?php

                include('./PHPMailer/PHPMailer.php');
                include('./PHPMailer/SMTP.php');


                $nome_contato = $_POST['nome_contato'];
                $email_contato = $_POST['email_contato'];
                $comentarios_contato =$_POST['comentarios_contato'];
                $file_contato = $_FILES['file_contato'];



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
                $email->Password = "ecfidptogxyfsyaq";

                //Configuração da msg                
                $email->setFrom($email->Username, "Churrasqueiro & Churrascow"); // remetente
                $email->addAddress('marconysbatera@gmail.com'); // destinatário
                $email->Subject = "Churrascow? Fale Conosco";
                
                //Verifica se há anexos
                if (
                    isset($_FILES['file_contato']) &&
                    $_FILES['file_contato']['error'] == UPLOAD_ERR_OK
                ) {
                    $email->AddAttachment(
                        $_FILES['file_contato']['tmp_name'],
                        $_FILES['file_contato']['name']
                    );
                }


                $body_email = "Você recebeu uma menssagem de: '$nome_contato' ('$email_contato'):
                <br><br> Menssagem: '$comentarios_contato' <br> Anexos: <br> ";

                $email->Body = $body_email;

                //Verifica envio do e-mail
                if ($email->send()) {
                    echo "<h2>Sua menssagem foi enviada com sucesso!</h2>";
                } else {
                    echo "<h2>Falha ao enviar a menssagem</h2>" . $email->ErrorInfo;
                }


                ?>
            </div>
        </section>
        <footer>
            <?php include('rodape.php'); ?>
        </footer>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>