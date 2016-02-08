<?php

include 'conexaoDB.php';
// Utilizei o "explode" ao invés do str_replace,
// primeiramente porque é mais fácil para tratar argumentos no GET(no caso não tratei pq não precisou no projeto)
// segundo porque quando fiz o projeto, deixei ele num direito chamado projeto1... então ficou projeto1/argumentos,
// então tive que chamar pelo array 2 do path.

function ExibirPagina() {

  $pegarURL = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  global $path;
  $path = explode("/",$pegarURL['path']);

  $conn = conexaoDB();
  $sql = "SELECT * FROM paginas WHERE pagina = :pagina";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue("pagina", $path[2]);
  $stmt->execute();

  $pagDB = $stmt->fetch(PDO::FETCH_ASSOC);

  if($path[2] == $pagDB['pagina']) {
    $RotaExiste = 1;
  } else {
    $RotaExiste = 0;
  }

  if($path[2] == "") {
    return "home.php";
  } elseif($RotaExiste == 1) {
    return $path[2] . ".php";
  } else {
    // O erro response code está no arquivo erro.php
    return "erro.php";
  }
}

?>


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
      <li class="active"><a href="home">Home</a></li>
      <li><a href="empresa">Empresa</a></li>
      <li><a href="produtos">Produtos</a></li>
      <li><a href="servicos">Serviços</a></li>
      <li><a href="contato">Contato</a></li>
    </ul>
    <h3 class="muted">Fase 1 - PHP Foundation</h3>
  </div>

  <hr>

  <div class="jumbotron">
    <?php require_once(ExibirPagina()); ?>
  </div>

  <hr>

  <?php require_once("rodape.php"); ?>
</div>

</body>
</html>