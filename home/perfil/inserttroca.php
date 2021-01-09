<?php

include '../../admin/conexao.php';


$locall = filter_input(INPUT_POST, 'locall', FILTER_DEFAULT);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_DEFAULT);
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$ofe_codigo = filter_input(INPUT_POST, 'ofe_codigo', FILTER_DEFAULT);
$doa_codigo = filter_input(INPUT_POST, 'doa_codigo', FILTER_DEFAULT);

$sth = $pdo->prepare("INSERT INTO tbl_resposta (res_local,res_mensagem,res_usu_codigo,res_celular,res_ofe_codigo,res_doa_codigo)  
VALUES (:locall,:mensagem,:usu_codigo,:celular,:ofe_codigo, :doa_codigo)");


$sth->bindValue(':locall', $locall);
$sth->bindValue(':ofe_codigo', $ofe_codigo);
$sth->bindValue(':doa_codigo', $doa_codigo);
$sth->bindValue(':mensagem', $mensagem);
$sth->bindValue(':usu_codigo', $usu_codigo);
$sth->bindValue(':celular', $celular);
$sth->execute();



header("Location:solicitacao.php");

echo $pdo->lastInsertId();

?>