<html>
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/loja.css" rel="stylesheet" />
</head>
<body>

</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Minha Loja</a>
            </div>
            <?php
            session_start();
             if(isset($_SESSION['ID'])){
            ?>
            <div>
                <ul class="nav navbar-nav">
                  <div class="dropdown">
                    <button class="dropbtn">Cadastrar</button>
                    <div class="dropdown-content">
                      <a href="produto_formulario.php">Adiciona Produto</a>
                      <a href="usuario_formulario.php">Adiciona Usuário</a>
                      <a href="categoria_formulario.php">Adiciona Categoria</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <button class="dropbtn">Listagem</button>
                    <div class="dropdown-content">
                      <a href="listar_produtos.php">Produtos</a>
                      <a href="listar_categoria.php">Categorias</a>
                    </div>
                  </div>
                  <div class="dropdown">
                    <a href="sobre.php" class="dropa">Sobre</a>
                  </div>
                  <div class="dropdown">
                    <a href="logout.php" class="dropa">Sair</a>
                  </div>
                </ul>
            </div>
            <?php
          } else {
            ?>
            <div>
              <div class="navbar-header">
                  <a href="login_formulario.php" class="navbar-brand login">Login</a>
              </div>
            </div>
            <?php
          }
             ?>
        </div>
    </div>

    <div class="container">

    <div class="principal">
