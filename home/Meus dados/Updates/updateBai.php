<?php

include '../../../admin/conexao.php';

$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$bai = filter_input(INPUT_POST, 'bai', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_endereco SET end_bairro = :bai where end_usu_codigo = :id");

$sth->bindValue(':bai', $bai);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header("LOCATION: ../meusdados.php");
