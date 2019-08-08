<?php
  include_once 'topo.php';
?>
		<div class="col l9 s9 conteudo-do-home">
		<br>
		<br>
		<br>
		<div class="row">
			<div class=" col l2 s4  offset-s1 blue-grey lighten-2"><h6>Atendimentos</h6></div>
	    </div>
		<div class="row">	
			<div class="col l5 s12 white z-depth-5" style="border-radius: 6px;">
				<br>
				<br>
				<div class="row">
					<a href="#"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><br><center><i class="material-icons">notifications</i><h4> 5</h4> Solicitações de atendimento</center><br></div></a>
				</div>
				<br>
				<br>
			</div>
		</div>
		<div class="row">
			<div class=" col l1 s2  offset-s1 blue-grey lighten-2"><h6>ROTA</h6></div>
	    </div>
		<div class="row">	
			<div class="col l4 s9 white z-depth-5" style="border-radius: 6px;">
				<br>
				<div class="row">
					<a href="Marcar_pontos.php"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><h6><i class="material-icons">add_location</i> Nova Rota</h6></div></a>

				</div>
				<div class="row">
					<a href="list_rotas.php"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><h6><i class="material-icons">beenhere</i> Consultar Rotas</h6> </div></a>
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