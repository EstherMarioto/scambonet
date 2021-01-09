<!DOCTYPE html>
<?php
session_start();

include '../../admin/conexao.php';


$sth = $pdo->prepare('
 select *from tbl_usuario u 
 INNER JOIN tbl_cidade c on u.usu_cid_codigo = c.cid_codigo
 where u.usu_codigo = :usu_codigo ');

$sth->bindValue(':usu_codigo', $_SESSION["scambo"]["id"]);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);

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
              <li><a href="solicitacao.php">Notificação </a></li>
              <li class="divider"></li>
              <li><a href="../sair.php">Sair</a></li>
            </ul>
            <li><a href="../categorias.php">Produtos </a></li>
            <li><a href="../SobreNos/sobrenos.php">Sobre nos</a></li>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src="img/icoon.png" alt="icone do perfil" class="responsive"></i></a></li>

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
  <br />
  <br /> <ul class="sidenav red accent-3" id="mobile-demo">
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
    <div class="container">
      <div class="col s12 m10 offset-m1 center" style="background-color: #e8eaf6">
        <br />
        <?php
        $sth = $pdo->prepare('select *from tbl_usuario where usu_email = :email');
        $sth->bindValue(':email', $_SESSION["scambo"]["email"]);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);
        echo "<img src='../../admin/img/" . $usu_img . "' alt='Fotos' width='250' height='250' class='circle responsive-img' />";
        ?>
      </div>

      <div class="col s12 m10 offset-m1" style="background-color: #e8eaf6">

        <table class="responsive-table ">
          <center>
            <h4><?php



                echo $usu_nome;


                ?></h4>
          </center>

          <body>
            <tr>
              <td>
              </td>
            </tr>


            <tr>
              <td><b>Data de Nascimento</b></td>
              <td>
                <?= $usu_dt_nasc; ?>
              </td>
            </tr>

            <tr>
              <td><b>Localização</b></td>
              <td>
                <?= $cid_nome; ?>
              </td>
            </tr>
            <tr>
              <td><b>Celular</b></td>
              <td>
                <?= $usu_celular; ?>
              </td>
            </tr>
            </tbody>

        </table>
      </div>
    </div>
  </div>
  </div>
  <br />

  <h4 class="black-text light"><b>Trocas Disponíveis</b></h4>
  <br />

  <div class="row ">
    <?php
    $sth = $pdo->prepare('select *from tbl_produto  where pro_usu_codigo = :codigo and pro_status = 1');
    $sth->bindValue(':codigo', $usu_codigo);
    $sth->execute();
    foreach ($sth as $res) :
      extract($res);
      ?>
      <div class="col s6 m2">
        <div class="card"><?php
                            if ($pro_cat_codigo == 18) {
                              echo "<a href = '../exibirproduto/exibirprodutodoacao.php?pro_codigo= $pro_codigo; '>";
                            } else {
                              echo "<a href = '../exibirproduto/exibirprodutonovo.php?pro_codigo=$pro_codigo; '>";
                            }
                            ?>

          <a href="update_status.php?pro_codigo=<?= $pro_codigo; ?>&pro_status=3"> <i class="material-icons">clear</i> </a>
          <div class="card-image">
            <?php
              echo "<img src='../addProduto/img/" . $pro_img . "' alt='Fotos' width='200' height='200'/>";

              ?>
          </div>

          <div class="card-content">
            <span class="card-title black-text">
              <h5><?= substr($pro_nome, 0, 10); ?></h5>
            </span>
            <p style="height: 60px;" class="black-text"><?= substr($pro_descricao, 0, 38); ?>...</p>
            <a href="update_statuss.php?pro_codigo=<?= $pro_codigo; ?>&pro_status=2"> <i class="wafes-effect waves-light btn">realizado</i> </a>
          </div>
          </a>
        </div>
      </div>

    <?php
    endforeach;
    ?>


  </div>

  <h4 class="black-text light"><b>Trocas Realizadas</b></h4>



  <div class="row ">
    <?php
    $sth = $pdo->prepare('select *from tbl_produto  where pro_usu_codigo = :codigo  and pro_status = 2');
    $sth->bindValue(':codigo', $usu_codigo);
    $sth->execute();
    foreach ($sth as $res) :
      extract($res);
      ?>
      <div class="col s6 m2">
        <div class="card"><?php
                            if ($pro_cat_codigo == 18) {
                              echo "<a href = '../exibirproduto/exibirprodutodoacao.php?pro_codigo= $pro_codigo; '>";
                            } else {
                              echo "<a href = '../exibirproduto/exibirprodutonovo.php?pro_codigo=$pro_codigo; '>";
                            }
                            ?>

          <div class="card-image">
            <?php
              echo "<img src='../addProduto/img/" . $pro_img . "' alt='Fotos' width='200' height='200'/>";

              ?>
          </div>
          <div class="card-content">
            <span class="card-title black-text">
              <h5><?= substr($pro_nome, 0, 10); ?></h5>
            </span>
            <p style="height: 60px;" class="black-text"><?= substr($pro_descricao, 0, 38); ?>...</p>
          </div>
          </a>
        </div>
      </div>

    <?php
    endforeach;
    ?>


  </div>

  <br />
  <li class="divider black"></li>
  <footer class="footer">
    <div class="white">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
          <div style="text-align: justify;">
            <h5 class="red-text text- accent-3">O que é o ScamboNet ?</h5>
            <p class="red-text text- accent-3">Trocar um objeto por outro desejado, não é apenas uma troca, você acabou de conhecer uma nova realidade de poder conseguir algo de sua preferencia trocando por que você tenha fora de uso.</p>
          </div>
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

<script type="text/javascript" src="materialize/js/jquery-3.3.1.min.js">

</script>

<!--Import MATERIALIZE.JS-->
<script type="text/javascript" src="materialize/js/materialize.min.js">

</script>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });



  $(document).ready(function() {
    $('.sidenav').sidenav();
  });

  //perfil

  $(".dropdown-trigger").dropdown();

  //modal
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('.modal').modal();
  });
</script>

</html>