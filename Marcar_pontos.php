<?php
  include_once 'topo.php';
?>

<div class="col l9 s10 offset-l3">
      <div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                  <h3>Vamos começar o trabalho..</h3>
              </blockquote>
          </div>
      </div>
      <a href="home_agente.php"><-Voltar</a>
      <div class="row">
        <div class="col l12 s12 ">
          
            <ul class="collapsible popout" data-collapsible="accordion">
              <li>
                <div class="collapsible-header"><i class="material-icons">chat_bubble_outline</i>Primeiro passo</div>
                <div class="collapsible-body"><span>O primeiro click sobre o mapa representa a origem do agente, então click sobre o mapa no local de origen da tragetória.</span></div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">chat_bubble</i>Segundo passo</div>
                <div class="collapsible-body"><span>O segundo click referece ao local de destino do ageente, logo deve-se click sobre o local da parada.</span></div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">chat</i>Terceiro passo</div>
                <div class="collapsible-body"><span>Marque os pontos intermediários, aqueles que representarão os pontos de visitas, podendo ser os cruzamentos das ruas, mas fica por criterio do cliente</span></div>
              </li>
            </ul>
        </div>
      </div>
      <div class="row">
          <div class="col l12 s12 ">
              <div id="map" style="width: 100%; height: 500px"></div>
          </div>
        </div>
      <div class="row">
        <div class="col l9 s12 offset-l1">
          <br>
            <div id="button_calcular"><input type="button" id="submit" class="btn waves-effect waves-light btn-large" value="Calcular" ></div>
            <br>
            <div id="directions-panel"></div>
        </div>
        <div class="row">
        <div class="col l4 s4 offset-l1">
          <div id="salvar"></div>
        </div>
          <br>
        <div class="col l4 s4 offset-l1"> 
          <div id="novarota"></div>
         </div>

        </div>
      </div>
    </div>
  </div>
</body>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUBcy8iO-fSMfJ_bKulrmC8n1Jf5nPj-c&callback=initMap" 
 async defer></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $('.collapsible').collapsible();
    $(document).ready(
          function() {
            $(".button-collapse").sideNav();
         }
      );
      var ponto_start;
      var ponto_start_s;
      var ponto_end;
      var ponto_end_s;
      var waypts = [];
      var pts = "";
      function initMap() {
        var directionsService = new google.maps.DirectionsService;//Objeto que "faz" a solicitação 
        var directionsDisplay = new google.maps.DirectionsRenderer;//Objeto responsavel por receber a apresentação do retorno da solicitação
        var map = new google.maps.Map(document.getElementById('map'), {// Construtor do map
          zoom: 17,
          center: {lat: -6.461068, lng: -37.095553}
        });
        directionsDisplay.setMap(map);//Apresentado no objeto map

        map.addListener('click', function(e) {// Evento responsável por pegar clicks sobre o map e retorna valores de latitudes e longitudes 
          placeMarkerAndPanTo(e.latLng, map); // Chamando a função responsável por adicionar marcadores
          //var lat =  e.latLng.lat;//Variável que recebe latitude 
          //var logi = e.latLng.lng;//Variável que recebe longitude
          latlngarray(e.latLng);// Chamando a função responsável por adicionar os valores lat e logi em um array
          
        });
        document.getElementById('submit').addEventListener('click', function() {// Quando clicar no botão irá execultar a função de calcular a rota
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }
      function placeMarkerAndPanTo(latLng, map) {//Função responsável por adicionar marcadores
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
        map.panTo(latLng);
      }
      function latlngarray(latlogi) {//Função responsável por adicionar os valores lat e logi em um array
        waypts.push({
              location: latlogi,
              stopover: true
        });

      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
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
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            var salvar = document.getElementById('salvar');
            var novarota= document.getElementById('novarota');
            var apagar = document.getElementById('button_calcular');
            apagar.innerHTML = '';
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            
            /*for (var i = 1; i < (route.legs.length -1); i++) {
              var routeSegment = i ;
              summaryPanel.innerHTML += '<b>Segmento de Rota  ' + routeSegment +
                  ':</b><br>';
              summaryPanel.innerHTML += route.legs[i].start_address + ' para ';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';

            }*/
            var start = route.legs.length -1;

            ponto_start_s =  route.legs[0].end_address;
            ponto_end_s = route.legs[start].start_address;
            novarota.innerHTML += '<a class="waves-effect waves-light btn-large" href="Marcar_pontos.php">NOVA</a>';

            salvar.innerHTML += 'Deseja salvar ? Então para quando vc program terminar esta rota ?<br><input type="date" id="dat_fi" name="data"><button class="waves-effect waves-light btn-large" onClick="salvarpontos()">SALVAR</button>';
            
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function salvarpontos(){
    
        for(i=0; i < waypts.length; i++){
          pts = pts + waypts[i].location + "/";
        }
        //var nomePost = "Rota de : "+ponto_end_s+" para :"+ponto_start_s;
        var dat_fi_s = document.getElementById('dat_fi').value;
        alert (dat_fi_s);
        $.post("cad_pontos.php", {saida: ponto_start_s, chegada:ponto_end_s,dat_fi:dat_fi_s, pontos: pts});{
    
        }
        //$.post("cad_pontos.php", {pi:ponto_start_s,pf:ponto_end_s,pi_d:ponto_start, pf_d:ponto_start });
        alert ('Sua rota está salva!');
        window.top.location.href="list_rotas_todas.php";
       // $.post( "cad_pontos.php", { pi: ponto_start, pf: ponto_end, ponto_meio: waypts});
      }
</script>
</html>