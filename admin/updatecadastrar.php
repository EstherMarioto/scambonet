<?php
    include 'conexao.php';

    $log = filter_input(INPUT_POST, 'log', FILTER_DEFAULT);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_DEFAULT);
    $n = filter_input(INPUT_POST, 'n', FILTER_DEFAULT);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_DEFAULT);
    $usu_cid_codigo = filter_input(INPUT_POST, 'cidade', FILTER_DEFAULT);
    $id = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
    $complemento =filter_input(INPUT_POST, 'logrador', FILTER_DEFAULT);
    
    $sth = $pdo->prepare("UPDATE tbl_endereco SET end_endereco = :endereco ,end_logradouro = :logrador ,end_numero = :numero,end_bairro = :bairro,end_cid_codigo = :cidade , end_complemento = :complemento where end_usu_codigo = :id");

    $sth->bindValue(':endereco', $endereco);
    $sth->bindValue(':logrador', $log);
    $sth->bindValue(':cidade', $usu_cid_codigo);
    $sth->bindValue('numero', $n);
    $sth->bindValue(':complemento', $complemento);
    $sth->bindValue(':bairro', $bairro);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->execute();

    echo $pdo->lastInsertId();

    header("Location:../index.php?");
?>