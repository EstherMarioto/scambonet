<?php

include '../../../admin/conexao.php';
$usu_codigo = filter_input(INPUT_POST, 'usu_codigo', FILTER_DEFAULT);
//UPLOAD DA IMAGEM
date_default_timezone_set("Brazil/East") ;//Definindo timezone padráo
$ext = strtolower(substr($_FILES['fileUpload']['name'],-4));//Pegando extensão do arquivo
$name = strtolower(substr($_FILES['fileUpload']['name'],0,-4));//Pegando extensão do arquivo
$new_name = $name.''.date("YmdHis"). $ext; //Definindo um novo nome para o arquivo
$dir = '../../../admin/img/'; // Diretório para uploads

move_uploaded_file($_FILES['fileUpload']['tmp_name'],$dir . $new_name); // Fazer uplad do arquivo
// END UPLOAD

$sth=$pdo->prepare("UPDATE tbl_usuario SET usu_img = :img where usu_codigo = :id");

$sth->bindValue(':img', $new_name);
$sth->bindValue(":id", $usu_codigo);

$sth->execute();
header ("LOCATION: ../meusdados.php");


?>