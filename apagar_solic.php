<?php
	session_start();

	include "connection.php";

	$id= $_GET['id'];

	$insert = "delete from solic_servico where cod ='$id'";
	$result = mysqli_query($conexao,$insert);

	header('Location:list_soli.php');
                  
    mysqli_close($conexao);           
?>