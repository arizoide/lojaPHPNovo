<?php include("cabecalho.php"); ?>
    <form action="enviar_email.php" method=POST>
      <table class="table">
        <tr>
          <td>E-mail: <input type="text" class="form-control" name="email"/></td>
        </tr>
        <tr>
          <td>Assunto: <input class="form-control" name="assunto"/></td>
        </tr>
        <tr>
          <td>Comentário: <textarea class="form-control" name="comentario"></textarea></td>
        </tr>
        <tr>
          <td><input type="submit" value="Enviar" class="btn btn-primary"/></td>
        </tr>
      </table>
    </form>
<?php include("rodape.php"); ?>
