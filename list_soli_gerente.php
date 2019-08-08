<?php
  include_once 'topo_gerente.php';
  include_once("connection.php");
?>

<div class="col l9 s10 conteudo-do-home">
      <div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                  <h3>Solicitações</h3>
              </blockquote>
          </div>
      </div>
      <a href="home_gerente.php"><-Voltar</a>
      <div class="row">
        <div class="col l12 s12">
          <table class="highlight bordered striped">
          <thead>
            <tr>
                <th>Codigo</th>
                <th>Status</th>
                <th>Data de Abertura</th>
                <th>Data Programada</th> 
                <th>Tipo de serviço</th>
                <th>Descrição</th>
                <th>Direcionar</th>
            </tr>
          </thead>
          <tbody>
             <?php
              $cod_local = $_SESSION["local"];
              $query = "select  * from solic_servico s, tiposervico t where s.status_at = 'aberta' and s.cod_local = '$cod_local' and t.cod_ser = s.cod_ser";
              $result = mysqli_query($conexao,$query);
             
              while($row=mysqli_fetch_array($result)){
                  
                ?>

               <tr>


                <?php echo "<td>". $row['cod'] ."</td><td>". $row['status_at'] ."</td><td>". $row['dat_so'] ."</td><td>" . $row['dat_at'] . "</td><td>".$row['nome']."</td><td>".$row['descricao']."</td>";
                ?>

                 <td><a class="btn-floating teal lighten-5 modal-trigger" href="#modal1" ><i class=" material-icons red">person</i></i></a></td></tr>

                <?php

              }

            ?>
             <!-- Modal Structure -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
              </div>
            </div>
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
            $('.modal').modal();
         }
      );
</script>

</script>
</html>