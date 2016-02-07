<?php

require_once "conexaoDB.php";

echo "#### Executando Fixture ####\n";

$conn = conexaoDB();

echo "Removendo Tabela";
$conn->query("DROP TABLE IF EXISTS paginas;");
echo " - OK\n";

echo "Criando Tabela";
$conn->query("CREATE TABLE paginas (
      id INT NOT NULL AUTO_INCREMENT,
      pagina VARCHAR(255) CHARACTER SET 'utf8' NULL,
      conteudo VARCHAR(255) CHARACTER SET 'utf8' NULL,
      PRIMARY KEY (id));");
echo " - OK\n";

echo "Inserindo Dados";

$PaginasPossiveis = ['home','empresa','produtos','servicos','contato'];

$i = 0;
foreach($PaginasPossiveis as $Possiveis) {

    $conteudo = "Teste {$i}";
    $pagina = $Possiveis[$i];

    $smt = $conn->prepare("INSERT INTO paginas (pagina, conteudo) VALUE (:pagina,:conteudo);");
    $smt->bindParam(":pagina",$pagina);
    $smt->bindParam(":conteudo",$conteudo);
    $smt->execute();

    $i++;
}
echo " - OK\n";

echo "#### Concluido ####\n";