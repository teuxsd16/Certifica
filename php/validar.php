<?php
  require 'conexao.inc';

  $nome=$_POST["nome"];
  $cargaHoraria=$_POST["horario"];
  $tipo=$_POST["tipo"];
  $orgao=$_POST["orgao"];



  if (!$nome=="" && !$cargaHoraria=="" && !$tipo=="" && !$orgao==""){
    $sql = "INSERT INTO evento(nome,cargaHoraria, tipo, orgao) VALUES ('$nome', '$cargaHoraria', '$tipo', '$orgao')";
    if (mysqli_query($link, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

    header("Location: ../templates/index.php");


  mysqli_close($link);



?>
