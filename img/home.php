<?php
  include_once 'topo.php';
?>
		<div class="col l9 s10 conteudo-do-home">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
			<div class="row">
				
			    <div class="col l4 ">
				  <div class"row">
					<div class=" col l4 blue-grey lighten-3"><h6>Nova rota</h6></div>
	              </div>
				  <br>
			      <div class="card z-depth-4">
			        <div class="card-image">
			          
			          <a class="btn-floating halfway-fab waves-effect waves-light red" href="Marcar_pontos.php"><i class="material-icons">add</i></a>
			        </div>
			        <div class="card-content">
			          <p>Vamos começar uma nova rota ? Click no botão acima !</p>
			        </div>
			      </div>
			    </div>
				
			    <div class="col l4 offset-l1">
				  <div class"row">
					<div class=" col l4 blue-grey lighten-3"><h6>Rotas já feitas</h6></div>
	              </div>
				  <br>
			      <div class="card z-depth-4">
			        <div class="card-image">
			          
			          <a class="btn-floating halfway-fab waves-effect waves-light red" href="list_rotas.php"><i class="material-icons">add</i></a>
			        </div>
			        <div class="card-content">
			          <p>Vamos começar uma nova rota ? Click no botão acima !</p>
			        </div>
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