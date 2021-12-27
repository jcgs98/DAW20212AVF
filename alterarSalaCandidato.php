<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';

  $id = $_GET["id"];
  $cpf = $_GET["cpf"];
  $nome = $_GET["nome"];
  $email = $_GET["email"];
  $sala = $_GET["sala"];
  $salaN = $_GET["salaN"];
  

$sq2 = "SELECT `sala` FROM candidatos WHERE `sala`=$salaN"; 
$result2 = $conn->query($sq2);

if($result2 ->num_rows > 0) {
    echo "Sala Existe.";
		if($result2 ->num_rows > 49) {
			echo "Sala Cheia, tente outra.";
		} else {
		
	$sql = "UPDATE candidatos SET `sala`='$salaN' WHERE `id`=$id";
	
	$result = $conn->query($sql);
	
	if($result) {
		echo "Sala do candidato $nome alterada com sucesso para $salaN.";
	  } else {
		  echo "Erro ao alterar sala.";
		}
		}
}
else {
echo "Sala Não Existe. Tente Outra!";}
}

?>