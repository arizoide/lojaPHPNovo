<?php include("cabecalho.php"); ?>
    <form action="adiciona_categoria.php" method=POST>
      <table class="table">
        <tr>
          <td>Nome: <input type="text" class="form-control" name="nome"/></td>
        </tr>
        <tr>
          <td>Descrição: <textarea class="form-control" name="descricao"></textarea></td>
        </tr>
        <tr>
          <td><input type="submit" value="Cadastrar" class="btn btn-primary"/></td>
        </tr>
      </table>
    </form>
<?php include("rodape.php"); ?>
