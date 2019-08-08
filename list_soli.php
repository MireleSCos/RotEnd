<?php
  include_once 'topo_cidadao.php';
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
      <a href="home_cidadao.php"><-Voltar</a>
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
                <th>Apagar</th>
            </tr>
          </thead>
          <tbody>
             <?php
              $cpf = $_SESSION["cpf"];
              $query = "select  * from solic_servico s, tiposervico t where s.cidadao= '$cpf' and t.cod_ser = s.cod_ser";
              $result = mysqli_query($conexao,$query);
             
              while($row=mysqli_fetch_array($result)){
                  
                ?>

               <tr>


                <?php echo "<td>". $row['cod'] ."</td><td>". $row['status_at'] ."</td><td>". $row['dat_so'] ."</td><td>" . $row['dat_at'] . "</td><td>".$row['nome']."</td><td>".$row['descricao']."</td>";
                ?>

                 <td><a class="btn-floating teal lighten-5" href="apagar_solic.php?id=<?php echo $row['cod']?>" ><i class=" material-icons red">delete</i></i></a></td></tr>

                <?php

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