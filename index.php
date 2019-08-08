<!DOCTYPE html>
<html>
<head>
	<title> Index </title>
	<meta charset="utf-8">
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="shortcut icon" href="img/logo2.ico">
	<link rel="stylesheet" href="css/materialize.css">
	<link rel="stylesheet" href="css/estilo-inicial.css">

</head>
<body class="teal lighten-2">

	<nav class="teal lighten-5" id="menu">
		
		<div class="nav-wrapper container teal lighten-5">

			<a href="" class="brand-logo left" id="logo" style="font-family: moon; font-size: 30pt">RotEnd</a>
			   	<a href="" data-activates="menu-mobile" class="button-collapse right" id="icone_menu">
				<i class="material-icons">menu</i>
			</a>
			      
			<ul id="nav-mobile" class="right hide-on-med-and-down">
			   	<li><a href="desenv.php"><i class="small left material-icons">people</i>Criadoras</a></li> <!--Aqui Ana e Brenda irão criar a página com nossas informações-->
			   	<li><a href="inicial.php"><i class="small left material-icons">account_box</i>Login/Cadastro</a></li>
			   	
			</ul>

			<ul id="menu-mobile" class="side-nav">
			   	<li><a href="index.php"><i class="small material-icons">people</i>Criadoras</a></li>
			   	<li><a href="inicial.php"><i class="small material-icons">account_box</i>Login</a></li>
			</ul>

		</div>

  	</nav>


  	<div>
	  	<div class="slider" >
		    <ul class="slides">
		      <li>
		        <img src="img/index1.png"> <!-- random image -->
		        <div class="caption left-align " style="color: black; margin-left: -9%; margin-top: 8%; font-family: Cambria">
		        	<h4><i>Você terá a possibilidade de traçar rotas!</i></h4>
          			<h5 class="light black-text text-lighten-3">Como também economizará tempo e chegar mais rápido ao destino.</h5>
		        </div>
		      </li>
		      <li>
		        <img src="img/index2.png"> <!-- random image -->
		        <div class="caption left-align" style="color: black; margin-left: -9%; margin-top: 8%; font-family: Cambria">
		        	<h4><i>Haverá também a opção de visualizar a data e a respectiva rota que já foi cadastrada.</i></h4>
		        </div>
		      </li>
		      <li>
		        <img class="responsive-img" src="img/index3.png"> <!-- random image -->
		        <div class="caption right-align">
		        </div>
		      </li>
		    </ul>
	  	</div>
	</div>
	<br>

	<div class="container ">
		<div class="card ">
		    <div class="card-content" style="font-size: 14pt">
		    	<center><p>Saiba mais sobre o que é o projeto, como funciona e como traçar as rotas</p></center>
		    </div>
		    <div class="card-tabs">
		      <ul class="tabs tabs-fixed-width">
		        <li class="tab"><a href="#test4">O que é</a></li>
		        <li class="tab"><a class="active" href="#test5">Funcionamento</a></li>
		        <li class="tab"><a href="#test6">Rotas</a></li>
		      </ul>
		    </div>
		    <div class="card-content amber lighten-5">
		    	<div id="test4">É um sistema WEB que trará melhoria para a área da saúde, focando na otimização das rotas dos agentes de endemias, que atuam nas ruas de uma comunidade, prevenindo e ajudando a combater doenças que podem ser epidemiológicas, principalmente as causadas pelo mosquito Aedes aegypti.</div>
		    	<div id="test5">Primeiramente, têm-se à disposição a tela de cadastro, logo após a ação (de cadastrar), poderás usufruir do mapa para assim definir suas rotas e visualizá-las.</div>
		    	<div id="test6">Você terá a possibilidade de traçar rotas, visualizar a data que foi cadastrada e por último ver qual caminho foi tracejado</div>
		    </div>
	  	</div>
	</div>

	<div class = "container">

		<ul class="collapsible" data-collapsible="accordion">
  			<li>
    			<div class="collapsible-header">
      				<i class="small material-icons">arrow_drop_down_circle</i>
      				Combate ao Aedes Aegypti
      			</div>
				<div class="collapsible-body amber lighten-5">
    				<u><a style = "color: blue" href="http://portalarquivos.saude.gov.br/campanhas/combateaomosquito/">#MosquitoNão</a></u>
    			</div>
				
    			<div class="collapsible-body amber lighten-5">
    				<u><a style = "color: blue" href = "http://combateaedes.saude.gov.br/pt/noticias/380-governo-esta-fazendo-tudo-que-e-necessario-para-o-combate-ao-aedes-aegypti-diz-ministro"> O governo está fazendo tudo que é necessário para o combate ao Aedes Aegypti </a></u>
    			</div>
  			</li>
		</ul>

	</div>
	
	<div class="container ">
		<div class = "row">
			 <div class="carousel">
				<a class="carousel-item" href="#two!"><img src="img/10.png" style = "height: 300px; width: 300px"></a>
				<a class="carousel-item" href="#four!"><img src="img/12.png" style = "height: 300px; width: 300px"></a>
				<a class="carousel-item" href="#five!"><img src="img/13.png" style = "height: 300px; width: 300px"></a>
				<a class="carousel-item" href="#five!"><img src="img/14.png" style = "height: 300px; width: 300px"></a>
				<a class="carousel-item" href="#five!"><img src="img/15.png" style = "height: 300px; width: 300px"></a>
				<a class="carousel-item" href="#five!"><img src="img/16.png" style = "height: 300px; width: 300px"></a>
				<a class="carousel-item" href="#five!"><img src="img/17.png" style = "height: 300px; width: 300px"></a>
			</div>
		</div>
	</div>
	
	<footer class="page-footer teal darken-4">
		<div class="footer-copyright teal lighten-4">
            <div class="container">
				<center style = "color: black">© 2017 RotEnd, all rights reserved.</center>
            </div>
        </div>
    </footer>
	
		



  	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

	<script type="text/javascript">
		//Menu mobile
		$(".button-collapse").sideNav();
		//slider
		$(document).ready(function(){
      		$('.slider').slider({
      			transition: 600,
      		});
    	});
		//Carousel
		$(document).ready(function(){
			$('.carousel').carousel();
		});
       
	</script>
	
</body>
</html>
