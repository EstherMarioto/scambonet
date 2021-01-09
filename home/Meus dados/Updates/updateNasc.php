<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$dat= filter_input(INPUT_POST, 'dat', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_usuario SET usu_dt_nasc = :dat where usu_codigo = :id");

$sth->bindValue(':dat', $dat);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header ("LOCATION: ../meusdados.php");


?>