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
    <?php include('menu_publico.php'); ?>
    <main class="container">
        <section>
            <div class="jumbotron alert-danger">
                <h class="text-danger">Agradecemos o Contato</h>
                <?php 
                $destino = "marconysbatera@gmail.com.br";
                $nome_contato = $_POST['nome_contato'];
                $email_contato = $_POST['email_contato'];
                $comentarios_contato = "Menssagem de : ". $_POST['nome_contato'] . "\n" . $_POST['comentarios_contato'];

                // Envia e-mail
                $mailsend = mail($destino, "Formulário de contato do site", $comentarios_contato, "De: $email_contato");
                echo "<p class='text-center'>Obrigado por enviar seu comentário, <b>$nome_contato</b></p>";
                echo "<p class='text-center'><b>Menssagem enviada com sucesso!</b></p>";

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