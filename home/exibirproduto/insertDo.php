<?php

include '../../admin/conexao.php';

$pro_codigo = filter_input(INPUT_POST, 'pro_codigo', FILTER_DEFAULT);
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$statuss = filter_input(INPUT_POST, 'statuss', FILTER_DEFAULT);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_DEFAULT);
$locall = filter_input(INPUT_POST, 'locall', FILTER_DEFAULT);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);

$sth = $pdo->prepare("INSERT INTO tbl_doacao (doa_pro_codigo,doa_usu_codigo,doa_sta_codigo,doa_tip_codigo,doa_celular,doa_local,doa_mensagem)  
VALUES (:pro_codigo,:usu_codigo,:statuss,:tipo,:celular, :locall, :mensagem)");

$sth->bindValue(':pro_codigo', $pro_codigo);
$sth->bindValue(':usu_codigo', $usu_codigo);
$sth->bindValue(':statuss', $statuss);
$sth->bindValue(':tipo', $tipo);
$sth->bindValue(':celular', $celular);
$sth->bindValue(':locall', $locall);
$sth->bindValue(':mensagem', $mensagem);



$sth->execute();



header("Location:../home.php");

echo $pdo->lastInsertId();

?>