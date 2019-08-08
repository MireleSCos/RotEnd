<?php
  include_once 'topo.php';
  include_once("connection.php");
?>

<div class="col l9 s10 conteudo-do-home">
      <div class="row">
          <div class="col l11 s12 offset-l1">
             <blockquote style="background-color: #f1f8e9">
                  <h3>Rotas</h3>
              </blockquote>
          </div>
      </div>
      <a href="home.php"><-Voltar</a>
      <br>
      <br>
      <br>
      <div class="row">
      <div class=" col l2 s4  offset-s2 offset-l2 offset-l1 blue-grey lighten-2"><h6>Pesquise a rota</h6></div>
      </div>
      <div class="row">

        <form action="list_rotas.php" method="GET"><div class="col l8 s8 offset-l2 offset-s2  z-depth-5 cartao-cadastro  white">
          <br>
          <br>

          <div class="input-field col s6">
            <select id="status" name="status">
              <option value="0" disabled selected>Status</option>
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
            <input type="text" class="datepicker" id="date" name="data" value="<?=date('Y-m-d')?>">
            <label for="date">Data de Inicio</label>
          </div>
          <div class="row">
            <div class="col12">

              <center><input type="submit" class="btn waves-effect waves-light" name="action"></input></center>
            </div>
          </div>
          <div class="row">
            <div class="col12">

              <center><a href="list_rotas_todas.php" class="btn waves-effect waves-light"> Ver Todas </a></center>
            </div>
          </div>
        </div>
        </form>
      </div>
      
</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(
          function() {
            $(".button-collapse").sideNav();
            $('select').material_select();
         }
      );
</script>

</script>
</html>