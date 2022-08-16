<?php
// A sessão será iniciada em cada página diferente
// Servirá para determinar o nível de acesso, se necessário
session_name('churrascow');
if (!isset($_SESSION)) {
    session_start();
}

// Verifica se há usuário esta logado na sessão
// indentifica o usuário

if (!isset($_SESSION['login_usuario'])) {
// Se não existir, destruimos a sessão por segurança

    header("location: logon.php");
    exit;
}

$nome_da_sessao = session_name();
//verifica o nome da sessão
if (!isset($_SESSION['nome_da_sessao']) or ($_SESSION['nome_da_sessao'] != $nome_da_sessao)) {
// Se não existir, destruimos a sessão por segurança
    session_destroy();
    header("location: logon.php");
    exit;
}

//verificar se o login é válido
if (!isset($_SESSION['login_usuario']))
// Se não existir, destruimos a sessão por segurança
    session_destroy();
header("location: logon.php");
exit;
