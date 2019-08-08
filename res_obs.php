<?php
  include_once 'topo.php';
  include_once("connection.php");
?>

<div class="col l9 s10 conteudo-do-home">
      <div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                  <h3>Ações</h3>
              </blockquote>
          </div>
      </div>
      <a href="home_agente.php"><-Voltar</a>
      <div class="row">
        <div class="col l12 s12">
          <table class="highlight bordered striped">
          <thead>
            <tr>
                <th>Responder</th>
                <th>ID Rota</th>
                <th>Data de inicio</th>
                <th>Data programada para termino</th>
                <th>Data de termino</th> 
            </tr>
          </thead>
          <tbody>
             <?php
              $cpf = $_SESSION["cpf"];
              $query = "select distinct o.id_rota, r.cod_rota,r.dat_in,r.dat_fi,r.dat_fi_ver from obsrota o,rotas r where o.id_rota = r.cod_rota and r.status_ro != 4 and r.status_ro !=0 ";
              $result = mysqli_query($conexao,$query);
             
              while($row=mysqli_fetch_array($result)){
                  
                ?>

               <tr><td><a class="btn-floating teal lighten-5" href="visu_rota_agente.php?id=<?php echo $row['cod_rota']?>" ><i class=" material-icons grey darken-1">zoom_in</i></i></a>

                <?php echo "</td><td> ". $row['cod_rota'] ."</td><td>". $row['dat_in'] ."</td><td>". $row['dat_fi'] ."</td><td>" . $row['dat_fi_ver'] . "</td></tr>";
              }
            ?>
          </tbody>
          </table>
        </div>
      </div>
</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(
          function() {
            $(".button-collapse").sideNav();
         }
      );
</script>

</script>
</html>