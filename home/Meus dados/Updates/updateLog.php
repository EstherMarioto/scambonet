<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$logrador = filter_input(INPUT_POST, 'logrador', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_endereco SET end_logradouro = :logrador where end_usu_codigo = :id");

$sth->bindValue(':logrador', $logrador);
$sth->bindValue(":id", $usu_codigo);


$sth->execute();
header("LOCATION: ../meusdados.php");


?>