<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'conexao.php';

    function validarcpf($cpf){
      if (is_numeric($cpf)) {
        $result = 1;
      } else{
        echo "Insira um CPF (numérico) válido.<br><br>";
        $result = 0;
      }
        return $result;
    }
    function validarcpfExistente($cpf, $conn) {
      $sqlCod = "SELECT cpf FROM candidatos WHERE cpf = $cpf";
      $result = $conn->query($sqlCod);
  
      if ($result->num_rows > 0) {
          return 1;
      }
      return 0;
    }

    $cpf = $_GET["cpf"];
    $sql = 0;
  
    if(validarcpf($cpf) === 1 && validarcpfExistente($cpf, $conn) === 1) {
      $sql = "SELECT * FROM candidatos WHERE cpf=$cpf";

      $result = $conn->query($sql);

      if($result) {
        $candidato = $result->fetch_assoc();
        $id = $candidato["id"];
        $nome = $candidato["nome"];
        $email = $candidato["email"];
        $cargo = $candidato["cargo"];
        $sala = $candidato["sala"];        
        
        $alterar = "./alterarcandidato.html?id={$id}" . "&cpf=${cpf}" . "&nome=${nome}" . "&email=${email}" . "&cargo=${cargo}" . "&sala=${sala}" ;
            
        if ($candidato["id"] != 0) {
          echo "<table>";          
          echo "<thead>";
          echo "<tr>";
          echo "<th>CPF</th><th>Nome</th><th>Cargo</th><th>E-mail</th><th>Sala</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tr>";
          echo "<td>{$cpf}</td>";
          echo "<td>{$nome}</td>";
          echo "<td>{$cargo}</td>";
          echo "<td>{$email}</td>";
          echo "<td>{$sala}</td>";
          echo "<td><span class='table'><a href=\"{$alterar}\"><button>Alterar</button></a></span></td>";
          echo "</tr>"; 
          echo "</table>";   
        } 
      } else {
          echo "Erro ao buscar candidato.";
        }
    } else {
        echo "Candidato Inexistente.";
      }
}
?>