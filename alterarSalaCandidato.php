<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';

  $id = $_GET["id"];
  $cpf = $_GET["cpf"];
  $nome = $_GET["nome"];
  $email = $_GET["email"];
  $sala = $_GET["sala"];
  $salaN = $_GET["salaN"];
  
  
 $sql = "UPDATE candidatos SET `sala`='$salaN' WHERE `id`=$id";
  

  $result = $conn->query($sql);

  if($result) {
    echo "Sala do candidato $nome alterada com sucesso para $salaN.";
  } else {
      echo "Erro ao alterar sala.";
    }  
}
?>