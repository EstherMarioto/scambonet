<?php
include '../../admin/conexao.php';

$id = filter_input(INPUT_GET, 'usu_codigo', FILTER_DEFAULT);

$sth = $pdo->prepare(" DELETE from tbl_usuario WHERE usu_codigo=:id");

$sth->bindValue (":id",$id,PDO::PARAM_INT);


$sth->execute();

if($sth->execute())
{
 
    echo "Contato excluido com sucesso.";
}
else
{
    echo "Por algum motivo Não foi possivel excluir esse contato.";
}
?>