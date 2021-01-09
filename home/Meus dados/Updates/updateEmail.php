<?php

include '../../../admin/conexao.php';

$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);

$sth=$pdo->prepare("UPDATE tbl_usuario SET usu_email = :email where usu_codigo = :id");

$sth->bindValue(":email", $email);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();


header("Location: ../meusdados.php?usu_codigo=$usu_codigo ");


?>