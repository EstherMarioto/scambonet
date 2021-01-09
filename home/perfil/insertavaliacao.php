<?php

include '../../admin/conexao.php';

$pro_codigo = filter_input(INPUT_POST, 'pro_codigo', FILTER_DEFAULT);
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$usu_avaliacao = filter_input(INPUT_POST, 'usu_avaliacao', FILTER_DEFAULT);

$sth=$pdo->prepare("INSERT INTO tbl_nota (not_usu_codigo,not_ava_codigo)  VALUES (:usu_codigo, :usu_avaliacao)");

$sth->bindValue(':usu_codigo', $usu_codigo);
$sth->bindValue(':usu_avaliacao', $usu_avaliacao);


$sth->execute();

header("Location:perfilVer.php?pro_codigo=$pro_codigo ");

echo $pdo->lastInsertId();
