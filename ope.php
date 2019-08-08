<?php
// inicia a sessão
session_start();

include "connection.php";
// recupera os dados do formulário
$login = isset($_POST["login"]) ? trim($_POST["login"]) : FALSE;//Criando veriável global
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE;

if (!$login || !$senha){
	$_SESSION["acesso"]= "Você deve digitar o login e senha!";
	header("Location: inicial.php");
}


$select = "select p.nome as pessoa,p.cpf,p.email,p.endereco,p.telefone,p.senha,p.cod_local as local,p.tipousuario,tc.id,tc.estado,tc.nome as cidade,te.uf,te.nome as estadof from pessoa p,tb_cidades tc,tb_estados te where  p.cod_local = tc.id and tc.estado = te.uf and email = '$login' and senha = '$senha'";
$result = mysqli_query($conexao, $select);


if(mysqli_num_rows($result) > 0){
	$dados = mysqli_fetch_array($result);
	$_SESSION["login"]  		= $dados['email']; 
	$_SESSION["cpf"]           = $dados['cpf'];
	$_SESSION["nome"]           = $dados['pessoa'];
	$_SESSION["tipousuario"]    = $dados['tipousuario'];
	$_SESSION["cidade"]    = $dados['cidade'];
	$_SESSION["estado"]    = $dados['estadof'];
	$_SESSION["local"]     = $dados['local'];
	$_SESSION["endereco"]  = $dados['endereco'];

	$_SESSION["senha"]  		= $senha;
	$_SESSION["acesso"] = "OK";
	if($_SESSION["tipousuario"] == '1'){	
		header("Location: home_agente.php");
	}
	else if($_SESSION["tipousuario"] == '2'){
		header("Location: home_gerente.php");
	}
	else if($_SESSION["tipousuario"] == '3'){
		header("Location: home_cidadao.php");
	}
	else{
		echo "usuário não encontrado!";
	}
}
else {
	$_SESSION["login"]  = $login;
	$_SESSION["senha"]  = "";
	$_SESSION["acesso"] = "Login ou senha invalido!";
	header("Location: inicial.php");	
}
?>