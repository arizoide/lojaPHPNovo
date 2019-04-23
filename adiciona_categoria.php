<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>
    <?php
    function insereCategoria($conexao, $nome, $descricao){
      $query = "INSERT INTO CATEGORIA (NOME, DESCRICAO) VALUES ('{$nome}', '{$descricao}')";
      return mysqli_query($conexao, $query);
    }

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    if(insereCategoria($conexao, $nome, $descricao)){
    ?>
      <p class="alert-success">
      </br></br></br></br>
        Categoria <?php echo $nome ?> cadastrado com sucesso.
      </p>
    <?php
    } else {
      $erroCadastro = mysqli_error($conexao);
    ?>
      <p class="alert-danger">
        Ocorreu um erro ao cadastrar a categoria. Erro: <?= $erroCadastro ?>
      </p>
    <?php
    }
    mysqli_close($conexao);
    ?>


<?php include("rodape.php"); ?>
