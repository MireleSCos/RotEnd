<?php
  include_once 'topo.php';
  include_once("connection.php");
?>

<div class="col l9 s10 conteudo-do-home">
      <div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                  <h3>Dados de Rota</h3>
              </blockquote>
          </div>
      </div>
      <a href="home_agente.php"><-Voltar</a>
      <div class="row" id="fechar">
          <center><div class="col l12">
            <div class="switch" id="fechar" >
              <a class=" modal-trigger" id = "link" href="#modal1"></a>
              <label>
                Em andamento 
                <input type="checkbox" onclick="finalizarRota()">
                <span class="lever"></span>
                Fecha rota
              </label>
            </div>

            <!-- Modal Structure -->
            <div id="modal1" class="modal modal-fixed-footer">
              <div class="modal-content">
                <h4>Detalhes</h4>
                <b><span>Data de Inicio</span></b>
                <?php
                  $cod_rota = $_GET['id'];
                  $query = "select * from rotas where cod_rota = $cod_rota ";
                  $result = mysqli_query($conexao,$query);
                   while($row=mysqli_fetch_array($result)){
                      echo "<h6>".$row['dat_in']."</h6>";
                      echo "<b><span>Data programada para termino : </span></b>";
                      echo "<h6>".$row['dat_fi']."</h6>";
                    }
                ?>
                    <br>
                    <br>
                    <br>
                    <div class="input-field col s6">
                        <select id="status">
                          <option value="" disabled selected>Status</option>
                          <?php
                                $query = "select * from status_ro";
                                $result = mysqli_query($conexao,$query);
                                while($row=mysqli_fetch_array($result)){
                                  echo "<option value=".$row['cod_status'].">".utf8_encode($row['nome'])."</option>";
                                }
                          ?>
                        </select>
                        <label>Status da Rota</label>
                    </div>

                    <div class="input-field col s6">
                      <input id="obs" type="text" data-length="200">
                      <label for="obs">Input text</label>                          
                    </div>                                                   
              </div>
              <div class="modal-footer">
                <a href="#!" onclick="alterarBanco()" class="modal-action modal-close waves-effect waves-green btn-flat">Concluido</a>
              </div>
            </div>
          </div></center>
        </div>
      <div class="row">
        <div class="col l12 s12">
          <?php
          	$cod_rota = $_GET['id'];
            $query = "select * from rotas r,status_ro s where s.cod_status = r.status_ro and r.cod_rota = $cod_rota ";
            $result = mysqli_query($conexao,$query);
             
            while($row=mysqli_fetch_array($result)){
            	
            	?>
              <br>
              <a >Numero da rota :<span id="id_rota"><?php echo $row['cod_rota']?></span></a> 
              <a >Status da Rota :<span id="status_ro"><?php echo $row['status_ro']?></span></a>
            <ul class="collection">
				    <li class="collection-item avatar">
				      <i class="material-icons circle green ">directions_walk</i>
				      <h6>Ponto de Saida :</h6>
				      <span class="title"> <?php echo $row['saida']?></span>
				      
				    </li>
				    <li class="collection-item avatar">
				      <i class="material-icons circle green">pin_drop</i>
				      <h6>Ponto de Destino :</h6>
				      <span class="title"> <?php echo  $row['chegada']?></span>
				      
				    </li>
				    <li class="collection-item avatar">
				      <i class="material-icons circle red">near_me</i>
				      <h6>Lugares a visitar:</h6>
				      <span class="title" id="pontos" >  <?php echo $row['pontos']?></span>
				     
				    </li>
				    <li class="collection-item avatar">
				      <i class="material-icons circle red">event_available</i>
				      <h6>Data de Inicio de Rota: </h6>
				      <span class="title" id="data_inicio"> <?php echo $row['dat_in']?></span>
				     
				    </li>
            <li class="collection-item avatar">
              <i class="material-icons circle red">event_available</i>
              <h6>Data programada para finalizar: </h6>
              <span class="title" id="data_final"> <?php echo $row['dat_fi']?></span>
             
            </li>
            <li class="collection-item avatar">
              <i class="material-icons circle red">event_available</i>
              <h6>Situação da Rota  </h6>
              <span class="title" id="data_final"> <?php echo $row['nome']?></span>
             
            </li>
				  </ul>
            	<?php
            }
        ?>
        <div class="row" id="button">
        	<div class="col l12 s12">
        	    <center><button class="waves-effect waves-light btn-large " onClick="abrirmapa()" >Abrir Mapa</button></center>
        	</div>
      	</div>
        <div class="row">
        	<div class="col l12 s12 ">
        	    <div id="map" style="width: 100%; height: 500px"></div>
        	</div>
      	</div>
        </div>

      </div>
  </div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUBcy8iO-fSMfJ_bKulrmC8n1Jf5nPj-c" async defer></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
  function finalizarRota(){
    document.getElementById('link').click();
  }
  function alterarBanco() {
    var status = document.getElementById('status').value;
    var obs = document.getElementById('obs').value;
    var id_rota = document.getElementById('id_rota').innerHTML;
    $.post("finalizarRota.php", {status_ro: status, obs_s:obs, id:id_rota});{
    }
    alert('Alterado');
     window.open("list_rotas_todas.php");
  }
	function abrirmapa() {
		var waypts = [];
		var waypts_teste = [];
    var waypts_s = "";
    var resultReplace;
    var point;
    var barraSplit;
    var virgulaSplit;
		var directionsService = new google.maps.DirectionsService;//Objeto que "faz" a solicitação 
    var directionsDisplay = new google.maps.DirectionsRenderer;//Objeto responsavel por receber a apresentação do retorno da solicitação
    var ponto_end;
    var ponto_start;
		var map = new google.maps.Map(document.getElementById('map'), {// Construtor do map
          zoom: 17,
          center: {lat: -6.461068, lng: -37.095553}
        });
    directionsDisplay.setMap(map);//Apresentado no objeto map
        
    result= document.getElementById('pontos').innerHTML;

    resultReplace = result.replace(/\(|\)| /g, "");  //retira os " ","(" e ")" da string, ficando assim: lat,long/...  
             
    barraSplit = resultReplace.split("/"); //Aplica o split "/" na string com todas as coordenadas, fica assim: lat,long...

    for(var i=0;barraSplit.length>i;i++){            
                virgulaSplit = barraSplit[i].split(",");   //Aplica o split "," na string com todas as coordenadas
                 
                point = new google.maps.LatLng(   //Cria um novo objeto ponto, que vai conter lat e long como atributos
                    parseFloat(virgulaSplit[0]),
                    parseFloat(virgulaSplit[1]));
                 
                waypts.push({   //Adiciona ao vetor waypts um novo ponto
                  location: point,
                  stopover: true
                });
      }
      waypts.splice(waypts.length-1, 1);
		    ponto_start = waypts[0].location;
        ponto_end = waypts[1].location;

        directionsService.route({ // Fazendo a solicitação
          origin: ponto_start,
          destination: ponto_end,
          waypoints:  waypts,
          optimizeWaypoints: true,
          travelMode: 'WALKING'
        }, function(response, status) {
          if (status === 'OK') {
            var apagar = document.getElementById('button');
            apagar.innerHTML = '';
            directionsDisplay.setDirections(response);

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
		
	}
  $(document).ready(
          function() {
            var status_ro = document.getElementById('status_ro').innerHTML;
            var apagar = document.getElementById('fechar');
            
            if (status_ro == 1 || status_ro == 2 || status_ro == 3) {
                apagar.innerHTML = '';
            }
            $(".button-collapse").sideNav();
            $('.modal').modal();
            $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
          });
            $('select').material_select();
         });
</script>

</html>
