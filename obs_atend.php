<?php
  include_once 'topo_cidadao.php';
  include_once("connection.php");
?>
<div class="col l9 s10 conteudo-do-home">
		<div class="row"></div>
		<div class="row"></div>
		<div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                 <div class="row">
                 	<h3>Suas observações</h3>
              </blockquote>
          </div>
    </div>
    <a href="home_cidadao.php"><-Voltar</a>
      	<div class="row"><div class="col l3 offset-l9"><a class="btn waves-effect waves-light btn-large" href="nova_obs.php" > Nova Solicitação</a></div></div>
      	<div class="row">
        <div class="col l12 s12">

          <table class="highlight bordered striped">
          <thead>
            <tr>
                <th>Observação</th>
                <th>Data</th>
                <th>Grau</th> 
            </tr>
          </thead>
          <tbody>
            <?php
              $cpf = $_SESSION["cpf"];
              $query = "select * from  anotacoes where agente = '$cpf' ORDER BY dat DESC;" ;
              $result = mysqli_query($conexao,$query);
              
              while($row=mysqli_fetch_array($result)){?>

               <!--<tr><td><a class="btn-floating teal lighten-5" href="visualizar.php?id=<?php echo $row['cod_rota']?>" ><i class=" material-icons grey darken-1">zoom_in</i></i></a>-->

                <?php echo "</td><td>". $row['obs'] ."</td><td>". $row['dat'] ."</td><td>" . $row['grau'] . "</td></tr>";
              }
            ?>
          </tbody>
          </table>
        </div>
      </div>
</div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>


	<script>
		$(document).ready(
      		function() {
             $(".button-collapse").sideNav();
     		 }
    	);
      	
	</script>
</body>
</html>