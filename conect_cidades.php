<?php include_once("connection.php");

	$estados = $_GET['search'];
	
	$result_sub_cat = "select* from tb_cidades where estado='$estados'";
	$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'estado'	=> $row_sub_cat['estado'],
			'nome' => utf8_encode($row_sub_cat['nome']),
		);
	}
	
	echo(json_encode($sub_categorias_post));
?>