<?php

$port = 'localhost';
$username = 'root';
$password = 'root';
$nome_banco = 'atendimento';

$conn = new mysqli($port, $username, $password, $nome_banco);

if ($conn->connect_error) {
    die('Conexão com erro!'. $conn->connect_error);
} else{
    echo 'conexão feita com sucesso';
}



?>