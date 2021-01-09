<?php

include '../../../admin/conexao.php';

$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_endereco SET end_cid_codigo = :cidade where end_usu_codigo = :id");

$sth->bindValue(':cidade', $cidade);
$sth->bindValue(":id", $usu_codigo);


$sth->execute();
header("LOCATION: ../meusdados.php");


?>