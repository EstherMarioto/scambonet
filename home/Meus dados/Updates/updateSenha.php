<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$novasenha = MD5($senha);
$sth = $pdo->prepare("UPDATE tbl_usuario SET usu_senha = :senha where usu_codigo = :id");

$sth->bindValue(':senha', $novasenha);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header("LOCATION: ../meusdados.php");


?>