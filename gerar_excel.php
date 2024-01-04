<?php 
session_start();
ob_start();

include_once("conexao.php");

$qry = "SELECT id, nome, email, endereco FROM usuarios ORDER BY id DESC";
$rs = $conn->prepare($qry);
$rs->execute();

if(($rs) and ($rs->rowCount() != 0)){

    header('Content-Type: text/csv; charset=UTF-8');

    header('Content-Disposition: attachment; filename='. date('d-m-Y') . '.csv');

    $resultado = fopen("php://output", 'w');
    
    $colunas = ['id', 'Nome', 'E-mail', mb_convert_encoding('Endereço', 'ISO-8859-1', 'UTF-8')];

    fputcsv($resultado, $colunas, ';');

    while($usuario = $rs->fetch(PDO::FETCH_ASSOC)){
        fputcsv($resultado, mb_convert_encoding($usuario, 'ISO-8859-1', 'UTF-8'), ';');   
    }

    fclose($resultado);
} else {
    $_SESSION['msg'] =  "Nenhum resultado encontrado!<br><br><br>";
    header("Location:index.php");
}