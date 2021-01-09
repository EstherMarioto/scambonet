<?php
include '../../admin/conexao.php';


$pro_codigo = filter_input(INPUT_GET, 'pro_codigo', FILTER_DEFAULT);
$pro_status = filter_input(INPUT_GET, 'pro_status', FILTER_DEFAULT);


$sth=$pdo->prepare("UPDATE tbl_produto SET pro_status = :status where pro_codigo = :id");

$sth->bindValue(":id", $pro_codigo);
$sth->bindValue(":status", $pro_status);

$sth->execute();
header ("LOCATION: perfil.php");

?>