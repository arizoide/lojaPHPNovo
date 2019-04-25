<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>

<?php
  $produtos = mysqli_query($conexao, "SELECT p.*, c.NOME AS NOME_CATEGORIA FROM PRODUTO AS p
                                      left join CATEGORIA AS c on p.id_categoria = c.id
                                      order by p.NOME");

  if(isset($_GET['removeu'])){
    $removeu = $_GET['removeu'];
    if($removeu == "true"){
      ?>
        <p class="alert-success">
          Produto removido com sucesso.
        </p>
      <?php
    } else {
      $erroCadastro = mysqli_error($conexao);
      ?>
        <p class="alert-danger">
          Ocorreu um erro ao remover o produto. Erro: <?= $erroCadastro ?>
        </p>
      <?php
    }
  }
?>
<table class="table table-striped table-bordered">
<?php

  while($produto = mysqli_fetch_assoc($produtos)){
    ?>
      <tr>
        <td><?= $produto["NOME"]?></td>
        <td><?= $produto["PRECO"]?></td>
        <td><?= substr($produto["DESCRICAO"], 0, 15)?> ...</td>
        <td><img src="<?= $produto["IMAGEM"]?>" alt="Smiley face" height="42" width="42"/></td>
        <td>
          <?php
          if(isset($produto["NOME_CATEGORIA"])){
            echo $produto["NOME_CATEGORIA"];
          } else {
            echo "Sem Categoria";
          }
          ?>
        </td>
        <td>
          <form action="remover_produto.php" method="post">
            <input type="hidden" name="id" value="<?= $produto['ID']?>"/>
            <button class="btn btn-danger" name="remover">Remover</button>
          </form>
          <a href="produto_formulario.php?id=<?= $produto['ID']?>" class="btn btn-info">Alterar</a>
        </td>
      </tr>
    <?php
  }
?>
</table>
<?php include("rodape.php"); ?>
