<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$num = filter_input(INPUT_POST, 'num', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_endereco SET end_numero = :num where end_usu_codigo = :id");

$sth->bindValue(':num', $num);
$sth->bindValue(":id", $usu_codigo);


$sth->execute();
header("LOCATION: ../meusdados.php");


?>