<?php
  include_once 'topo_cidadao.php';
?>
		<div class="col l9 s9 conteudo-do-home">
		<br>
		<br>
		<br>
		<div class="row">
			<div class=" col l2 s4  offset-s1 blue-grey lighten-2"><h6>Atendimentos</h6></div>
	    </div>
		<div class="row">	
			<div class="col l11 s12 white z-depth-5" style="border-radius: 6px;">
				<div class="row">
					<br>
					<center><a href="nova_obs.php"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><h6><i class="material-icons">add_location</i> Solicitar </h6></div></a></center>

				</div>
				<div class="row">
					<center><a href="list_soli.php"><div class="col l8 s8 offset-l2 offset-s2 blue-grey lighten-5"  style="border-radius: 25px;"><h6><i class="material-icons">beenhere</i> Resgistros</h6> </div></a></center>
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