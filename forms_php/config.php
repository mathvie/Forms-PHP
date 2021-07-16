<?php

$servidor = "localhost";
$dbname = "escola";
$usuario = "root";
$senha = "";


$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn){
    die("Conexão falhou: ".mysqli_connect_error());
}

?>
