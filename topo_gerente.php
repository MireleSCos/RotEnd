<?php
session_start();
if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK") ) {
  $_SESSION["acesso"] = "Você deverá se autenticar!";
  header("Location: inicial.php");
}
else if (!isset($_SESSION['login']) || $_SESSION['tipousuario'] != '2' ){
  $_SESSION["acesso"] = "Você não tem permissão para acessar a pagina do Gerente!";
  header("Location: inicial.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>RotEnd</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="img/logo2.ico">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/estilo.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--icone-->
</head>
<body class="teal lighten-5"><!--teal lighten-5-->
  <div class="row">
    <div class="col l3 s1">
      <ul id="menu-mobile" class="side-nav fixed teal lighten-4">
        <li><div class="user-view">
          <div class="background">
            <img src="img/banner.jpg">
          </div>
          <a href="#!user"><img class="circle" src="img/perfil.jpg"></a>
          <a href="#!name"><span class="white-text name"> <?php $nome = $_SESSION["nome"]; echo"$nome";?> </span></a>
          <a href="#!email"><span class="white-text email"><?php $login = $_SESSION["login"]; echo"$login";?></span></a>
          </div></li>
		      <br>
          <li><a href="home_gerente.php"><i class="material-icons">explore</i>Bem vindo, <?php $nome = $_SESSION["nome"]; echo"$nome";?></a></li>
				 <li><div class="divider"></div></li>
         <li>
              <a href="list_acoes.php"><i class="material-icons">add_location</i>Seus Agentes</a>
            </li>
            <li>
              <a href="singup_agente.php"><i class="material-icons">beenhere</i>Cadastrar Agente</a>
            </li>
            <li>
              <a href="singup_gerente.php"><i class="material-icons">email</i>Cadastrar Gerente</a>
            </li>
            <li>
              <a href="list_soli_gerente.php"><i class="material-icons">notifications_active</i>Portal do cidadão</a>
            </li>
            <!--<li><a class="subheader">Subheader</a></li>-->     
            <li><a class=" red-text" href="sair.php">Sair</a></li>   
        </ul>
          <a href="" data-activates="menu-mobile" class="button-collapse" id="icone_menu"><i class="material-icons">menu</i></a>     
    </div>

</body>