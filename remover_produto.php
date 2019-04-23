<?php
  include("conecta_banco.php");
    function removerProduto($conexao, $id) {
      return  mysqli_query($conexao, "DELETE FROM PRODUTO WHERE ID = {$id}");
    }

    $id = $_POST["id"];
    if(removerProduto($conexao, $id)){
      header("Location: listar_produtos.php?removeu=true");
    } else {
      header("Location: listar_produtos.php?removeu=false");
    }
?>
