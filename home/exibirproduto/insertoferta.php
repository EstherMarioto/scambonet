<?php

include '../../admin/conexao.php';

$pro_codigo = filter_input(INPUT_POST, 'pro_codigo', FILTER_DEFAULT);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
$trocarpor = filter_input(INPUT_POST, 'trocarpor', FILTER_DEFAULT);
$celular = filter_input(INPUT_POST, 'celular', FILTER_DEFAULT);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);
$ofe_usu_codigo = filter_input(INPUT_POST, 'ofe_usu_codigo', FILTER_DEFAULT);
$statuss = filter_input(INPUT_POST, 'statuss', FILTER_DEFAULT);

$sth = $pdo->prepare("INSERT INTO tbl_oferta (ofe_pro_codigo,ofe_tip_codigo,ofe_tro_pro_codigo,ofe_celular,ofe_mensagem, ofe_usu_codigo,ofe_sta_codigo)  
VALUES (:ofe_pro_codigo,:tipo,:trocarpor,:celular, :mensagem, :ofe_usu_codigo, :statuss)");

$sth->bindValue(':ofe_pro_codigo', $pro_codigo);
$sth->bindValue(':tipo', $tipo);
$sth->bindValue(':trocarpor', $trocarpor);
$sth->bindValue(':celular', $celular);
$sth->bindValue(':mensagem', $mensagem);
$sth->bindValue(':ofe_usu_codigo', $ofe_usu_codigo);
$sth->bindValue(':statuss', $statuss);
$sth->execute();



header("Location:../home.php");

echo $pdo->lastInsertId();

?>