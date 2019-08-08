<?php
                  
  $cpf = $_POST['cpf'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $senha = $_POST['senha'];
  $cidades = $_POST['cidades'];
  $tipousuario = 3;
  $conexao = mysqli_connect("127.0.0.1","root","","rotend") or die("Não foi possível se conectar ao banco de dados");
  $cod_local = "select * from tb_cidades cid where cid.nome='$cidades'";
  $result = mysqli_query($conexao,$cod_local);
      
  $row = mysqli_fetch_array($result);
  $local = $row['id'];
    
      
  $insert = "insert into pessoa values('$nome','$cpf','$email','$endereco','$telefone','$senha',$local,'$tipousuario')";
  $exe = mysqli_query($conexao,$insert);
                  
  if($exe){
    header('Location:index.php');
  }
  else{
    echo "erro";
  }
                  
  mysqli_close($conexao);

?>
