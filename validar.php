
<?php

include 'admin/conexao.php';


session_start();

$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$novasenha = MD5($senha);

$sth = $pdo->prepare('SELECT * FROM tbl_usuario where usu_email = :email and usu_senha = :senha');
$sth->bindValue(':email', $email);
$sth->bindValue(':senha', $novasenha);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

if (($email == "scambonet@gmail.com") && ($senha == "alfredao")) {

    $_SESSION["scambo"]["email"] = $email;
    $_SESSION["scambo"]["senha"] = $senha;

    header("Location: home/adm/homeadm.php");
} else if ($sth->rowCount() > 0) {
    $_SESSION["scambo"]["email"] = $email;
    $_SESSION["scambo"]["senha"] = $senha;
    $_SESSION["scambo"]["id"] = $usu_codigo;




    header("Location: home/home.php");

} else {

    header("Location: index.php");
}

?>