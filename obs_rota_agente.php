<?php
	session_start();

	include "connection.php";
	$obs_s= $_POST['obs'];
	$cod_rota= $_POST['id_rota'];
	$data_s = date("Y-m-d");         
	$status_obs = 'aberta';
	$cpf = $_SESSION['cpf'];
    $query = "select * from agente where cpf='$cpf'";
    $resu = mysqli_query($conexao,$query);
  
    while($row=mysqli_fetch_array($resu)){
          $id_ger = $row["gerente"];   
    }

    $insert = "insert into obsrota (id_ger,id_agen,id_rota,obs,status_obs,dat_ob,respon) values ('$id_ger','$cpf','$cod_rota','$obs_s','$status_obs','$data_s','$cpf')";
	$result = mysqli_query($conexao,$insert);
?>