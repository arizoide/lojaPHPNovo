<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>
    <?php
    function insereProduto($conexao, $nome, $preco, $destino, $descricao, $categoria){
      $query = "INSERT INTO PRODUTO (NOME, PRECO, IMAGEM, DESCRICAO, ID_CATEGORIA) VALUES ('{$nome}', {$preco}, '{$destino}', '{$descricao}', {$categoria})";
      return mysqli_query($conexao, $query);
    }

    function alteraProduto($conexao, $id, $nome, $preco, $destino, $descricao, $categoria){
      $query = "UPDATE PRODUTO SET NOME = '{$nome}', PRECO={$preco}, IMAGEM='{$destino}', DESCRICAO='{$descricao}', ID_CATEGORIA={$categoria} WHERE ID={$id}";
      return mysqli_query($conexao, $query);
    }

    if(isset($_POST["id"]) && $_POST["id"] != "") {
      $id = $_POST["id"];
    }

    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $categoria = $_POST["categoria"];
    $destino = 'img/' . $_FILES['arquivo']['name'];
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];

    move_uploaded_file($arquivo_tmp, $destino);
    if(isset($_POST["id"]) && $_POST["id"] != "") {
      if(alteraProduto($conexao, $id, $nome, $preco, $destino, $descricao, $categoria)){
      ?>
        <p class="alert-success">
        </br></br></br></br>
          Produto <?php echo $nome ?>, preço <?php echo $preco ?> reais alterado com sucesso.
        </p>
      <?php
      } else {
        $erroCadastro = mysqli_error($conexao);
      ?>
        <p class="alert-danger">
          Ocorreu um erro ao alterar o produto. Erro: <?= $erroCadastro ?>
        </p>
      <?php
      }
    } else {
      if(insereProduto($conexao, $nome, $preco, $destino, $descricao, $categoria)){
      ?>
        <p class="alert-success">
        </br></br></br></br>
          Produto <?php echo $nome ?>, preço <?php echo $preco ?> reais cadastrado com sucesso.
        </p>
      <?php
      } else {
        $erroCadastro = mysqli_error($conexao);
      ?>
        <p class="alert-danger">
          Ocorreu um erro ao cadastrar o produto. Erro: <?= $erroCadastro ?>
        </p>
      <?php
      }
    }

    mysqli_close($conexao);
    ?>


<?php include("rodape.php"); ?>
