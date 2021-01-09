<?php

include '../../admin/conexao.php';


$den_usu_codigo  = filter_input(INPUT_POST, 'den_usu_codigo', FILTER_DEFAULT);
$Tipodenuncia  = filter_input(INPUT_POST, 'Tipodenuncia', FILTER_DEFAULT);
$obs = filter_input(INPUT_POST, 'obs', FILTER_DEFAULT);
$den_qual = filter_input(INPUT_POST, 'den_qual', FILTER_DEFAULT);



    $sth=$pdo->prepare("INSERT INTO tbl_denuncia (den_usu_codigo,den_tip_codigo,den_observacao,den_qual) VALUES (:den_usu_codigo,:Tipodenuncia, :obs, :den_qual)");
    
    $sth->bindValue(':den_usu_codigo', $den_usu_codigo);
    $sth->bindValue(':Tipodenuncia', $Tipodenuncia);
    $sth->bindValue(':obs', $obs);
    $sth->bindValue(':den_qual', $den_qual);

 
    $sth->execute();

    header("Location:../home.php");

    echo $pdo->lastInsertId();


    ?>