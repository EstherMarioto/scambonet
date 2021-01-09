<?php


include '../../admin/conexao.php';

$pro_nome = filter_input(INPUT_POST, 'pro_nome', FILTER_DEFAULT);

//UPLOAD DA IMAGEM
date_default_timezone_set("Brazil/East");//Definindo timezone padráo
$ext = strtolower(substr($_FILES['fileUpload']['name'], -4));//Pegando extensão do arquivo
$name = strtolower(substr($_FILES['fileUpload']['name'], 0, -4));//Pegando extensão do arquivo
$new_name = $name . '' . date("YmdHis") . $ext; //Definindo um novo nome para o arquivo
$dir = 'img/'; // Diretório para uploads

move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name); // Fazer uplad do arquivo
// END UPLOAD

$categoria = filter_input(INPUT_POST, 'categoria', FILTER_DEFAULT);
$estado = filter_input(INPUT_POST, 'estado', FILTER_DEFAULT);
$material = filter_input(INPUT_POST, 'material', FILTER_DEFAULT);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_DEFAULT);
$pro_usu_codigo = filter_input(INPUT_POST, 'pro_usu_codigo', FILTER_DEFAULT);
$pro_status = filter_input(INPUT_POST, 'pro_status', FILTER_DEFAULT);

$sth = $pdo->prepare("INSERT INTO tbl_produto (pro_nome,pro_cat_codigo,pro_est_codigo,pro_material,pro_descricao,pro_usu_codigo,pro_status,pro_img)
 VALUES (:pro_nome, :pro_cat_codigo,:pro_est_codigo,:pro_material,:pro_descricao,:pro_usu_codigo,:pro_status,:pro_img)");

$sth->bindValue(':pro_nome', $pro_nome);
$sth->bindValue(':pro_cat_codigo', $categoria);
$sth->bindValue(':pro_est_codigo', $estado);
$sth->bindValue(':pro_material', $material);
$sth->bindValue(':pro_descricao', $descricao);
$sth->bindValue(':pro_usu_codigo', $pro_usu_codigo);
$sth->bindValue(':pro_status', $pro_status);
$sth->bindValue(':pro_img', $new_name);

$sth->execute();

header("Location:../home.php");

echo $pdo->lastInsertId();



?>