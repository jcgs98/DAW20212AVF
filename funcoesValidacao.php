<?php
function validarID($id){
    if (is_numeric($id)) {
      $result = 1;
    } else{
      echo "Insira uma Identidade (numérico) válida.<br><br>";
      $result = 0;
    }
      return $result;
  }

  function validarCPF($cpf){
    if (is_numeric($cpf)) {
      $result = 1;
    } else{
      echo "Insira um CPF (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }
  function validarNome($nome){
    if ($nome == "") {
      echo "Preencha com o Nome do Fiscal.<br><br>";
      return 0;
    } 
      return 1;
  }
  
  function validarSala($sala){
   if (is_numeric($sala)) {
      $result = 1;
    } else{
      echo "Insira um numéro de sala (numérico) válido.<br><br>";
      $result = 0;
    }
      return $result;
  }
  
  ?>