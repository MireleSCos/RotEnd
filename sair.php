<?php
session_start();

if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK") ) {
	$_SESSION["acesso"] = "Você deverá se autenticar!";
	header("Location: index.php");
}
else{
	
	session_destroy();
	header("Location: inicial.php");
}



?>