<?php include("cabecalho.php"); ?>
<form class="" action="valida_login.php" method="post">
  <?php
  if(isset($_GET['erro'])){
      ?>
        <p class="alert-danger">
          Login ou senha inválidos.
        </p>
      <?php
  }
  ?>
  <table class="table">
    <tr>
      <td>E-mail: <input class="form-control" type="text" name="login"/></td>
    </tr>
    <tr>
      <td>Senha: <input class="form-control" type="password" name="senha"/></td>
    </tr>
    <tr>
      <td>
        <input type="submit" class="btn btn-primary" value="Entrar" />
        <a href="usuario_formulario.php" class="btn btn-success">Cadastrar</a>
      </td>
    </tr>
  </table>
</form>
<?php include("rodape.php"); ?>
