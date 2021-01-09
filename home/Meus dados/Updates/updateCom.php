<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$com = filter_input(INPUT_POST, 'com', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_endereco SET end_complemento = :com where usu_codigo = :id");

$sth->bindValue(':com', $com);
$sth->bindValue(":id", $usu_codigo);


$sth->execute();
header("LOCATION: ../meusdados.php");


?>