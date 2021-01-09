<!DOCTYPE html>
<?php
include '../../../admin/conexao.php';
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

<body >
<!-- nav bar -->
    <nav class="nav-extended" >
        <div class="red accent-3">
        <div class="nav-wrapper">
        <div class="row"> 
        <div class="col s1 m1 offset-m0">
                <a href="../homeadm.php"> <img src = "log.png" class="responsive"></a>
                <a href="../homeadm.php" class="brand-logo" >ScamboNet</a>
       </div>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
   
    <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>
                <li><a href="../sair.php">Sair</a></li>
        </div>

        <div class="nav-content">
    <ul class="tabs tabs-transparent">
              <li class="tab"><a href="../contato/contatos.php">Contato</a></li>
              <li class="tab "><a href="denuncias.php">Denúncias </a></li>
    </ul>
      </div>
      </div>
    </nav>
<br/>

<center><span class=" black-text text-"><h3>Denúncias </h3></span></center>

<br/>
    
<?php

  $sth=$pdo->prepare('
  select *from tbl_denuncia d 
  INNER JOIN tbl_usuario u on d.den_Usu_codigo = u.usu_codigo
  INNER JOIN tbl_tipodenuncia t on d.den_Tip_codigo = t.tip_codigo
  ');
  
  $sth->execute();
  foreach($sth as $res):
  extract($res);
?>
<div class="container">
    <ul class="collection ">
    <li class="collection-item avatar ">
      <img src="../img/icoon.png" alt="perfil" class="circle">
      <a class="waves-effect waves-light btn modal-trigger indigo lighten-5 right" href="#modal1"><span class=" black-text">Ver</span></a>
      <h6><?= $usu_nome ?>  </h6>
      <h6> <?= $usu_email ?> </h6>
    </li>
  </ul>
</div> 
 
<div id="modal1" class="modal">
 <div class="modal-content">
   <div class="row">
      <div class="col s6 center">
        <h5>Quem estou denunciando:</h5>
        <h6> <?= $usu_nome ?></h6>
      </div>
      <div class="col s6 center">
         <h5>O que está denunciando:</h5>
        <h6> <?= $den_qual ?></h6>
      </div>
    </div>
    <br/>
    <br/>
    <div class="row">
      <div class="col s6 center">
       <h5>Tipo de Denúncia:</h5>
        <h6> <?= $tip_tipo_denuncia ?></h6>
      </div>

     <div class="col s6 center">
        <h5>Observação:</h5>
       <h6><?= $den_observacao ?></h6>
      </div>
    </div>
  </div>
        <div class="modal-footer">
        <div class="modal-close waves-effect waves-green btn-flat">Ok</div>
        </div>
        </div>
        </div>

       <!-- Modal Structure -->
      
  <?php
endforeach;
?>
       
<br/><br/>
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
  <li><a class="red-text text- accent-3" href="../footer/sobre.php">Sobre</a></li>
                  <li><a class="red-text text- accent-3" href="../footer/politica.php">Politica de Privacidade</a></li>
                  <li><a class="red-text text- accent-3" href="../footer/perguntas.php">Perguntas Frequentes (FAQ)</a></li>
                  <li><a class="red-text text- accent-3" href="../footer/termosservico.php">Termos de Serviço</a></li>
  </ul>
      </div>
      </div>
      </div>
<br/>
      <div class="footer-copyright">
    <div class="container">
            <span class=" red-text text- accent-3 ">
            R. Afonso Giannico N: 350 - Pedregulho, Guaratinguetá - SP / CEP 12515-160 
            </span>
          <a class="red-text text- accent-3 right">  © 2019-<noscript>2019</noscript><script type="text/javascript">document.write(new Date().getFullYear());</script> / Empresa do grupo ScamboNet</a>
      </div>
      </div>
  </footer>      
  
    </body>

    
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


  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });

  

  
  
  </script>
    </html>