<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>
    <?php
    function insereUsuario($conexao, $nome, $email, $senha){
      $query = "INSERT INTO USUARIO (NOME, EMAIL, SENHA) VALUES ('{$nome}', '{$email}', '{$senha}')";
      return mysqli_query($conexao, $query);
    }

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    if(isset($senha) && $senha != ""){
      if(insereUsuario($conexao, $nome, $email, $senha)){
      ?>
        <p class="alert-success">
        </br></br></br></br>
          Usuário cadastrado com sucesso.
        </p>
      <?php
      } else {
        $erroCadastro = mysqli_error($conexao);
      ?>
        <p class="alert-danger">
          Ocorreu um erro ao cadastrar o usuário. Erro: <?= $erroCadastro ?>
        </p>
      <?php
      }
    } else {
      ?>
        <p class="alert-danger">
          A Senha não pode ser vazia.
        </p>
      <?php
    }
    mysqli_close($conexao);
    ?>


<?php include("rodape.php"); ?>
