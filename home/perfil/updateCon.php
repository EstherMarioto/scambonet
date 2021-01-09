<?php
include '../../admin/conexao.php';


$ofe_codigo= filter_input(INPUT_GET, 'ofe_codigo', FILTER_DEFAULT);
$statuss = filter_input(INPUT_GET, 'statuss', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_oferta SET ofe_sta_codigo = :statuss where ofe_codigo = :id");

$sth->bindValue(":id", $ofe_codigo);
$sth->bindValue(":statuss", $statuss);

$sth->execute();
header ("LOCATION: resposta.php");

?>