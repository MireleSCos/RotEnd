<?php
	session_start();

	include "connection.php";

	$saida= $_POST['saida'];
	$chegada= $_POST['chegada'];
	$pontos= $_POST['pontos'];
	$cpf = $_SESSION["cpf"];
	$data =  date("Y-m-d");
	$insert = "insert into rotas values ('$default','$saida','$chegada','$pontos','$cpf','$data')";
	$result = mysqli_query($conexao,$insert);


                  
    mysqli_close($conexao);           
?>