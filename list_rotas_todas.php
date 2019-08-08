<?php
  include_once 'topo.php';
  include_once("connection.php");
?>

<div class="col l9 s10 conteudo-do-home">
      <div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                  <h3>Rotas já feitas</h3>
              </blockquote>
          </div>
      </div>
      <a href="home_agente.php"><-Voltar</a>
      <div class="row">
        <div class="col l12 s12">
          <table class="highlight bordered striped">
          <thead>
            <tr>
                <th>ver</th>
                <th>Endereço de Saida</th>
                <th>Endereço de Chegada</th>
                <th>Data de inicio</th> 
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
             <?php
              $cpf = $_SESSION["cpf"];
              $query = "select * from rotas r,status_ro s where r.status_ro = s.cod_status and agente = '$cpf' and status_ro !=4 ORDER BY dat_in DESC;" ;
              $result = mysqli_query($conexao,$query);
             
              while($row=mysqli_fetch_array($result)){
                  
                ?>

               <tr><td><a class="btn-floating teal lighten-5" href="visualizar.php?id=<?php echo $row['cod_rota']?>" ><i class=" material-icons grey darken-1">zoom_in</i></i></a>

                <?php echo "</td><td>". $row['saida'] ."</td><td>". $row['chegada'] ."</td><td>" . $row['dat_in'] . "</td><td>" . $row['nome'] . "</td></tr>";
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