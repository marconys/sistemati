<?php 
session_name("Churrascow");
session_start();
session_destroy();
header('location: ../index.php');
exit;
?>