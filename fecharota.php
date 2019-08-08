dd
<?php
	session_start();

	include "connection.php";

	$status_ro= 4;
	$cod_rota= $_POST['id'];
	$status_obs = "fechada";
	$data_s=  date("Y-m-d");

	$modif = "update rotend.rotas SET  status_ro= '$status_ro' WHERE cod_rota='$cod_rota'";
	$resultdois = mysqli_query($conexao,$modif);
    $modifi = "update rotend.obsrota SET  status_obs= '$status_obs' WHERE id_rota='$cod_rota'"; 
    $resultdoiss = mysqli_query($conexao,$modifi);
    mysqli_close($conexao);           
?>