<?php
session_start();

if(!isset($_SESSION['acesso']) || ($_SESSION['acesso'] != "OK") ) {
  $_SESSION["acesso"] = "Você deverá se autenticar!";
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>RotEnd</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/estilo.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!--icone-->
</head>
<body class="teal lighten-5"><!--teal lighten-5-->
  <div class="row">
    <div class="col l3 s1">
      <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
          
      <ul id="slide-out" class="side-nav fixed teal lighten-4" >
        <li><div class="user-view">
          <div class="background">
          <img src="img/socorro.jpg">
          </div>
          <br>
          <br>
          <br>
          <br>
        </div></li>
        <li><a href="home.php"><i class="material-icons">explore</i>Inicial</a></li>
        <li><a href="obs_atend.php">Atendimentos</a></li>
        <li><div class="divider"></div></li>
        <!--<li><a class="subheader">Subheader</a></li>-->
        <li><a class="waves-effect" href="configuracoes.php">Configurações</a></li>
        <li><a class=" red-text" href="index.php">Sair</a></li>
        
      </ul>
    </div>