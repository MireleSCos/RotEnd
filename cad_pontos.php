<?php
	session_start();

	include "connection.php";

	$saida= $_POST['saida'];
	$chegada= $_POST['chegada'];
	$dat_fi= $_POST['dat_fi'];
	$pontos= $_POST['pontos'];
	$cpf = $_SESSION["cpf"];
	$dat_in=  date("Y-m-d");
	$status_ro = 0;
	$insert = "insert into rotas (saida,chegada,pontos,agente,dat_in,dat_fi,status_ro) values ('$saida','$chegada','$pontos','$cpf','$dat_in','$dat_fi','$status_ro')";
	$result = mysqli_query($conexao,$insert);


                  
    mysqli_close($conexao);           
?>