<?php
     include "connection.php";
      session_start();
      $dat_so=  date("Y-m-d");
      $dat_at= $_POST['dat_at'];
      $endereco = $_SESSION['endereco'];
      $cod_ser = $_POST['cod_ser'];
      $descricao = $_POST['descricao'];
      $cod_local = $_SESSION['local'];
      $cidadao = $_SESSION["cpf"];
      $status_at = 'aberta';
      $insert = "insert into solic_servico (dat_so,dat_at,endereco,cod_ser,descricao,cod_local,cidadao,status_at) values ('$dat_so', '$dat_at','$endereco','$cod_ser','$descricao','$cod_local','$cidadao','$status_at')";
      $result = mysqli_query($conexao,$insert);
           
      if ($result) {
        header('Location:list_soli.php');
      }
       else{
          echo "erro";
      }
      
      mysqli_close($conexao);
?>