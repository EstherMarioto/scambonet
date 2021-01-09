<?php
include '../admin/conexao.php';


?>
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
               
                <a href="home.php" class="brand-logo" >ScamboNet</a>
       </div>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
   
    <ul id="nav-mobile" class="right hide-on-med-and-down">
    <ul id="dropdown1" class="dropdown-content">
                <li><a href="perfil/perfil.php">Perfil</a></li>
                <li><a href="Meus dados/meusdados.php">Meus dados</a></li>
                <li><a href="perfil/solicitacao.php">Notificações</a></li>
                <li class="divider"></li>
                <li><a href="sair.php">Sair</a></li>
    </ul>
            <li><a href="categorias.php">Produtos </a></li>
                <li><a href="SobreNos/sobrenos.php">Sobre nós</a></li>
        
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src = "img/icoon.png" class="responsive"></i></a></li>
        </div>

        <div class="nav-content">
    <ul class="tabs tabs-transparent">
              <li class="tab"><a href="site/ComFunc.php">Como funciona</a></li>
              <li class="tab "><a href="site/seguranca.php">Segurança</a></li>
              <li class="tab"><a href="Contato/contato.php">Contato</a></li>
              <li class="tab white"><a href="addProduto/addProduto.php"><span class=" black-text"><b>Adicionar Produto</b></span></a></li>
    </ul>
      </div>
      </div>
    </nav>

    <ul class="sidenav red accent-3" id="mobile-demo">
    <div class="col s1 m1 offset-m2">
           <center> <a href="home.php"><img src = "img/log.png" class="responsive"></a></center>
       </div>
       <li><a href = "categorias.php"><span class= white-text > Produtos </span></a></li>
      <li class="divider white"></li>
    <li><a href = "perfil/perfil.php"><span class= white-text > Perfil </span></a></li>
    <li><a href = "perfil/solicitacao.php"><span class= white-text >Notificações </span></a></li>
    <li><a href="Meus dados/meusdados.php"><span class= white-text >Meus dados</span></a></li>
    <li> <a href = "SobreNos/sobrenos.php"><span class= white-text >Sobre Nos </span></a></li>
    <li><a href="sair.php"><span class= white-text >Sair</span></a></li>
    <li class="divider white"></li>

    </ul>

    
  <nav>
    <div class="indigo lighten-5">
      <div class="col s12">
       <center> <a href="home.php" class="breadcrumb black-text">Home</a>
        <a href="#" class="breadcrumb black-text">Produtos</a></center>
       
      </div>
    </div>
  </nav>
            
  <br/>
    <?php

    $pesquisar = $_POST['pesquisar'];
    ?>
<div class="row center">
      
      <?php

        $sth = $pdo->prepare("SELECT * FROM tbl_produto WHERE pro_nome LIKE '%$pesquisar%'  and pro_status = 1 LIMIT 5");
        $sth->execute();

        foreach ($sth as $res) :
            extract($res);
        ?>
   
   <div class="col s6 m2">
    <div class="card">
          <?php
         
      if ($pro_cat_codigo == 18){
        echo "<a href = 'exibirproduto/exibirprodutodoacao.php?pro_codigo= $pro_codigo; '>";
     } else {
      echo "<a href = 'exibirproduto/exibirprodutonovo.php?pro_codigo=$pro_codigo; '>";
    }
?>  
          
                <div class="card-image">
                <?php
                        echo "<img src='addProduto/img/".$pro_img."' alt='Fotos' width='200' height='200'/>";
                     	
                ?>
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