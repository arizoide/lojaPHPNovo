<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>

<?php
  if(isset($_GET["pesquisa"]) && $_GET["pesquisa"] != ""){
    $pesquisa = $_GET["pesquisa"];
    $categorias = mysqli_query($conexao, "SELECT * FROM CATEGORIA AS c
                                      WHERE c.NOME LIKE '%".$pesquisa."%'
                                      AND c.FLG_ACTIVE = 1
                                      order by c.NOME");
  } else {
    $categorias = mysqli_query($conexao, "SELECT * FROM CATEGORIA AS c
                                      where c.FLG_ACTIVE = 1
                                      order by c.NOME");
  }

  if(isset($_GET['removeu'])){
    $removeu = $_GET['removeu'];
    if($removeu == "true"){
      ?>
        <p class="alert-success">
          Categoria removido com sucesso.
        </p>
      <?php
    } else {
      $erroCadastro = mysqli_error($conexao);
      ?>
        <p class="alert-danger">
          Ocorreu um erro ao remover a categoria. Erro: <?= $erroCadastro ?>
        </p>
      <?php
    }
  }
?>

<form action="listar_categoria.php" method="GET">
  </br></br>
  <input class="form-control" type="search" name="pesquisa" placeholder="Digite sua pesquisa aqui:"/>
  </br>
  <input type="submit" class="btn btn-primary" value="buscar" />
</form>

<table class="table table-striped table-bordered">
<?php

  while($categoria = mysqli_fetch_assoc($categorias)){
    ?>
      <tr>
        <td><?= $categoria["NOME"]?></td>
        <td><?= substr($categoria["DESCRICAO"], 0, 15)?> ...</td>
        <td>
          <form action="remover_categoria.php" method="post">
            <input type="hidden" name="id" value="<?= $categoria['ID']?>"/>
            <button class="btn btn-danger" name="remover">Remover</button>
          </form>
        </td>
      </tr>
    <?php
  }
?>
</table>
<?php include("rodape.php"); ?>
