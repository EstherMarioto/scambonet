<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$RG = filter_input(INPUT_POST, 'RG', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_usuario SET usu_rg = :RG where usu_codigo = :id");

$sth->bindValue(':RG', $RG);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header ("LOCATION: ../meusdados.php");


?>