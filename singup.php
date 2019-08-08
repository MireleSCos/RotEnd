<?php
  include "connection.php"
?>

<!DOCTYPE html>
<html>
<head>
  
  <title>RotEnd</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="css/materialize.css">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="shortcut icon" href="img/logo2.ico">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo-inicial.css">
  <style type="text/css">
    .carregando{
      display: none;
    }

  </style>
  <!--icone-->

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
  <form action="cad_cidadao.php" method="post" id="formulario">
    <div class="row">
      <div class="col l8 s10 offset-s1 offset-l2 z-depth-2 cartao-cadastro ">    
        <div class="row">
          <br>
          <br>
        
          <div class="col l4 s4 offset-l1 offset-s1">
            <i class="material-icons">person</i>   Dados pessoais
          </div>
        </div> 
        <div class="row">
          <div class="input-field col l5 s5 offset-l1 offset-s1">
            <input id="nome" type="text" class="validate" name="nome" >
            <label for="nome" >Nome e Sobrenome</label>
          </div>
          <div class="input-field col l4 s4 offset-l1 offset-s1 ">
            <input id="cpf" type="text" class="validate" name="cpf" required pattern="[0-9]{2,3}.[0-9]{2,3}.[0-9]{2,3}-[0-9]{2,3}" title='CPF deve ser no formato 000.000.000-00'>
            <label for="cpf" >CPF</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col l5 s4 offset-l1 offset-s1 ">
            <input id="endereco" type="text" class="validate" name="endereco" >
            <label for="endereco" >Rua, Número</label>
          </div>
          <div class="input-field col l4 s5 offset-l1 offset-s1">
            <input id="telefone" type="text" class="validate" name="telefone" required pattern="\([0-9]{2,3}\)[0-9]{4,5}-[0-9]{4}" title='Telefone deve ser no formato (DDD)00000-0000'>
            <label for="telefone" >N° Telefone</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col l5 s4 offset-l1 offset-s1">
            <input id="email" type="email" class="validate" name="email" required>
            <label for="email" >Email</label>
          </div>
          <div class="input-field col l4 s5 offset-l1 offset-s1 ">       
            <input id="senha" type="password" class="validate" name="senha" >
            <label for="senha" >Senha</label>
          </div>
        </div>
        <br/>
        <br/>

        <div class="row">
          <div class="col l4 s4 offset-l1 offset-s1">
            <i class="material-icons">person_pin_circle</i> Dados do Local de Atuação
          </div>
        </div>

            

        <div class="row">
          <select class="col l2 s4 offset-l2 offset-s1 browser-default" name="estados" id="estados" >
            <option value="" disabled selected>Estado</option>
            <?php
              $query = "select * from tb_estados";
              $result = mysqli_query($conexao,$query);
              while($row=mysqli_fetch_array($result)){
                echo "<option value=".$row['uf'].">".utf8_encode($row['nome'])."</option>";
              }
            ?>
          </select>
          <span class="carregando">Aguarde, carregando...</span>
          <select class="col l2 s4 offset-l3 offset-s2 browser-default" name="cidades" id="cidades">
            <option value="" disabled selected>Cidade</option>
          </select>
         
        </div>
        <br/>
        <div class="row">
          <div class= "col s4 l4 ">
            <br/>
            <br/>
            <br/>
            <a href="index.php"><i class="material-icons">reply</i> Tela Inicial</a>
          </div>
          <div class= "col s4 l4  ">
            <center><input type="submit" class="btn waves-effect waves-light" name="action"></input></center>
          </div>  
        </div>
        
      </div>
        </div>
  </form>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>

  <script type="text/javascript">
    $(function(){
      $('#estados').change(function(){
        if($(this).val() ) {
          $('#cidades').hide();
          $('.carregando').show();
          var url = 'http://localhost/RotEnd/conect_cidades.php?search='+$(this).val();
          $.getJSON( url, function( j ) {
            var options = '<option value="">Cidade</option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
            } 
            $('#cidades').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#cidades').html('<option value="">– Escolha Subcategoria –</option>');
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(
      function() {
        $('select').material_select();
		$(".button-collapse").sideNav();
		$('.slider').slider({
      			transition: 600,
      		});
      }
    );
  </script>
  
</body>
</html>
