<!DOCTYPE html>
<?php
session_start();
include '../../admin/conexao.php';
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adicionar produto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  </title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css" media="screen,projection" />
  <script src="main.js"></script>
  <link rel="icon" alt="logo do scamboNet" href="log.png">

  <style>
    ::-webkit-input-placeholder {
      color: black;
    }

    :-moz-placeholder {
      /* Firefox 18- */
      color: black;
    }

    ::-moz-placeholder {
      /* Firefox 19+ */
      color: black;
    }

    :-ms-input-placeholder {
      color: black;
    }
  </style>

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
              <li><a href="../perfil/perfil.php">Perfil</a></li>
              <li><a href="../Meus dados/meusdados.php">Meus dados</a></li>
              <li><a href="../perfil/solicitacao.php">Notificações</a></li>
              <li class="divider"></li>
              <li><a href="../sair.php">Sair</a></li>
            </ul>
            <li><a href="../categorias.php">Produtos </a></li>
            <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src="../SobreNos/icoon.png" class="responsive"></i></a></li>
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
      <center> <a href="home.php"><img src="log.png" class="responsive"></a></center>
 </div>

    <li> <a href="../categorias.php"><span class=white-text> Produtos </span></a></li>
    <li class="divider white"></li>
    <li><a href="../perfil/perfil.php"><span class=white-text> Perfil </span></a></li>
    <li><a href="../perfil/solicitacao.php"><span class=white-text>Notificações </span></a></li>
    <li><a href="../Meus dados/meusdados.php"><span class=white-text>Meus dados</span></a></li>
    <li> <a href="../SobreNos/sobrenos.php"><span class=white-text>Sobre Nos </span></a></li>
    <li class="divider white"></li>
    <li><a href="../sair.php"><span class=white-text>Sair</span></a></li>
    
  </ul>




  <div class="row center">
    <div class="col s12 m12 ">
      <div class="container">
        <div class="row">
          <div class="card-panel indigo lighten-5" style="margin-top: 10%;">
            <h3> Adicionar produto </h3>
            <form name="form" method="post" action="insert.php" enctype="multipart/form-data">

              <input name="pro_usu_codigo" type="hidden" value="<?= $_SESSION["scambo"]["id"]; ?>"><br />
              <input name="pro_status" type="hidden" value=1><br />
              <br>



              <div class="row center">
                <div class="input-field col s11">
                  <input id="input_text" name="pro_nome" type="text">
                  <label for="input_text"> Nome do Produto </label>
                </div>
              </div>


              <div class="row center">
                <div class="input-field col s11">

                  <div class="file-field input-field">
                    <div class="btn">
                      <i class="fa fa-user"></i>
                      <span>Imagem</span>
                      <input type="file" name="fileUpload" required placeholder=" Selecionar Imagem">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                    </div>
                  </div>

                </div>
              </div>

              <p>

                <div class="row center">
                  <div class="input-field col s11">
                    <div class="input-field col s11">

                    </div>
                    <select name="categoria">

                      <?php
                      $sth = $pdo->prepare(" SELECT * FROM tbl_categoria");
                      $sth->execute();

                      foreach ($sth as $res) {
                        extract($res);
                        echo '<option value="' . $Cat_codigo . '">' . $Cat_tipo_categoria . '</option>';
                      }
                      ?>

                    </select>

                  </div>

                </div>
                <div class="row center">
                  <div class="input-field col s4">

                    <select name="estado">

                      <?php
                      $sth = $pdo->prepare(" SELECT * FROM tbl_estado");
                      $sth->execute();

                      foreach ($sth as $res) {
                        extract($res);
                        echo '<option value="' . $est_codigo . '">' . $est_tip_estado . '</option>';
                      }
                      ?>

                    </select>
                  </div>


                  <div class="input-field col s7 ">
                    <input id="input_text" name="material" type="text">
                    <label for="input_text"> Material </label>

                  </div>
                </div>


                <div class="row center">
                  <div class="input-field col s11">


                    <textarea name="descricao" clas placeholder="Descrição" cols="30" rows="5"></textarea>
                  </div>

                </div>




                <div class="row center">

                  <div class="row">

                    <input input class="btn cyan lighten-3 black-text" type="submit" value="enviar" name="submit">


                    <a href="../home.php" input class="btn cyan lighten-3 " type="submit">
                      <span class=" black-text  ">Voltar </span>
                    </a>
                  </div>



                </div>
            </form>
          </div>
        </div>
      </div>

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
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();


  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });
  $(document).ready(function() {
    $('.datepicker').datepicker();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('select').formSelect();
  });
</script>

</html>