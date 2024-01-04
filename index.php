<?php 
session_start();

include_once("conexao.php");

echo "<h1>Gerar csv com PHP</h1>";
echo "<a href='gerar_excel.php'>Gerar Excel<br><br><br></a>";

if(isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

$qry = "SELECT id, nome, email, endereco FROM usuarios ORDER BY id DESC";
$rs = $conn->prepare($qry);
$rs->execute();

if(($rs) and ($rs->rowCount() != 0)){
    while($usuario = $rs->fetch(PDO::FETCH_ASSOC)){
        // var_dump($usuario);
        extract($usuario);
        echo "ID: $id <br>";
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Endereço: $endereco <br>";
        echo "<hr>";
    };
} else {
    echo "Nenhum resultado encontrado!";
}