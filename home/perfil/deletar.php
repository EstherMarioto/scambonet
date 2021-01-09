<?php
include '../../admin/conexao.php';

$id = filter_input(INPUT_GET, 'ofe_codigo', FILTER_DEFAULT);


$sth = $pdo->prepare("DELETE from tbl_oferta  where ofe_codigo = :id");

$sth->bindValue(":id", $id, PDO::PARAM_INT);


$sth->execute();

$idd = filter_input(INPUT_GET, 'res_codigo', FILTER_DEFAULT);

$sth = $pdo->prepare("DELETE from tbl_resposta  where res_codigo = :idd");

$sth->bindValue(":idd", $idd, PDO::PARAM_INT);

$sth->execute();

header ("LOCATION: resposta.php");