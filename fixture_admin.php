<?php

require_once "conexaoDB.php";

echo "#### Executando Fixture ####\n";

$conn = conexaoDB();

echo "Removendo Tabela";
$conn->query("DROP TABLE IF EXISTS admin;");
echo " - OK\n";

echo "Criando Tabela";
$conn->query("CREATE TABLE admin (
      id INT NOT NULL AUTO_INCREMENT,
      usuario VARCHAR(255) CHARACTER SET 'utf8' NULL,
      senha VARCHAR(255) CHARACTER SET 'utf8' NULL,
      PRIMARY KEY (id));");
echo " - OK\n";

echo "Inserindo Dados";

    $usuario = "admin";
    $senha = password_hash("admin", PASSWORD_DEFAULT);
    $smt = $conn->prepare("INSERT INTO admin (usuario, senha) VALUE (:usuario,:senha);");
    $smt->bindParam(":usuario",$usuario);
    $smt->bindParam(":senha",$senha);
    $smt->execute();

echo " - OK\n";

echo "#### Concluido ####\n";