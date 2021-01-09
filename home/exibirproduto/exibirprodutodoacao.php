<!DOCTYPE html>
<?php
session_start();
include '../../admin/conexao.php';
$pro_codigo = $_GET['pro_codigo'];
//echo $pro_codigo;
$sth = $pdo->prepare('
 select *from tbl_produto p 
 INNER JOIN tbl_usuario u on p.pro_usu_codigo = u.usu_codigo
 INNER JOIN tbl_categoria c on p.pro_cat_codigo = c.cat_codigo
 INNER JOIN tbl_estado e on p.pro_est_codigo = e.est_codigo
 where P.pro_codigo = :pro_codigo
 ');

$sth->bindValue(':pro_codigo', $pro_codigo);
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
  <link rel="icon" alt="logo do scamboNet" href="log.png">
  <style>
    .linha-vertical {
      height: 200px;
      /*Altura da linha*/
      border-left: 1px solid;
      /* Adiciona borda esquerda na div como ser fosse uma linha.*/
    }
  </style>
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
              <li><a href="../perfil/perfil.php">Perfil</a></li>
              <li><a href="../Meus dados/meusdados.php">Meus dados</a></li>
              <li><a href="../perfil/solicitacao.php">Notificações</a></li>
              <li class="divider"></li>
              <li><a href="../sair.php">Sair</a></li>
            </ul>

            <li><a href="../categorias.php">Produtos </a></li>
            <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src="icoon.png" alt="icone do perfil" class="responsive"></i></a></li>

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
      <center> <a href="../home.php"><img src="log.png" class="responsive"></a></center>
    </div>
    <li><a href="../categorias.php"><span class=white-text> Produtos </span></a></li>
    <li class="divider white"></li>
    <li><a href="../perfil/perfil.php"><span class=white-text> Perfil </span></a></li>
    <li><a href="../perfil/solicitacao.php"><span class=white-text>Notificações </span></a></li>
    <li><a href="../Meus dados/meusdados.php"><span class=white-text>Meus dados</span></a></li>
    <li> <a href="../SobreNos/sobrenos.php"><span class=white-text>Sobre Nos </span></a></li>
    <li><a href="../sair.php"><span class=white-text>Sair</span></a></li>
    <li class="divider white"></li>

  </ul>
  <br />
  <br />

  <div class="container">

    <div class="row ">
      <div class="col s12 m10 offset-m1 ">
        <div class="card-panel indigo lighten-5 " style="margin-top: 0%;">
          <h4><?php
              echo $pro_nome . '</p>';
              ?></h4>

          <br />
          <center>
            <img class="materialboxed">
            <?php
            echo "<img class='responsive-img' src='../addProduto/img/" . $pro_img . "' alt='Fotos' width='700' height='600' />";
            ?>
            <center>
              <div class="row">

                <div class="col s2 m1 offset-m10">
                  <br />
                  <button data-target="modal1" class="btn modal-trigger white black-text">Denunciar</button>
                  <form name="form1" method="post" action="insert.php">
                    <input name="den_qual" type="hidden" value="Produto"><br />
                    <input name="den_usu_codigo" type="hidden" value="<?= $_SESSION["scambo"]["id"]; ?>"><br />
                    <input name="den_usu_dono_codigo" type="hidden" value="<?= $pro_usu_codigo ?>"><br />
                    <div id="modal1" class="modal">

                      <div class="modal-content ">
                        <div class="row">
                          <h4>Denunciar</h4>
                          <br />
                          <div class="row">

                            <div class="input-field col s8">
                              <select name="Tipodenuncia">
                                <?php
                                $sth = $pdo->prepare(" SELECT * FROM tbl_tipodenuncia");
                                $sth->execute();

                                foreach ($sth as $res) {
                                  extract($res);
                                  echo '<option value="' . $tip_codigo . '">' . $tip_tipo_denuncia . '</option>';
                                }
                                ?>

                              </select>
                            </div>
                            <br />
                            <br />
                            <br />
                            <br />
                            <br />

                            <div class="input-field col s8">
                              <input name="obs" type="text" data-length="200">
                              <label for="input_text"> Observação </label>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <input input class="btn cyan lighten-3 black-text" type="submit" value="enviar" name="submit">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>



        </div>
      </div>
      </form>
    </div>
  </div>




  <div class="row ">

    <div class="col s12 m8 offset-m0">
      <div class="card-panel indigo lighten-5 " style="margin-top: 0%;">
        <h5 class=" black-text  light"><b> Caracteri­sticas </b></h5>
        <br />
        <br />
        <div class="row ">

          <form class="col s4">
            <h6 class="  grey-text">Material: </h6>
            <br />
            <h6 class="black-text">
              <?php
              echo $pro_material;
              ?></h6>

            <br />
          </form>

          <form class="col s4">
            <h6 class="  grey-text ">Estado: </h6>
            <br />
            <h6 class="black-text">
              <?php
              echo $est_tip_estado;
              ?></h6>

          </form>

          <form class="col s3">
            <h6 class="  grey-text "> Categoria: </h6>
            <br />
            <h6 class="black-text">
              <?php
              echo $Cat_tipo_categoria;
              ?></h6>
          </form>
        </div>
        <br />
        <br />
        <br />
        <h5 class=" black-text  light"><b> Descrição </b></h5>
        <?php
        echo $pro_descricao;
        ?>
        <br />
        <br />

        <br />
      </div>
    </div>




    <div class="row  ">
      <div class="col s12 m4 offset-m0 ">
        <div class="card-panel indigo lighten-5 " style="margin-top: 0%;">

          <a href="ofertadoacao.php?pro_codigo=<?= $pro_codigo; ?>" input class="btn cyan lighten-3" type="submit">
            <span class=" black-text  "> Eu Quero </span>
          </a>
          <br />
          <hr size=1 width=100%>
          <br />
          <h5 class=" black-text  light"> <b>Informação sobre o trocador </b></h5>

          <br />
          <h5> Nome :
            <?php
            echo $usu_nome;
            ?>


          </h5>

          <br />
          <h5> Localização:
            <?php

            $sth = $pdo->prepare('
   select *from tbl_usuario u 
   INNER JOIN tbl_cidade c on u.usu_cid_codigo = c.cid_codigo
   where u.usu_codigo = :usu_codigo');

            $sth->bindValue(':usu_codigo', $usu_codigo);
            $sth->execute();
            $resultado = $sth->fetch(PDO::FETCH_ASSOC);
            extract($resultado);
            echo $cid_nome;

            ?>

          </h5>

          <br />
          <br />
          <br />
          <br />

          <a href="../perfil/perfilVer.php?pro_codigo=<?= $pro_codigo; ?>"><small> Ver mais dados deste trocador </small>
          </a>



        </div>
      </div>


    </div>


    <div class="row  ">
      <div class="col s12 m12 offset-m0 ">
        <br />

        <div class="card-panel indigo lighten-5 " style="margin-top: 0%;">
          <center>
            <h4 class=" black-text  light"><b>Formas de entrega </b></h4>
          </center>
          <br />
          <br />
          <div class="row  ">
            <form class="col s6">
              <h5>Envio via correio </h5>
              <p> Em lugares que são muito longe da sua casa, você pode enviar via sedex seus produtos para o outro usuario. </p>
            </form>

            <form class="col s0">
              <div class="linha-vertical"></div>
            </form>
            <form class="col s5">
              <h5>Troca pessoalmente </h5>
              <p> Se consiste em ambos usuários demarcarem um determinado local ou ponto de encontro para efetuar a troca física.</p>
              <br />
            </form>
          </div>
        </div>
      </div>

    </div>


    <hr size=1 width=100%>
    <footer class="footer">
      <div class="white">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">

              <h5 class="red-text text- accent-3">O que é o ScamboNet ?</h5>
              <p class="red-text text- accent-3">Trocar um objeto por outro desejado, não é apenas uma troca, você acabou de conhecer uma nova realidade de poder conseguir algo que queira por outro q não desejava mas.</p>
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

  // imagem 
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('.materialboxed').materialbox();
  });
  //select
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('select').formSelect();
  });
  // palavras
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('.tooltipped').tooltip();
  });

  Opções
</script>

</html>