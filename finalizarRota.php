<?php
	session_start();

	include "connection.php";

	$obs_s= $_POST['obs_s'];
	$status_ro= $_POST['status_ro'];
	$cod_rota= $_POST['id'];
	$data_s = date("Y-m-d");
	$modif = "update rotend.rotas SET  status_ro= '$status_ro',dat_fi_ver = '$data_s',obs ='$obs_s' WHERE cod_rota=$cod_rota";
	$resultdois = mysqli_query($conexao,$modif);           

	$status_obs = 'aberta';
	$cpf = $_SESSION['cpf'];
    $query = "select * from agente where cpf='$cpf'";
    $result = mysqli_query($conexao,$query);
  
    while($row=mysqli_fetch_array($result)){
          $id_ger = $row["gerente"];   
    }

    $insert = "insert into obsrota (id_ger,id_agen,id_rota,obs,status_obs,dat_ob,respon) values ('$id_ger','$cpf','$cod_rota','$obs_s','$status_obs','$data_s','$cpf')";
	$result = mysqli_query($conexao,$insert);
    mysqli_close($conexao);        
?>