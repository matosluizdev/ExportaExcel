<?php 

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "csv";
$port = 3306;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
} catch(PDOException $err) {
    echo "Erro: Conexão com banco de dados falhou!";
    $err->getMessage();
}