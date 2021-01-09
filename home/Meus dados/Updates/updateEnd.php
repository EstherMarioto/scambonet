<?php

include '../../../admin/conexao.php';

$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$ende = filter_input(INPUT_POST, 'ende', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_endereco SET end_endereco = :ende where end_usu_codigo = :id");

$sth->bindValue(':ende', $ende);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header("LOCATION: ../meusdados.php");


?>