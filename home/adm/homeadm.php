<!DOCTYPE html>

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
    <link rel="icon"alt="logo do scamboNet" href="img/log.png">
</head>

<body >
<!-- nav bar -->
    <nav class="nav-extended" >
        <div class="red accent-3">
        <div class="nav-wrapper">
        <div class="row"> 
        <div class="col s1 m1 offset-m0">
                <a href="homeadm.php"> <img src = "img/log.png" class="responsive"></a>
                <a href="homeadm.php" class="brand-logo" >ScamboNet</a>
       </div>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
   
    <ul id="nav-mobile" class="right hide-on-med-and-down">
   
                <li><a href="SobreNos/sobrenos.php">Sobre nós</a></li>
                <li><a href="sair.php">Sair</a></li>
        
        </div>

        <div class="nav-content">
    <ul class="tabs tabs-transparent">
              <li class="tab"><a href="contato/contatos.php">Contato</a></li>
              <li class="tab"><a href="denuncias/denuncias.php">Denúncias</a></li>
    </ul>
      </div>
      </div>
    </nav>
  
      <div class= "indigo lighten-5">
      <div class= row>
     <img src = "img/paleta1.jpg" class="responsive">
      </div>

      <div class= "indigo lighten-5">
      <div class="row">
      <div class="col s1 m1 offset-m0">

          <img src = "img/afeto pronto.png" class="responsive">

      </div>

      <div class="col s1 m7 offset-m4">
      <h4 class="light "> <span class=" black-text">Um produto por um Afeto, um afeto por um produto.</span></h4>
      <h5 class="light"> <span class=" black-text">Uma pessoa pode pedir um sorrisso ou um beijo em troca de um determinado material que você ira trocar.
você pode  receber ou dar uma grande felicidade para uma pessoa, e assim podendo se tornar amigos com um grande carinho e o ciclo continua.</h5></span>

<br/>
<br/>
      </div>
      </div>
   
      <div class= "white">
<center>
      <h4 class="light "> <span class=" black-text"><b>Sugestões</b></span></h4>
</center>
<div class="row center">
<div class="row">

<?php
include '../../admin/conexao.php';
$sth = $pdo->prepare('select *from tbl_produto  limit 6');
$sth->execute();
foreach ($sth as $res) :
    extract($res);
   ?>
    <div class="col s3 m2">
    <div class="card">
          <?php
         
      if ($pro_cat_codigo == 18){
        echo "<a href = 'exibirproduto/exibirprodutodoacao.php?pro_codigo= $pro_codigo; '>";
     } else {
      echo "<a href = 'exibirproduto/exibirprodutonovo.php?pro_codigo=$pro_codigo; '>";
    }
?>  
          
          
                <div class="card-image">
                <img src="../img/o.gif">
                </div>
                <div class="card-content">     
                <span class="card-title black-text"><h5><?= substr($pro_nome, 0, 10); ?></h5></span>
                    <p style="height: 60px;" class="black-text"><?= substr($pro_descricao, 0, 38); ?>...</p>
                </div>
            </a>   
                 
        </div>
    </div>
    
        
<?php
endforeach;
?>
</div>
  </div>
      <div class= "indigo lighten-5">
      <div class="row">
      <div class="col s1 m1 offset-m0">

            <img src = "img/doação escola.png" class="responsive">

      </div>

      <div class="col s1 m7 offset-m4">
<br/>
<br/>
      <h4 class="light "> <span class=" black-text">Doando o que foi esquecido.</span></h4>
      <h5 class="light"> <span class=" black-text">A escola ira doar algo que foi esquecido pelos alunos e esta guardado a muito tempo,  que sera de grande utilidade para alguem que esta precisando.</h5></span>

<br/>
<br/>
      </div>
      </div>

<br/>
     
      <div class="red accent-3">
      <div class="row center">
      <div class="col s12 m12 offset-m0 ">

              <h2 class="light "> <span class=" white-text"> É facil trocar pelo ScamboNet!</span></h2>

      </div>
      </div>
      <div class="row center">
      <div class="col s12 m12 offset-m0 ">

              <h5 class="light"> <span class=" white-text"> Publique sua lista de produtos disponíveis para troca ou encontre o que tanto deseje aqui. </span></h5>
      
      </div>
      </div>
      </div>
<br/>

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
                  <li><a class="red-text text- accent-3" href="footer/sobre.php">Sobre</a></li>
                  <li><a class="red-text text- accent-3" href="footer/politica.php">Politica de Privacidade</a></li>
                  <li><a class="red-text text- accent-3" href="footer/perguntas.php">Perguntas Frequentes (FAQ)</a></li>
                  <li><a class="red-text text- accent-3" href="footer/termosservico.php">Termos de Serviço</a></li>
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
      </div>
  </footer>     
</body>

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
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });

  // Or with jQuery

  $('.dropdown-trigger').dropdown();

  </script>
</html>