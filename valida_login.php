<?php
  include("conecta_banco.php");
    function buscarUsuario($conexao, $email, $senha) {
      return  mysqli_query($conexao, "SELECT * FROM USUARIO WHERE EMAIL = '$email'
                                                            AND SENHA = '$senha'");
    }

    $email = $_POST["login"];
    $senha = md5($_POST["senha"]);
    $usuarios = buscarUsuario($conexao, $email, $senha);
    if(mysqli_num_rows($usuarios) > 0){
      $usuario = mysqli_fetch_assoc($usuarios);
      session_start();
      $_SESSION['USERNAME'] = $usuario['NOME'];
      $_SESSION['ID'] = $usuario['ID'];
      header("Location: index.php");
    } else {
      header("Location: login_formulario.php?erro=true");
    }
?>
