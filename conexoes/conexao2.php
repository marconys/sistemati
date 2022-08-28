<?php 
//Conexão usando PDO em vez do mysqli para oberter uma compatibilidade com outros tipos de database

$hostname_conexao2 = "localhost";
$database_conexao2 = "sistemaDB";
$username_conexao2 = "root";
$password_conexao2 ="";
$charset_conexao2 = "utf8";
$port_conexao2 = 3306;

try{
    //Conexão com prota
   // $conexao2 = new PDO("mysql:host=$hostname_conexao2;
   // port=$port_conexao2;dbname=". $database_conexao2, $username_conexao2, $password_conexao2);
    //Conexão sem prota
    $conexao2 = new PDO("mysql:host=$hostname_conexao2;
    dbname=". $database_conexao2, $username_conexao2, $password_conexao2);
    echo "Conexão com o banco de dados realizada com sucesso!";

}catch(PDOException $err){
    echo "Erro ao tentar connexão com o banco de dados!" . $err->getMessage();
}
?>