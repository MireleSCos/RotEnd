<?php
	session_start();

	include "connection.php";
	$id_rota= $_POST['id_rota'];
	$agente= $_POST['agente'];
	$obs= $_POST['obs'];
	$id_ger = $_SESSION["cpf"];
	$dat_ob=  date("Y-m-d");
	$status_obs = 'aberta';

	$insert = "insert into obsrota (id_ger,id_agen,id_rota,obs,status_obs,dat_ob,respon) values ('$id_ger','$agente','$id_rota','$obs','$status_obs','$dat_ob','$id_ger')";
	$result = mysqli_query($conexao,$insert);
         
    mysqli_close($conexao);           
?>