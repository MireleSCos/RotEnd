<?php
  include_once 'topo_cidadao.php';
  	include "connection.php";

?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<div class="col l9 s10 conteudo-do-home">
		<div class="row"></div>
		<div class="row"></div>
		<div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
               <h3>Registros</h3>
              </blockquote>
           <!--  <p>De a elas um grau de importância</p> --> <!-- Não entendi o uso dessa tag-->
		<a href="home_cidadao.php"><-Voltar</a>
          </div>
      	</div>

      		<div class="row ">
      			<div class="col l10 offset-l1 z-depth-5  white">
		      		<form method="POST" action="cad_atend.php"><br><br>
						  <div class="row ">
							    <div class="col l5 s5 offset-l1 offset-s1">
							       <h6><i class="material-icons">date_range</i> Data programada </h6>
							       <input type="date"  name="dat_at">
							    </div>
							    <div class="col l5 s5 ">
							    	<h6><i class="material-icons">class</i> Tipo de Solicitação </h6>
							    	<select id="cod_ser" name="cod_ser">
									      <option value="0" disabled selected>Selecionar</option>
						              <?php
						                    $query = "select * from tiposervico";
						                    $result = mysqli_query($conexao,$query);
						                    while($row=mysqli_fetch_array($result)){
						                      echo "<option value=".$row['cod_ser'].">".utf8_encode($row['nome'])."</option>";
						                    }
						              ?>
						            </select>
							    </div>
						  </div>
					 	  <div class="row ">
						    <div class="input-field col l10 s10 offset-l1 offset-s1">
		                        <input id="descricao" type="text" name = "descricao" data-length="300">
		                        <label for="descricao">Descrição</label>                          
		                    </div>
						  </div>
							<div class="row">
			  				<div class="col l4 s4 offset-l1">
							  	    <center><input type="submit" class="btn waves-effect waves-light" name="action"></input></center>
							</div>
						</div>
					</form>

				</div>
		
		</div>
<!--Alteração-->
		<center><a href="home_cidadao.php"><div class="col l4 s4 offset-l4 offset-s8 "  style=" font-family:'Indie Flower', cursive;" ><h6><i class="material-icons">replay</i> VOLTAR </h6></div></a></center>

      	 <script type="text/javascript">
      	 	
	      	  $(document).ready(function(){
			    $('.tooltipped').tooltip({delay: 10});
			  });

      	 </script>	
	</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
	<script>
		$(document).ready(
      		function() {
        		$('select').material_select();
        		 $(".button-collapse").sideNav();
     		 }
    	);
	</script>
</body>
</html>