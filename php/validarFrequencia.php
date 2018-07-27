<?php
  require 'conexao.inc';

  $nomeCompleto=$_POST["nome"];
  $email=$_POST["email"];



  if (!$nomeCompleto=="" && !$email==""){
    $sql = "INSERT INTO lista(nome,email) VALUES ('$nomeCompleto', '$email')";
    if (mysqli_query($link, $sql)) {
          echo "New record created successfully";
    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

    header("Location: ../templates/lista.php");


  mysqli_close($link);



?>
