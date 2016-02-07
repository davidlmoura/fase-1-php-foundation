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
      PRIMARY KEY (id));");
echo " - OK\n";

echo "Inserindo Dados";
for($x = 0; $x <= 9; $x++) {

    $pagina = "Teste {$x}";

    $smt = $conn->prepare("INSERT INTO paginas (pagina) VALUE (:pagina);");
    $smt->bindParam(":pagina",$pagina);
    $smt->execute();
}
echo " - OK\n";

echo "#### Concluído ####\n";