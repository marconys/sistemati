<?php
//Incluindo variáveis de ambiente, acesso e banco
include('../../config.php');
include('../acesso_com.php'); //Importante!!!!!!!!!!!! Autentica o usuário
include('../../conexoes/conexao.php');



//Consulta para recuperar dados do filtro da chamada da página...
$id_reserva = $_GET['id_reserva'];

?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Após 15 segundo a página será redirecionada para index.php-->
    <meta http-equiv="refresh" content="3;URL=reserva_confirmada_lista.php">
    <title>Confirmação de Reserva</title>
    <link rel="stylesheet" href="../../css/meu_estilo.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
</head>

<body class="fundofixo">
    <?php

    use PHPMailer\PHPMailer\PHPMailer;

    ?>
    <main class="container">
        <section>
            <div class="jumbotron alert-success text-center">
                <h1 class="text-alert-success">Confirmação de Reserva</h1>
                <?php

                include('../../PHPMailer/PHPMailer.php');
                include('../../PHPMailer/SMTP.php');


                $consulta = "select r.id_cliente_reserva,
                r.data_reserva,
                r.hora_reserva,
                r.numero_pessoas_reserva,
                r.valor_reserva,
                r.status_reserva,
                r.parecer_reserva,
                C.email_cliente,
                c.nome_cliente
                from tbreserva r
                INNER JOIN tbcliente c on r.id_cliente_reserva = c.id_cliente   
                and r.id_reserva = '$id_reserva'";
                $lista = $conexao->query($consulta);
                $linha = $lista->fetch_assoc();
                $totalLinhas = $lista->num_rows;

                $nome = $linha['nome_cliente'];
                $email_cliente = $linha['email_cliente'];
                $valor = $linha['valor_reserva'];
                $data = $linha['data_reserva'];
                $hora = $linha['hora_reserva'];
                $status = $linha['status_reserva'];
                $num_pessoas = $linha['numero_pessoas_reserva'];
                $parecer_reserva = $linha['parecer_reserva'];



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
                $email->Username = "contato@churrascow.com.br";
                $email->Password = "";

                //Configuração da msg                
                $email->setFrom($email->Username, "Churrasqueiro & Churrascow"); // remetente
                $email->addAddress($email_cliente); // destinatário
                $email->Subject = "Churrascow? Fale Conosco";                



                //Criando QRcode
                $aux  = 'qr_img0.50j/php/qr_img.php?';
                $aux .= 'd=<?php echo $id_reserva?>$';
                $aux .= 'e=H&';
                $aux .= 's=4&';
                $aux .= 't=p';          
                   

                $email->addStringAttachment($aux, 'QR code.png');


                $body_email = "Você recebeu uma menssagem de: Churrascow ('churraschurrascow.com.br'):
                <br><br> O status da sua reserva para $num_pessoas na data $data horário $hora, foi alterado para $status!<br> 
                $parecer_reserva <br> <img src='https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl=<?php echo $id_reserva?>' alt=''>";

                $email->Body =  $body_email;



                //Verifica envio do e-mail
                if ($email->send()) {
                    echo "<h2>Sua menssagem foi enviada com sucesso!</h2>";                    
                } else {
                    echo "<h2>Falha ao enviar a menssagem</h2>" . $email->ErrorInfo;
                }
                ?>
            </div>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../..js/bootstrap.min.js"></script>
</body>

</html>
