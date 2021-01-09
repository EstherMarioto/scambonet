<!DOCTYPE html>

<?php
session_start();
?>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ScamboNet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script src="main.js"></script>
    <link rel="icon"alt="logo do scamboNet" href="log.png">
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
              <li><a href="../perfil/perfil.php">Perfil</a></li>
              <li><a href="../Meus dados/meusdados.php">Meus dados</a></li>
              <li><a href="../perfil/solicitacao.php">Notificações</a></li>
              <li class="divider"></li>
              <li><a href="sair.php">Sair</a></li>
            </ul>
            <li><a href="../categorias.php">Produtos </a></li>
            <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src="icoon.png" class="responsive"></i></a></li>
        </div>

        <div class="nav-content">
          <ul class="tabs tabs-transparent">
            <li class="tab"><a href="../site/ComFunc.php">Como funciona</a></li>
            <li class="tab "><a href="../site/seguranca.php">Segurança</a></li>
            <li class="tab"><a href="contato.php">Contato</a></li>
            <li class="tab white"><a href="../addProduto/addProduto.php"><span class=" black-text"><b>Adicionar Produto</b></span></a></li>
          </ul>
        </div>
      </div>
  </nav>

  <ul class="sidenav red accent-3" id="mobile-demo">
    <div class="col s1 m1 offset-m2">
      <center> <a href="../home.php"><img src="log.png" class="responsive"></a></center>
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
    
      
    <div class="container">
   
            <center><span class=" black-text text-"><h2>Contato </h2></span></center>
            <form name="form1" method="post" action="insert.php">
             <input name="con_usu_codigo" type="hidden" value="<?= $_SESSION["scambo"]["id"]; ?>" ><br/>

                <div class="row">
                     <div class="card-panel  indigo lighten-5">

                         <p>
                             <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="input_text" name="assunto" type="text" data-length="12">
                                            <label for="input_number">Assunto</label>
                                    </div>
                                </div>
                            </div>
                        </p>

                        <p>
                             <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                     <input id="input_text" name="mensagem" type="text" data-length="200">
                                     <label for="input_number">Mensagem</label>
                                    </div>
                                 </div>
                            </div>
                        </p>

                            <div class="row">
    
                                <input input class="btn cyan lighten-3 black-text" type = "submit" value ="enviar" name = "submit">
    
                             </div>
                    </div>
             </div>
             </div>
</body>
<br/>
<hr size = 1 width = 100%>
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
<br/>
      <div class="footer-copyright">
            <span class=" red-text text- accent-3 ">
            R. Afonso Giannico N: 350 - Pedregulho, Guaratinguetá - SP / CEP 12515-160 
            </span>
          <a class="red-text text- accent-3 right">  © 2019-<noscript>2019</noscript><script type="text/javascript">document.write(new Date().getFullYear());</script> / Empresa do grupo ScamboNet</a>
      </div>
      </div>
  </footer>      
  
  </html>

<script type="text/javascript" src="materialize/js/jquery-3.3.1.min.js" ></script>

<!--Import MATERIALIZE.JS-->
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();

  </script>
