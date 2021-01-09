<?php

include '../../../admin/conexao.php';

$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);

$sth = $pdo->prepare("UPDATE tbl_usuario SET usu_nome = :nome where usu_codigo = :id");

$sth->bindValue(":nome",  mb_convert_case($nome, MB_CASE_TITLE, "UTF-8"));
$sth->bindValue(":id", $usu_codigo);

$sth->execute();

header("LOCATION: ../meusdados.php");


?>