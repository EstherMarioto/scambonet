<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_usuario SET usu_celular = :telefone where usu_codigo = :id");

$sth->bindValue(":telefone",$telefone);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header ("LOCATION: ../meusdados.php");


?>