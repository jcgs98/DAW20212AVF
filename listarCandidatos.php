<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'conexao.php';
    
      $sql = "SELECT * FROM candidatos WHERE 1=1";

      $result = $conn->query($sql);

      if($result) {
        $candidato = $result->fetch_assoc();
        $cpf = $candidato["cpf"];
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
        echo "Candidatos Inexistentes.";
      }
?>