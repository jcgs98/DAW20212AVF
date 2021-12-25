<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include 'conexao.php';


$result = mysqli_query($conn,"SELECT * FROM candidatos WHERE 1=1 order by sala,nome desc");
    
      
echo "<table>";          
          echo "<thead>";
          echo "<tr>";
          echo "<th>CPF</th><th>Nome</th><th>Cargo</th><th>E-mail</th><th>Sala</th>";
          echo "</tr>";
          echo "</thead>";

      if($result) {
        
          
          echo "<tr>";
		  while($row = mysqli_fetch_array($result)){
			echo "<tr>";
          echo "<td>".$row['cpf']."</td>";
          echo "<td>".$row['nome']."</td>";
          echo "<td>".$row['cargo']."</td>";
          echo "<td>".$row['email']."</td>";
          echo "<td>".$row['sala']."</td><br>";
		  echo "</tr>";
          }
          echo "</tr>"; 
          echo "</table>";   
	  }
	  
}
?>