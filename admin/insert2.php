<?php
    include 'conexao.php';

    $end_cid_codigo = filter_input(INPUT_POST, 'uf', FILTER_DEFAULT);
    $id = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);

    $sth = $pdo->prepare("INSERT INTO tbl_endereco (end_cid_codigo,end_usu_codigo)
    VALUES (:cidade,:id)");

    $sth->bindValue(':cidade', $end_cid_codigo);
    $sth->bindValue(':id', $id);

    $sth->execute();

    echo $pdo->lastInsertId();

    header("Location:cadastrar3.php?end_cid_codigo=$end_cid_codigo&end_usu_codigo=$id");
?>