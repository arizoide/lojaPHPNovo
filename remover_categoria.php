<?php
  include("conecta_banco.php");
    function removerCategoria($conexao, $id) {
      return  mysqli_query($conexao, "UPDATE CATEGORIA SET FLG_ACTIVE = 0 WHERE ID = {$id}");
    }

    $id = $_POST["id"];
    if(removerCategoria($conexao, $id)){
      header("Location: listar_categoria.php?removeu=true");
    } else {
      header("Location: listar_categoria.php?removeu=false");
    }
?>
