<?php

session_start(); //Inica a sessão obs: não pode haver nenhum comando ou comentario acima de session_start()

//Limpar o buffer de saida
ob_start();

//inclui conexão com o canco de dados
include('../conexoes/conexao2.php');
//recebe todos os campos do formulário cadastro_e_reserva
//atribui os campos recebidos a uma váriavél
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//confere se realmente esta recebendo os dados
//var_dump($dados);
try{


//Verifica se o usuário clicou no botão
if(!empty($dados['enviar'])){
    //inseridodados na tabela tbcliente
    $query_cliente =  "INSERT INTO tbcliente (nome_cliente, cpf_cliente, email_cliente, senha_cliente) 
    VALUES (:nome_cliente, :cpf_cliente, :email_cliente, :senha_cliente )";
    //Prepara a query e atribui a variavel $cad_cliente
    $cad_cliente = $conexao2->prepare($query_cliente);
    //Substitui o link pelos valores armazenados na variavel $dados
    $cad_cliente->bindParam(':nome_cliente',$dados['nome_cliente'], PDO::PARAM_STR);
    $cad_cliente->bindParam(':cpf_cliente',$dados['cpf_cliente'], PDO::PARAM_STR);
    $cad_cliente->bindParam(':email_cliente',$dados['email_cliente'], PDO::PARAM_STR);
    $cad_cliente->bindParam(':senha_cliente',$dados['senha_cliente'], PDO::PARAM_STR);
    //executa a query
    $cad_cliente->execute();
    //Recupera o último ID inserido
    //var_dump($conexao2->lastInsertId());

    //Atribui o ID capturado a variavel $id_cliente para ser usado na reserva
    $id_cliente = $conexao2->lastInsertId();

    //inseridodados na tabela tbcliente
    $query_reserva =  "INSERT INTO tbreserva (data_reserva, hora_reserva, numero_pessoas_reserva, motivo_reserva, id_cliente_reserva) 
    VALUES (:data_reserva, :hora_reserva, :numero_pessoas_reserva, :motivo_reserva, :id_cliente_reserva)";
    //Prepara a query e atribui a variavel $cad_reserva
    $cad_reserva = $conexao2->prepare($query_reserva);
    //Substitui o link pelos valores armazenados na variavel $dados
    $cad_reserva->bindParam(':data_reserva',$dados['data_reserva'], PDO::PARAM_STR);
    $cad_reserva->bindParam(':hora_reserva',$dados['hora_reserva'], PDO::PARAM_STR);
    $cad_reserva->bindParam(':numero_pessoas_reserva',$dados['numero_pessoas_reserva'], PDO::PARAM_STR);
    $cad_reserva->bindParam(':motivo_reserva',$dados['motivo_reserva'], PDO::PARAM_STR);
    $cad_reserva->bindParam(':id_cliente_reserva',$id_cliente, PDO::PARAM_INT);
    //executa a query
    $cad_reserva->execute();     
    

    //Criar variavel global para  salvar  a mensagem de sucesso
    $_SESSION['msg'] = "<p style='color:green;'> Usuário cadastrado com sucesso!<br>Use o seu e-mail, CPF e senha para fazer login!</p>";

    //Redireciona a págia

    header("location: ../cadastro_e_reserva.php");    
}

} catch(Exception){
    //Redireciona a págia
    header('location: ../cadastro_e_reserva.php');
    //Criar variavel global para  salvar  a mensagem de erro
    $_SESSION['msg'] = "<p style='color:#f00;'> Erro: Ops!! Parece que o e-mail ou CPF já estão cadastrados!</p>";
}
?>