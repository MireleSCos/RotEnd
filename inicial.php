<?php
  session_start();

  // recupera os dados do formulário
  $login = isset($_SESSION["login"]) ? $_SESSION["login"] : "";
  $senha = isset($_SESSION["senha"]) ? $_SESSION["senha"] : "";
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
  <link rel="stylesheet" href="css/estilo-inicial.css">
</head>
<body class="teal lighten-2"><!--teal lighten-5-->

  <nav class="teal lighten-5" id="menu">
     
      <div class="nav-wrapper container teal lighten-5">
 
        <a href="index.php" class="brand-logo left" id="logo" style="font-family: moon; font-size: 30pt">RotEnd</a>
            <a href="" data-activates="menu-mobile" class="button-collapse right" id="icone_menu">
          <i class="material-icons">menu</i>
        </a>
               
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php"><i class="small left material-icons">people</i>Criadoras</a></li> <!--Aqui Ana e Brenda irá criar a página com nossas informações-->
            <li><a href="inicial.php"><i class="small left material-icons">account_box</i>Login/Cadastro</a></li>
             
        </ul>
 
        <ul id="menu-mobile" class="side-nav">
            <li><a href="index.php"><i class="small material-icons">people</i>Criadoras</a></li>
            <li><a href="inicial.php"><i class="small material-icons">account_box</i>Login</a></li>
        </ul>
 
      </div>
 
    </nav>
    <br>
    <br>
    <div class="row">
      <div class="col s11 l5 offset-s1 offset-l1 z-depth-0 cartao"><!--white-->
        <br>
        <div class="row"><div class="col s11 l11 z-depth-2  cartao_login ">
        <br>
        <center><h5 id="cadastro">Já sou cadastrado!</h5></center>
      <form method="post" action="ope.php" id="formlogin" name="formlogin">
          <div class="row">
            <br>
            <div class="input-field col s8 l8 offset-l2 offset-s2">
              <input id="email" type="email" class="validate" name="login">
              <label for="email" >Email</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s8 l8 offset-l2 offset-s2">
              <input id="senha" type="password" class="validate" name="senha">
              <label for="senha">Senha</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s8 l8 offset-l2 offset-s2">
              <center style ="color:red"><?php 
                if(isset($_SESSION['acesso']) && $_SESSION['acesso'] != "OK") 
                  echo  $_SESSION['acesso'];
              ?></center>
            </div>
          </div>

          <div class="row">
            <div class= "col s8 l8 offset-l2 offset-s2">
              <center><input class="btn waves-effect waves-light" type="submit" value="Entrar" name="action"></input></center>
            </div>
          </div>
        </form>
        </div></div>
      </div>
      <div class="row">
        <div class="col l4 s10 offset-s1 offset-l1">
          <br>
          <br>
          <br>

          <h5>Ainda não tenho cadastro...</h5>
          <br>
          <br>
          <div class="row">
            <div class="col l9"><p>Para traçar novas rotas e ter acesso às menores distâncias em nosso site é preciso realizar um cadastro. É bem simples: é só clicar no botão ao lado. Prático, rápido e dinâmico. <br><i>Seja bem vindo! </i><p>
            </div>
            <div class="col l2 offset-l1"> <!--segundo botão- o do cadastro-->
              <br>
              <br>
              <a class="btn-floating btn-large waves-effect waves-light cyan darken-2" href="singup.php"><i class="material-icons right">arrow_forward</a>
            </div>
          </div>
        </div>
      </div>    
    </div>

     
    </footer>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
	<script type = "text/javascript">
		$(".button-collapse").sideNav();
		//slider
		$(document).ready(function(){
      		$('.slider').slider({
      			transition: 600,
      		});
    	});
	</script>
</body>
</html>
