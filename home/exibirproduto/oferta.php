<!DOCTYPE html>
<?php
session_start();
$pro_codigo = $_GET['pro_codigo'];
include '../../admin/conexao.php';
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
               
                <a href="../home.php" class="brand-logo" >ScamboNet</a>
       </div>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
   
    <ul id="nav-mobile" class="right hide-on-med-and-down">
    <ul id="dropdown1" class="dropdown-content">
                <li><a href="../perfil/perfil.php">Perfil</a></li>
                <li><a href="../Meus dados/meusdados.php">Meus dados</a></li>
                <li><a href = "../perfil/solicitacao.php">Notificações</a></li>
                <li class="divider"></li>
                <li><a href="../sair.php">Sair</a></li>
    </ul>
  
                <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>
        
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src = "icoon.png" class="responsive"></i></a></li>
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
           <center> <a href="../home.php"><img src = "log.png" class="responsive"></a></center>
       </div>
       <li><a href = "../categorias.php"><span class= white-text > Produtos </span></a></li>
      <li class="divider white"></li>
    <li><a href = "../perfil/perfil.php"><span class= white-text > Perfil </span></a></li>
    <li><a href = "../perfil/solicitacao.php"><span class= white-text >Notificações </span></a></li>
    <li><a href="../Meus dados/meusdados.php"><span class= white-text >Meus dados</span></a></li>
    <li> <a href = "../SobreNos/sobrenos.php"><span class= white-text >Sobre Nos </span></a></li>
    <li><a href="../sair.php"><span class= white-text >Sair</span></a></li>
    <li class="divider white"></li>

    </ul>
<br/>

<div class="container">
    <div class="row">

    <div class="card-panel indigo lighten-5" style="margin-top: 10%;" >
    <center><span class=" black-text text-"><h3>Informação</h3></span></center>
    <form name="form1" method="post" action="insertoferta.php">
    <input name="pro_codigo" type="hidden" value="<?= $pro_codigo; ?>" ><br/>
    <input name="ofe_usu_codigo" type="hidden" value="<?= $_SESSION["scambo"]["id"]; ?>" ><br/>
    <input name="statuss" type="hidden" value = 1 ><br/>
    
    <br/>
    
    <h5> <?php

        $sth = $pdo->prepare('select *from tbl_produto where pro_codigo = :pro_codigo');
        $sth->bindValue(':pro_codigo', $pro_codigo);
        $sth->execute();
        $resultado = $sth->fetch(PDO::FETCH_ASSOC);
        extract($resultado);



        ?>
    </h5>
   <div class="row">
    <br/>
    <h6>Forma de entrega:</h6>
    <div class="input-field col s8">
   <select name="tipo">
    
    <?php
    $sth = $pdo->prepare(" SELECT * FROM tbl_tip_envia");
    $sth->execute();

    foreach ($sth as $res) {
      extract($res);
      echo '<option value="' . $tip_codigo . '">' . $tip_nome . '</option>';
    }
    ?>
         
          </select>
          </div>
   </div>
  
   <h6>Trocar por:</h6>
  
   <div class="row">
 
    <div class="input-field col s8">
      
    <select name="trocarpor">
    
    <?php
    $sth = $pdo->prepare(" SELECT * FROM tbl_produto WHERE pro_usu_codigo = :usu AND pro_status = :sta");
    $sth->bindValue(':usu', $_SESSION["scambo"]["id"]);
    $sth->bindValue(':sta', 1);
    $sth->execute();

    foreach ($sth as $res) {
      extract($res);
      echo '<option value="' . $pro_codigo . '">' . $pro_nome . '</option>';
    }
    ?>
         
          </select>
    </div>
    </div>
   <div class="row">
    <div class="input-field col s8">
  
    <input id="input_text" name="celular"  type="tel" data-length="13">
        <label for="input_number">(DDD) Celular </label>
    </div>
    </div>

      <div class="row">
        <div class="input-field col s12">
          <input  name="mensagem" type="text" >
          <label for="input_text">Mensagem</label>
    </div>
    <small>* Caso você escolha trocar pessoalmente, não se esqueça de mandar a hora do encontro.</small>
  </div>
  
  <input input class="btn cyan lighten-3 black-text" type = "submit" value ="enviar" name = "submit">
</div>
</form>
<br/>

  
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

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.autocomplete');
    var instances = M.Autocomplete.init(elems, options);
  });


  // Or with jQuery

  $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      },
    });
  });
  $(document).ready(function(){
    $('select').formSelect();
  });
  </script>
    </html>