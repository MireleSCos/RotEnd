<?php
	include "connection.php";
  	include_once 'topo_gerente.php';
?>
		<div class="col l9 s9 conteudo-do-home">
		<br>
		<br>
		<br>
		<div class="row">
			<div class=" col l2 s4  blue-grey lighten-2"><h6>Atendimentos</h6></div>
	    </div>
		<div class="row">	

			<div class="col l5 s12 white z-depth-5" style="border-radius: 6px;">
				<br>
				<br>

				<div class="row">
					<a href="list_acoes.php"><div class=" col l8 s8 offset-l2 offset-s2 z-depth-1 blue-grey lighten-5"  style="border-radius: 25px;"><br><center><i class="material-icons">notifications</i><h4><?php 
						$select = "select count(*) from rotas where status_ro != 0 and status_ro != 4 	";
						$result = mysqli_query($conexao,$select); 
              			while($row=mysqli_fetch_array($result)){
                  				echo $row['count(*)'];
                  		}
                		?> </h4>Ações dos seus agentes</center><br></div></a>
				</div>
				<br>
			</div>
			<div class=" col l6 s12 ">
				<br>
				<div class="row">
					<div class=" col l3 s5 offset-l1 offset-s1 blue-grey lighten-2"><h6>Cadastrar</h6></div>
			    </div>
				<div class="row">	
					<div class="col l12 s9 offset-l1  white z-depth-5" style="border-radius: 6px;">
						<br>
						<div class="row">
							<div class="row"><a href="singup_agente.php"><div class=" btn col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;" ><h6 class="blue-text"><i class="material-icons">add_location</i> Agente</h6>a</div></a></div>
						</div>
						<div class="row">
							<div class="row"><a href="singup_gerente.php"><div class=" btn col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;" ><h6 class="blue-text"><i class="material-icons">beenhere</i> Gerente </h6>a</div></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col l12 s12 blue-grey lighten-2"><h6>Portal do cidadão</h6></div>
	    </div>
		<div class="row">	
			
			<div class="col l12 s12  white z-depth-5" style="border-radius: 6px;">
				<br>
				<br>

				<div class="row">
					<a href="list_soli_gerente.php"><div class=" col l8 s8 offset-l2 offset-s2 z-depth-1  blue-grey lighten-5"  style="border-radius: 25px;"><br><center><i class="material-icons">notifications</i><h4><?php 
						$cod_local = $_SESSION["local"];
						$select = "select count(*) from solic_servico where status_at = 'aberta' and cod_local = '$cod_local' ";
						$result = mysqli_query($conexao,$select); 
              			while($row=mysqli_fetch_array($result)){
                  				echo $row['count(*)'];
                  		}
                		?> </h4>Mensagens</center><br></div></a>
				</div>
				<br>
			</div>
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