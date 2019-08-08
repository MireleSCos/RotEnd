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
      <a href="home_agente.php"><-Voltar</a><br><br>
      <div class="row  ">
          <div class="col l6"> 
            <br>
            <br>
            <br>
            <br>

                          <div id="map" style="width: 100%; height: 500px"></div>
             <?php
                      $cod_rota = $_GET['id'];

                      $query = "select r.obs,r.status_ro, r.saida,r.chegada,r.pontos,r.cod_rota,s.nome as status,r.dat_in,r.dat_fi,r.dat_fi_ver,r.agente as agente ,p.nome as pessoa ,te.nome as estado,tc.nome as cidade from rotas r,pessoa p,tb_cidades tc, tb_estados te, status_ro s where r.status_ro = s.cod_status and r.agente=p.cpf and p.cod_local = tc.id and tc.estado = te.uf and r.cod_rota = $cod_rota";
                      $result = mysqli_query($conexao,$query);
                       
                      while($row=mysqli_fetch_array($result)){
                        
                        ?>
                        <br>
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
                        <h6>Data de finalização  </h6>
                        <span class="title" id="data_final"> <?php echo $row['dat_fi_ver']?></span>
                       
                      </li>
                      <li class="collection-item avatar">
                        <i class="material-icons circle red">event_available</i>
                        <h6>Situação da rota </h6>
                        <span class="title" id="data_final"> <?php echo $row['status']?></span>
                       
                      </li>
                      <li class="collection-item avatar">
                        <i class="material-icons circle red">event_available</i>
                        <h6>Observação do agente </h6>
                        <span class="title" id="data_final"> <?php echo $row['obs']?></span>
                       
                      </li>
                    </ul>
                        <?php
                      } 
                  ?>
          </div>
      
          <div class="col l6 s12 ">
              <center><h4>Comentários</h4></center>
                      <?php
                        $cod_rota = $_GET['id'];

                        $query = "select * from obsrota where id_rota = $cod_rota";
                        $result = mysqli_query($conexao,$query);
                        echo "<a >Numero da rota :<span id='id_rota'>".$cod_rota."</span></a> ";
                        while($row=mysqli_fetch_array($result)){
                           echo "<li class='collection-item  blue-grey lighten-3'><b>".$row['obs']."</b><p>".$row['dat_ob']."</p><p>".$row['respon']."</p></li>";
                          }
                          ?>
                          </ul>
                    
                      <div class="input-field col s6">
                        <input id="obs" type="text" data-length="200">
                        <label for="obs">Comentário</label>                          
                    
                      <button onclick="salvarObs()" class="btn">Concluido</button>
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
  function salvarObs() {
      var obs_s = document.getElementById('obs').value;
      var id_rota_s = document.getElementById('id_rota').innerHTML;
      $.post("obs_rota_agente.php",{obs:obs_s,id_rota:id_rota_s});{
      }
    location.reload();
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
            directionsDisplay.setDirections(response);

          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
    
  }
  $(document).ready(
          function() {
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
            abrirmapa();
         });
</script>

</html>
