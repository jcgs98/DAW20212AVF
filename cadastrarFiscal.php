<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  include 'conexao.php';

  include 'funcoesValidacao.php';
  
  function validarIdDuplicado($id, $conn) {
    $sqlID = "SELECT id FROM fiscais WHERE id = $id";
    $result = $conn->query($sqlID);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;
}

 function validarSalaFiscais($sala, $conn) {
    $sqlID = "SELECT sala FROM fiscais WHERE sala = $sala";
    $result = $conn->query($sqlID);

    if ($result->num_rows < 2) {
        return 0;
    }
    return 1;
	
}

function validarSalaExiste($sala, $conn) {
    $sqlID = "SELECT sala FROM candidatos WHERE sala = $sala";
    $result = $conn->query($sqlID);

    if ($result->num_rows > 0) {
        return 0;
    }
    return 1;
	
}

  function validarCPFDuplicado($cpf, $conn) {
    $sqlCod = "SELECT cpf FROM fiscais WHERE cpf = $cpf";
    $result = $conn->query($sqlCod);

    if ($result->num_rows > 0) {
        return 1;
    }
    return 0;
  }
  
  $id = $_GET["id"];
  $cpf = $_GET["cpf"];
  $nome = $_GET["nome"];  
  $sala = $_GET["sala"];  

  $sql = 0;

  if (validarID($id) != 1 || validarNome($nome) != 1 || validarCPF($cpf) != 1 || validarSala($sala) != 1 ) {
    echo "Preencha todos os campos com valores válidos.<br><br>";  
  } elseif(validarIdDuplicado($id, $conn) == 1) {
    echo "ID já existe!<br><br>";
  } elseif(validarCPFDuplicado($cpf, $conn) == 1) {
    echo "CPF já existe!<br><br>";
	} elseif(validarSalaFiscais($sala, $conn) == 1) {
    echo "Sala Cheia!<br><br>";
	} elseif(validarSalaExiste($sala, $conn) == 1) {
    echo "Sala Não Existe!<br><br>";
  } else {
      $sql = "Insert into fiscais (`id`, `cpf`, `nome`, `sala`) VALUES ('$id', '$cpf', '$nome', '$sala')";
    }

  $result = $conn->query($sql);

  if($result) {
    echo "Fiscal $nome cadastrado com sucesso.";
  } else {
      echo "Erro ao cadastrar Fiscal.";
    } 
}

?>