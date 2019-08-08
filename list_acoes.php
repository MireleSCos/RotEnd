<?php
  include_once 'topo_gerente.php';
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
      <a href="home_gerente.php"><-Voltar</a>
      <div class="row">
        <div class="col l12 s12">
          <table class="highlight bordered striped">
          <thead>
            <tr>
                <th>ver</th>
                <th>Status</th>
                <th>Data de inicio</th>
                <th>Data programada para termino</th>
                <th>Data de termino</th> 
                <th>Responsável </th>
                <th>Local</th>
            </tr>
          </thead>
          <tbody>
             <?php
              $cpf = $_SESSION["cpf"];
              $query = "select  r.cod_rota,s.nome as status,r.dat_in,r.dat_fi,r.dat_fi_ver,p.nome as pessoa ,te.nome as estado,tc.nome as cidade from rotas r,pessoa p,tb_cidades tc, tb_estados te, status_ro s where r.status_ro = s.cod_status and r.agente=p.cpf and p.cod_local = tc.id and tc.estado = te.uf and status_ro != 0 and status_ro != 4";
              $result = mysqli_query($conexao,$query);
             
              while($row=mysqli_fetch_array($result)){
                  
                ?>

               <tr><td><a class="btn-floating teal lighten-5" href="visu_rota_gerente.php?id=<?php echo $row['cod_rota']?>" ><i class=" material-icons grey darken-1">zoom_in</i></i></a>

                <?php echo "</td><td> Rota : ". $row['status'] ."</td><td>". $row['dat_in'] ."</td><td>". $row['dat_fi'] ."</td><td>" . $row['dat_fi_ver'] . "</td><td>".$row['pessoa']."</td><td>".$row['estado']."<br>".$row['cidade']."</td></tr>";
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