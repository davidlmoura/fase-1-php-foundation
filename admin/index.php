<?php

include 'conexaoDB.php';
// Utilizei o "explode" ao invés do str_replace,
// primeiramente porque é mais fácil para tratar argumentos no GET(no caso não tratei pq não precisou no projeto)
// segundo porque quando fiz o projeto, deixei ele num direito chamado projeto1... então ficou projeto1/argumentos,
// então tive que chamar pelo array 2 do path.

function ExibirPagina() {

  $conn = conexaoDB();

  $pegarURL = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  global $path;
  $path = explode("/",$pegarURL['path']);

  $nomePagina = $path[3];

  if($nomePagina == "") {
    $nomePagina = "home";
  } elseif($nomePagina == "busca") {
    $conteudoBusca = $_POST['busca'];
    $sqlBusca = "SELECT * FROM paginas WHERE conteudo LIKE :conteudo";
    $stmtBusca = $conn->prepare($sqlBusca);
    $stmtBusca->bindValue(':conteudo', '%'.$conteudoBusca.'%', PDO::PARAM_STR);
    $stmtBusca->execute();
    $conteudoBusca = $stmtBusca->fetchAll(PDO::FETCH_ASSOC);
    $somarConteudo = $stmtBusca->rowCount()." Páginas encontradas! <br />";
    foreach ($conteudoBusca as $busca) {
      $somarConteudo .= "Página: <a href='".$busca['pagina']."'>".$busca['pagina']."</a><br />";
    }

  } else {
    $sql = "SELECT id FROM paginas WHERE pagina = :pagina";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue("pagina", $path[3]);
    $stmt->execute();
    if($stmt->rowCount() == 0) {
      $nomePagina = "erro";
    } else {
      // Fica com o valor do path[2]
    }
  }

  $sqlCont = "SELECT * FROM paginas WHERE pagina = :pagina";
  $stmtCont = $conn->prepare($sqlCont);
  $stmtCont->bindValue("pagina", $nomePagina);
  $stmtCont->execute();
  $conteudo = $stmtCont->fetch(PDO::FETCH_ASSOC);

  if($nomePagina == "busca") {
    echo $somarConteudo;
  } else {
    return $conteudo['conteudo'];
  }


}

function EditarConteudo() {

  $conn = conexaoDB();

  $pegarURL = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  global $path;
  $path = explode("/",$pegarURL['path']);

  $conteudo = $_POST['conteudo'];
  $sqlEdi = "UPDATE paginas SET conteudo = :conteudo WHERE pagina = :pagina";
  $stmtEdi = $conn->prepare($sqlEdi);
  $stmtEdi->bindValue("pagina", $path[3]);
  $stmtEdi->bindValue("conteudo", $conteudo);
  $stmtEdi->execute();

    return "<h1>Dados alterados!</h1>";


}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
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
      <li><a href="home">Home</a></li>
      <li><a href="empresa">Empresa</a></li>
      <li><a href="produtos">Produtos</a></li>
      <li><a href="servicos">Serviços</a></li>
      <li><a href="contato">Contato</a></li>
    </ul>
    <h3 class="muted">Área Administrativa</h3>
  </div>

  <hr>

  <div class="jumbotron">
   <? include_once("contato.php"); ?>
  </div>

  <hr>

  <?php require_once("rodape.php"); ?>
</div>

</body>
</html>