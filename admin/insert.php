<?php

  include 'conexao.php';
  $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);

  //UPLOAD DA IMAGEM  
  date_default_timezone_set("Brazil/East"); //Definindo timezone padráo
  $ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); //Pegando extensão do arquivo
  $name = strtolower(substr($_FILES['fileUpload']['name'], 0, -4)); //Pegando extensão do arquivo
  $new_name = $name . '' . date("YmdHis") . $ext; //Definindo um novo nome para o arquivo
  $dir = 'img/'; // Diretório para uploads

  move_uploaded_file($_FILES['fileUpload']['tmp_name'], $dir . $new_name); // Fazer uplad do arquivo
  //END UPLOAD

  $datadenascimento = filter_input(INPUT_POST, 'datanascimento', FILTER_DEFAULT);
  $CPF = filter_input(INPUT_POST, 'CPF', FILTER_DEFAULT);
  $RG = filter_input(INPUT_POST, 'RG', FILTER_DEFAULT);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_DEFAULT);
  $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
  $password = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
  $confirmacao = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
  if ($password == $confirmacao) :

    $sth = $pdo->prepare("INSERT INTO tbl_usuario (usu_nome,usu_dt_nasc,usu_rg,usu_cpf,usu_celular,usu_img,usu_email,usu_senha)
      VALUES (:nome,:datanascimento,:rg,:cpf,:telefone,:img,:email,:senha)");

    $sth->bindValue(':nome', $nome);
    $sth->bindValue(':datanascimento', $datadenascimento);
    $sth->bindValue(':cpf', $CPF);
    $sth->bindValue(':rg', $RG);
    $sth->bindValue(':telefone', $telefone);
    $sth->bindValue(':img', $new_name);
    $sth->bindValue(':email', $email);
    $sth->bindValue(':senha', md5($password));

    $sth->execute();

    $end_usu_codigo = $pdo->lastInsertId();

    echo $usu ;
    header("Location:cadastrar2.php?end_usu_codigo=$end_usu_codigo");
   

  else :
    echo 'Erro ';
  endif;
