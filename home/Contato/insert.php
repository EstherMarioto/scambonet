<?php

include '../../admin/conexao.php';

$con_usu_codigo = filter_input(INPUT_POST, 'con_usu_codigo', FILTER_DEFAULT);
$assunto = filter_input(INPUT_POST, 'assunto', FILTER_DEFAULT);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);

    $sth=$pdo->prepare("INSERT INTO tbl_contato (con_usu_codigo,con_assunto,con_mensagem) VALUES (:con_usu_codigo, :assunto, :mensagem)");
    
    $sth->bindValue(':con_usu_codigo', $con_usu_codigo);
    $sth->bindValue(':assunto', $assunto);
    $sth->bindValue(':mensagem', $mensagem);
    
    $sth->execute();

    header("Location:../home.php");

    echo $pdo->lastInsertId();

    ?>
   