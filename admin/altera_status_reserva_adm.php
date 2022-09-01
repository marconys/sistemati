<?php 
//Inlcui conexão com o banco de dados
include('../conexoes/conexao.php');
//Inclui autenticação de usuário e cliente
include('acesso_com.php');


//Selecionando e busca as reservas ordenando conforme status solictado
$consulta = "select r.id_reserva,
r.data_reserva,
r.hora_reserva,
r.motivo_reserva,
r.numero_pessoas_reserva,
r.numero_mesa_reserva,
r.valor_reserva,
r.status_reserva,
r.parecer_reserva,
C.email_cliente,
c.nome_cliente
from tbreserva r
INNER JOIN tbcliente c on r.id_cliente_reserva = c.id_cliente   
and r.status_reserva = 'Em analise' or r.status_reserva = 'Confirmada'";

//Buscar a lista completa de tipos
$lista = $conexao->query($consulta);

//Separar tipos por linha
$linha = $lista->fetch_assoc();

//Contar numero de linhas da lista
$totalLinhas = $lista->num_rows;






//Altera o status

if ($_POST) {

     
 
//Calcula a diferença de dias entre a data atual e a data da reserva
$hoje = new DateTime('now');
$data_reser = new DateTime($_POST[$data_reserva]);
$interval = $hoje->diff($data_reser);
$dias = $interval->d;
$horas = $interval->h;

    //Reber os dados do formulário
    //organizar os campos na mesma ordem
    $status_reserva = $_POST['status_reserva'];
    $data_reserva = $_POST['data_reserva'];
    

    //Campo do form para filtar o registro
    $id_filtro = $_POST['id_reserva'];

    //Consulta(query) Sql para inserção dos dados
    $query = "update tbreserva
                            set
                            status_reserva = '" . $status_reserva . "'
                            where id_reserva = " . $id_filtro . ";";

    $resultado = $conexao->query($query);    

    //Estrutura de repetição para verificação de diferença de data
    do {
        if($dias >=1 ){
            $linha['status_reserva'] = "Expirada";
        }
    } while ($linha = $lista->fetch_assoc());

        //Após a ação a página será direcionada
        if (mysqli_insert_id($conexao)) {
            header('location: menu_adm.php');
        } else {
            header('location: menu_adm.php');
        }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Após 2 segundo a página será redirecionada para index.php-->
    <meta http-equiv="refresh" content=";URL=menu_adm.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
