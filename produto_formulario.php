<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>
<?php
if(isset($_GET["id"])){
  $id = $_GET["id"];

  $produtos = mysqli_query($conexao, "SELECT * FROM PRODUTO WHERE ID={$id}");

  $produto = mysqli_fetch_assoc($produtos);
}

?>
    <form enctype="multipart/form-data" action="adiciona_produto.php" method=POST>
      <table class="table">
        <input type="hidden" value="<?php
        if(isset($_GET["id"])) {
          echo $produto["ID"];
        }?>" name="id"/>
        <tr>
          <td>Nome: <input type="text" class="form-control" name="nome" value="<?php if(isset($_GET["id"])) {echo $produto['NOME'];}?>"/></td>
        </tr>
        <tr>
          <td>Preço: <input type="number" class="form-control" name="preco" value="<?php if(isset($_GET["id"])) {echo $produto['PRECO'];}?>"/></td>
        </tr>
        <tr>
          <td>Descrição: <textarea class="form-control" name="descricao"><?php if(isset($_GET["id"])) {echo $produto['DESCRICAO'];}?></textarea></td>
        </tr>
        <tr>
          <input type="hidden" name="imagemAntiga" value="<?php if(isset($_GET["id"])) {echo $produto['IMAGEM'];}?>" />
          <td>Imagem: <input name="arquivo" class="form-control" type="file"/></td>
        </tr>
        <tr>
          <td>
            <select class="form-control" name="categoria">
              <option value="0">Selecione uma categoria</option>
              <?php
                $categorias = mysqli_query($conexao, "SELECT * FROM CATEGORIA");

                while($categoria = mysqli_fetch_assoc($categorias)){
                $selecao = $produto['ID_CATEGORIA'] == $categoria['ID'] ? "selected='selected'" : "";
              ?>
                  <option value="<?= $categoria['ID'] ?>" <?=$selecao?>><?= $categoria['NOME'] ?></option>
              <?php
                }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <?php if(isset($produto['ID'])) {
            echo '<td><input type="submit" value="Alterar" class="btn btn-primary"/></td>';
          } else {
            echo '<td><input type="submit" value="Cadastrar" class="btn btn-primary"/></td>';
          } ?>
        </tr>
      </table>

    </form>
<?php include("rodape.php"); ?>
