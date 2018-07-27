<?php
$link = mysqli_connect("localhost","root", null, "certificado");

if (!$link) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    exit;
}

?>
