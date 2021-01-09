<?php
include '../../admin/conexao.php';


$doa_codigo= filter_input(INPUT_GET, 'doa_codigo', FILTER_DEFAULT);

$statuss = filter_input(INPUT_GET, 'statuss', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_doacao SET doa_sta_codigo = :statuss where doa_codigo = :id");

$sth->bindValue(":id", $doa_codigo);
$sth->bindValue(":statuss", $statuss);

$sth->execute();
header ("LOCATION: resposta.php");

?>