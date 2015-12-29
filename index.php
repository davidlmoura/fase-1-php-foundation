<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Projeto Fase 1 - PHP Foundation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Site Simples">
  <meta name="author" content="David Moura">

  <link rel="stylesheet" type="text/css" href="css/css.css">

  <?php require_once("bootstrap_files.php"); ?>

</head>

<body>

<div class="container-narrow">

  <div class="masthead">
    <ul class="nav nav-pills pull-right">
      <li class="active"><a href="?pag=home">Home</a></li>
      <li><a href="?pag=empresa">Empresa</a></li>
      <li><a href="?pag=produtos">Produtos</a></li>
      <li><a href="?pag=servicos">Serviços</a></li>
      <li><a href="?pag=contato">Contato</a></li>
    </ul>
    <h3 class="muted">Fase 1 - PHP Foundation</h3>
  </div>

  <hr>

  <div class="jumbotron">
    <?php
    if(!$_GET['pag']) {
      require_once("home.php");
    } elseif(file_exists($_GET['pag'].".php")) {
      require_once($_GET['pag'] . ".php");
    } else {
      echo "<h1>Erro 404 - Página não encontrada! =(</h1>";
    }
    ?>
  </div>

  <hr>

  <?php require_once("rodape.php"); ?>

</div>

</body>
</html>