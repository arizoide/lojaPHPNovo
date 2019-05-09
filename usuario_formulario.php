<?php include("cabecalho.php"); ?>
<?php include("conecta_banco.php"); ?>
<form action="adiciona_usuario.php" method="POST">
  <table class="table">
    <tr>
      <td>Nome: <input type="text" class="form-control" name="nome"/></td>
    </tr>
    <tr>
      <td>E-mail: <input type="text" class="form-control" name="email"/></td>
    </tr>
    <tr>
      <td>Senha:  <input type="password" class="form-control" name="senha"/></td>
    </tr>
    <?php
      if(isset($_SESSION['PERFIL']) && $_SESSION['PERFIL'] == "ADMIN"){
      ?>
    <tr>
      <td>
        <select class="form-control" name="perfil">
          <option value="CLIENTE">SELECIONE UM PERFIL</option>
          <option value="ADMIN">ADMIN</option>
          <option value="CLIENTE">CLIENTE</option>
        </select>
      </td>
    </tr>
    <?php
  } else {
    echo "<input type='hidden' name='perfil' value='CLIENTE' />";
  }
     ?>
    <tr>
      <td><input type="submit" value="Cadastrar" class="btn btn-primary"/></td>
    </tr>
  </table>
</form>
<?php include("rodape.php"); ?>
