<!DOCTYPE html>
<?php
session_start();

include '../../admin/conexao.php';
$sth = $pdo->prepare('select *from tbl_oferta o 
INNER JOIN tbl_usuario u on o.ofe_usu_codigo = u.usu_codigo
INNER JOIN tbl_tip_envia t on o ofe_tip_codigo = t.tip_codigo
INNER JOIN tbl_produto p on o ofe_pro_codigo = p.pro_codigo
');

?>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ScamboNet</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
  <script src="main.js"></script>
  <link rel="icon" alt="logo do scamboNet" href="img/log.png">
</head>

<body>
  <!-- nav bar -->
  <nav class="nav-extended">
    <div class="red accent-3">
      <div class="nav-wrapper">
        <div class="row">
          <div class="col s1 m1 offset-m0">
           
            <a href="../home.php" class="brand-logo">ScamboNet</a>
          </div>
          <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <ul id="dropdown1" class="dropdown-content">
              <li><a href="perfil.php">Perfil</a></li>
              <li><a href="../Meus dados/meusdados.php">Meus dados</a></li>
              <li><a href="solicitacao.php">Notificações</a></li>
              <li class="divider"></li>
              <li><a href="../sair.php">Sair</a></li>
            </ul>
            <li><a href="../categorias.php">Produtos </a></li>
            <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src="img/icoon.png" class="responsive"></i></a></li>
        </div>

        <div class="nav-content">
          <ul class="tabs tabs-transparent">
            <li class="tab"><a href="../site/ComFunc.php">Como funciona</a></li>
            <li class="tab "><a href="../site/seguranca.php">Segurança</a></li>
            <li class="tab"><a href="../Contato/contato.php">Contato</a></li>
            <li class="tab white"><a href="../addProduto/addProduto.php"><span class=" black-text"><b>Adicionar Produto</b></span></a></li>
          </ul>
        </div>
      </div>
  </nav>

  <ul class="sidenav red accent-3" id="mobile-demo">
    <div class="col s1 m1 offset-m2">
      <center> <a href="../home.php"><img src="img/log.png" class="responsive"></a></center>
 </div>

    <li> <a href="../categorias.php"><span class=white-text> Produtos </span></a></li>
    <li class="divider white"></li>
    <li><a href="perfil.php"><span class=white-text> Perfil </span></a></li>
    <li><a href="solicitacao.php"><span class=white-text>Notificações </span></a></li>
    <li><a href="../Meus dados/meusdados.php"><span class=white-text>Meus dados</span></a></li>
    <li> <a href="../SobreNos/sobrenos.php"><span class=white-text>Sobre Nos </span></a></li>
    <li class="divider white"></li>
    <li><a href="../sair.php"><span class=white-text>Sair</span></a></li>
    
  </ul>
  <br />
  <div class="row">
    <div class="col s12">
      <ul class="tabs indigo lighten-5 ">
        <li class="tab col s4"><a href="solicitacao.php"><span class=" black-text "><b>Ofertas</b></span></a></li>
        <li class="tab col s4"><a href="doacao.php"><span class=" black-text "><b>Ofertas Doações</b></span></a></li>
        <li class="tab col s4"><a href="enviado.php"><span class=" black-text "><b>Enviados</b></span></a></li>

      </ul>
    </div>
    <br />
    <br />
    <div class="row">
      <div class="col s12">
        <ul class="tabs indigo lighten-5 ">
          <li class="tab col s6"><a href="resposta.php"><span class=" black-text "><b>Respostas</b></span></a></li>
          <li class="tab col s6"><a href="confirmado.php"><span class=" black-text "><b>Confirmados</b></span></a></li>

        </ul>
      </div>


      <center><span class=" black-text text-">
          <h3> Trocas </h3>
        </span></center>

      <?php

      $sth = $pdo->prepare('select *from tbl_oferta o 
              INNER JOIN tbl_produto p on p.pro_codigo = o.ofe_pro_codigo
              INNER JOIN tbl_tip_envia t on t.tip_codigo = o.ofe_tip_codigo
              INNER JOIN tbl_usuario u on u.usu_codigo = o.ofe_usu_codigo
              WHERE p.pro_usu_codigo = :usuario and o.ofe_sta_codigo = :sta
              ');
      $sth->bindValue(':usuario', $_SESSION['scambo']['id']);
      $sth->bindValue(':sta', 2);
      $sth->execute();
      if ($sth->rowCount() > 0) :
        foreach ($sth as $res) :
          extract($res);
          $produto_oferecido = $ofe_tro_pro_codigo;

          ?>

          <div class="container">
            <ul class="collection">
              <li class="collection-item avatar ">
                <img src="img/icoon.png" alt="foto de perfil" class="circle responsive-img">

                <p> Nome: <?php
                              echo $usu_nome;
                              ?>

                </p>
                <p> Celular: <?php
                                  echo $ofe_celular;
                                  ?>
                </p>
                <br>
                <p>Produto: <?php
                                echo $pro_nome;
                                ?>
                </p>

                <p> Troca por : <?php
                                    $sth2 = $pdo->prepare('select pro_nome as produto_ofer from tbl_produto where pro_codigo = :codigo ');
                                    $sth2->bindValue(':codigo', $produto_oferecido);
                                    $sth2->execute();
                                    $resultado2 = $sth2->fetch(PDO::FETCH_ASSOC);
                                    extract($resultado2);
                                    echo  $produto_ofer;
                                    ?>
                </p>

                <p>Tipo de envio :
                  <?php

                      echo $tip_nome;
                      ?>
                </p>

                <p>Local ou endereço de envio :
                  <?php
                      $sth = $pdo->prepare("select *from tbl_resposta where res_ofe_codigo = :ofe");
                      $sth->bindValue(':ofe', $ofe_codigo);
                      $sth->execute();
                      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                      extract($resultado);

                      echo $res_local;

                      ?>
                </p>


                <div class="right">
                  <h5>
                    <?php
                        $sth = $pdo->prepare('
select *from tbl_oferta o 
INNER JOIN tbl_stacon s on o.ofe_sta_codigo = s.sta_codigo
where o.ofe_codigo = :ofe_codigo  ');

                        $sth->bindValue(':ofe_codigo', $ofe_codigo);

                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                        echo $sta_nome;
                        ?>
                  </h5>
                </div>

              </li>
            </ul>
          </div>
      <?php
        endforeach;

      else :
        echo ' <center> <img src="../img/o.gif" class="circle responsive-img">
<p><h5>Nenhuma oferta no momento</h5></p>
</center> ';
      endif;
      ?>
      <br />
      <li class="divider black"></li>
      <center><span class=" black-text text-">
          <h3> Doações </h3>
        </span></center>

      <?php

      $sth = $pdo->prepare('select *from tbl_doacao d 
              INNER JOIN tbl_produto p on p.pro_codigo = d.doa_pro_codigo
              INNER JOIN tbl_tip_envia t on t.tip_codigo = d.doa_tip_codigo
              INNER JOIN tbl_usuario u on u.usu_codigo = d.doa_usu_codigo
              WHERE p.pro_usu_codigo = :usuario and d.doa_sta_codigo = :sta
              ');
      $sth->bindValue(':usuario', $_SESSION['scambo']['id']);
      $sth->bindValue(':sta', 2);
      $sth->execute();
      if ($sth->rowCount() > 0) :
        foreach ($sth as $res) :
          extract($res);

          ?>

          <div class="container">
            <ul class="collection">
              <li class="collection-item avatar ">
                <img src="img/icoon.png" alt="foto de perfil" class="circle responsive-img">

                <p> Nome: <?php
                              echo $usu_nome;
                              ?>

                </p>
                <p> Celular: <?php
                                  echo $doa_celular;
                                  ?>
                </p>
                <br>
                <p>Produto: <?php
                                echo $pro_nome;
                                ?>
                </p>

                <p>Tipo de envio :
                  <?php

                      echo $tip_nome;
                      ?>
                </p>

                <p>Local ou endereço de envio :
                  <?php
                      $sth = $pdo->prepare("select *from tbl_resposta where res_doa_codigo = :doa");
                      $sth->bindValue(':doa', $doa_codigo);
                      $sth->execute();
                      $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                      extract($resultado);

                      echo $res_local;

                      ?>
                </p>


                <div class="right">
                  <h5>
                    <?php
                        $sth = $pdo->prepare('
select *from tbl_doacao d 
INNER JOIN tbl_stacon s on d.doa_sta_codigo = s.sta_codigo
where d.doa_codigo = :doa_codigo');

                        $sth->bindValue(':doa_codigo', $doa_codigo);
                        $sth->execute();
                        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                        extract($resultado);
                        echo $sta_nome;
                        ?>
                  </h5>
                </div>

              </li>
            </ul>
          </div>
      <?php
        endforeach;

      else :
        echo ' <center> <img src="../img/o.gif" class="circle responsive-img">
<p><h5>Nenhuma oferta no momento</h5></p>
</center> ';
      endif;
      ?>
      <br />


      <br />
      <br />
      <li class="divider black"></li>
      <footer class="footer">
        <div class="white">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">

                <h5 class="red-text text- accent-3">O que é o ScamboNet ?</h5>
                <p class="red-text text- accent-3">Trocar um objeto por outro desejado, não é apenas uma troca, você acabou de conhecer uma nova realidade de poder conseguir algo de sua preferencia trocando por que você tenha fora de uso.</p>
              </div>
              <div class="col l4 offset-l2 s12">

                <h5 class="red-text text- accent-3">Ajuda</h5>
                <ul>
                  <li><a class="red-text text- accent-3" href="../site/sobre.php">Sobre</a></li>
                  <li><a class="red-text text- accent-3" href="../site/politica.php">Politica de Privacidade</a></li>
                  <li><a class="red-text text- accent-3" href="../site/perguntas.php">Perguntas Frequentes (FAQ)</a></li>
                  <li><a class="red-text text- accent-3" href="../site/termosservico.php">Termos de Serviço</a></li>
                </ul>
              </div>
            </div>
          </div>
          <br />
          <div class="footer-copyright">
            <div class="container">
              <span class=" red-text text- accent-3 ">
                R. Afonso Giannico N: 350 - Pedregulho, Guaratinguetá - SP / CEP 12515-160
              </span>
              <a class="red-text text- accent-3 right"> © 2019-<noscript>2019</noscript>
                <script type="text/javascript">
                  document.write(new Date().getFullYear());
                </script> / Empresa do grupo ScamboNet
              </a>
            </div>
          </div>
        </div>
      </footer>

</body>
<script type="text/javascript" src="materialize/js/jquery-3.3.1.min.js"></script>

<!--Import MATERIALIZE.JS-->
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('.sidenav').sidenav();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();


  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('.modal').modal();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems, options);
  });


  // Or with jQuery

  $(document).ready(function() {
    $('input.autocomplete').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      },
    });
  });
</script>

</html>