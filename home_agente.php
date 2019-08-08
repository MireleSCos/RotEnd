<?php
	include "connection.php";
  	include_once 'topo.php';
?>
		<div class="col l9 s9 conteudo-do-home">
		<br>
		<br>
		<br>
		<div class="row">
			<div class=" col l11 s11  blue-grey lighten-2"><h6>Notificações</h6></div>
	    </div>
		<div class="row">
			<div class="col l5 s12 white z-depth-5" style="border-radius: 6px;">

				<br>
				<br>
				<div class="row">
					<a href="#"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><br><center><i class="material-icons">notifications</i><h4><?php 
						$select = "select count(*) from solic_servico";
						$result = mysqli_query($conexao,$select); 
              			while($row=mysqli_fetch_array($result)){
                  				echo $row['count(*)'];
                  		}
                		?> </h4> Solicitações de atendimento</center><br></div></a>
				</div>
				<br>
				<br>
			</div>
			<div class="col l5 s12 white z-depth-5 offset-l1 " style="border-radius: 6px;">
				<br>
				<br>
				<div class="row">
					<a href="res_obs.php"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><br><center><i class="material-icons">notifications</i><h4>
						<?php
							$cpf = $_SESSION['cpf'];
					
							$select = "select count(distinct id_rota) as quanti from obsrota where id_agen = '$cpf' and status_obs = 'aberta'";
							$result = mysqli_query($conexao,$select); 
	              			while($row=mysqli_fetch_array($result)){
	                  				echo $row['quanti'];
                  		}
                		?> </h4> Mensagens do seu gerente</center><br></div></a>
				</div>
				<br>
				<br>
			</div>
		</div>
<br><br>
		<div class="row">
			<div class=" col l11 s11 blue-grey lighten-2 "><h6>ROTA</h6></div>
	    </div>
		<div class="row">	
			<div class="col l11 s11 white z-depth-5" style="border-radius: 6px;">
				<br>
				<div class="row">
					
					<div class="row"><a href="Marcar_pontos.php"><div class=" btn col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;" ><h6 class="blue-text"><i class="material-icons">add_location</i> Nova Rota </h6></div></a></div>
				</div>
				<div class="row">
					<div class="row"><a href="rotas.php"><div class=" btn col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;" ><h6 class="blue-text"><i class="material-icons">beenhere</i>Consultar Rotas</h6></div></a></div>
				</div>
			</div>
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