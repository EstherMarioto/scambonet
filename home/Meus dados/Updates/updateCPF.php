<?php

include '../../../admin/conexao.php';

$CPF = filter_input(INPUT_POST, 'CPF', FILTER_DEFAULT);
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_usuario SET usu_cpf = :CPF where usu_codigo = :id");

$sth->bindValue(":CPF", $CPF);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header ("LOCATION: ../meusdados.php");


?>