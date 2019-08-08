<?php
  session_start();
  $cpf = $_POST['cpf'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $senha = $_POST['senha'];
  $cidades = $_POST['cidades'];
  $tipousuario = 1;
  $cpf_gerente = $_SESSION["cpf"] ;
  $conexao = mysqli_connect("127.0.0.1","root","","rotend") or die("Não foi possível se conectar ao banco de dados");
  $cod_local = "select * from tb_cidades cid where cid.nome='$cidades'";
  $result = mysqli_query($conexao,$cod_local);
  
  $row = mysqli_fetch_array($result);
  $local = $row['id'];
    
      
  $insert = "insert into pessoa values('$nome','$cpf','$email','$endereco','$telefone','$senha',$local,'$tipousuario')";
  $exe = mysqli_query($conexao,$insert);


  $in_agente = "insert into agente values('$cpf','$cpf_gerente')";
  $exe2 = mysqli_query($conexao,$in_agente);            
  

  if($exe==true && $exe2==true){
     header('Location:home_gerente.php');
  }
  else{
    echo "erro";
    echo"$in_agente";
    echo "$insert";
  }
                  
  mysqli_close($conexao);

?>
