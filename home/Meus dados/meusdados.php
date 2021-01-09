
<!DOCTYPE html>
<?php
session_start();

include '../../admin/conexao.php' ;

$usu_codigo = filter_input(INPUT_GET, 'usu_codigo', FILTER_DEFAULT);
$sth = $pdo->prepare("select *from tbl_usuario where usu_codigo = :codigo");
$sth->bindValue(':codigo', $_SESSION["scambo"]["id"]);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
?>
<?php
$sth = $pdo->prepare('
select *from tbl_endereco e 
INNER JOIN tbl_cidade c on e.end_cid_codigo = c.cid_codigo
where e.end_usu_codigo = :usu_codigo ');

$sth->bindValue(':usu_codigo', $_SESSION["scambo"]["id"]);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
?>
<?php
$sth = $pdo->prepare('
select *from tbl_endereco e
INNER JOIN tbl_logradouro l on e.end_logradouro = l.log_codigo
where e.end_usu_codigo = :usu_codigo ');

$sth->bindValue(':usu_codigo', $_SESSION["scambo"]["id"]);
$sth->execute();
$resultado = $sth->fetch(PDO::FETCH_ASSOC);
extract($resultado);
?>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Meus Dados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script src="main.js"></script>
    <link rel="icon"alt="logo do scamboNet" href="log.png">
</head>

<body>
<!-- nav bar -->
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
              <li><a href="Meus dados/meusdados.php">Meus dados</a></li>
              <li><a href="../perfil/solicitacao.php">Notificações</a></li>
              <li class="divider"></li>
              <li><a href="../sair.php">Sair</a></li>
            </ul>
            <li><a href="../categorias.php">Produtos </a></li>
            <li><a href="../SobreNos/sobrenos.php">Sobre nós</a></li>

            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right"> <img src="icoon.png" class="responsive"></i></a></li>
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
      <center> <a href="home.php"><img src="../img/log.png" class="responsive"></a></center>
    </div>

    <li><a href="../categorias.php"><span class=white-text> Produtos </span></a></li>
    <li class="divider white"></li>
    <li><a href="../perfil/perfil.php"><span class=white-text> Perfil </span></a></li>
    <li><a href="../perfil/solicitacao.php"><span class=white-text>Notificações </span></a></li>
    <li><a href="Meus dados/meusdados.php"><span class=white-text>Meus dados</span></a></li>
    <li> <a href="../SobreNos/sobrenos.php"><span class=white-text>Sobre Nos </span></a></li>
    <li><a href="../sair.php"><span class=white-text>Sair</span></a></li>
    <li class="divider white"></li>
  </ul>

<body>

    <div class="container">
   
        <span class=" black-text text-"><h3>Dados da conta </h3></span>
        <div class="row">
             <div class="card-panel  indigo lighten-5">
                <span class=" black-text text- "><h6>Nome Completo</h6></span>

                    <?php 
                    $sth = $pdo->prepare('select *from tbl_usuario where usu_codigo = :codigo');
                    $sth->bindValue(':codigo', $_SESSION["scambo"]["id"]);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                    echo $usu_nome;

                    ?>   
    
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal1"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                 <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Nome Completo</h4>
                    </div>
                    <form name="form1" action="Updates/updateNome.php" method="POST">
                        <div class="input-field col s8">
                            <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                            <input name="nome" type="text" data-length="200">
                            <label for="input_text"> Nome Completo </label>
                        </div>
        
                        <div class="modal-footer">
                            <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                        </div>
                    </form>
     
                </div>
     
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>E-mail</h6></span>
                    <?= $usu_email; ?>
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal2"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal2" class="modal">
                        <div class="modal-content">
                            <h4>E-mail</h4>
                        </div>
                        <form name="form1" action="Updates/updateEmail.php" method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="email" type="text" data-length="200">
                                <label for="input_text"> E-mail </label>
                            </div>
        
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
     
                    </div>
                </div>
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>Trocar Foto de Perfil</h6></span>
                    <?php
                    echo $usu_img;
                    ?>
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal14"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal14" class="modal">
                        <div class="modal-content">
                          
                        </div>
                        <form name="form1" action="Updates/updateFoto.php" method="POST"  enctype="multipart/form-data">
                        <div class="input-field col s8">
                        <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>" data-length="200">
                        <div class="file-field input-field">
                        <div class="btn">
                        <i class="fa fa-user"></i>
                        <span>Imagem</span>
                        <input type="file" name="fileUpload"  required placeholder=" Selecionar Imagem">
                         </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                        </div>

                        </div>
        
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
     
                    </div>
                </div>
      
                <div class ="row">
                    <br/>
                    <span class=" black-text text- ">Senha</span>
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal3"><span class=" black-text">Atualizar</span></a>   
                    <!-- Modal Structure -->
                    <div id="modal3" class="modal">
                        <div class="modal-content">
                            <h4>Senha</h4>
                        </div>
                        <form name = "form1" action = "Updates/updateSenha.php" method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="senha" type="password" data-length="50">
                                <label for="password"> Senha </label>
                            </div>
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
       
            <span class=" Black-text text-"><h3>Dados pessoais </h3></span>
        <div class="row">
            <div class="card-panel indigo lighten-5">
                <span class=" black-text text- "><h6>(DDD) Telefone </h6></span>
                <?= $usu_celular; ?></span>
                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn modal-trigger white right" href="#modal4"><span class=" black-text">Atualizar</span></a>
                <!-- Modal Structure -->
                <div id="modal4" class="modal">
                    <div class="modal-content">
                        <h4>Telefone</h4>
                    </div>
                    <form name="form1" action="Updates/updateTelefone.php" method="POST">
                        <div class="input-field col s8">
                            <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                            <input name="telefone" type="text" data-length="200">
                            <label for="input_text"> (DDD) Celular </label>
                        </div>
        
                        <div class="modal-footer">
                            <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                        </div>
                    </form>
     
                </div>
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>Data de Nascimento </h6></span>
                    <?= $usu_dt_nasc; ?></span>
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal5"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal5" class="modal">
                        <div class="modal-content">
                            <h4>Data de nascimento</h4>
                        </div>
                        <form name="form1" action="Updates/updateNasc.php" method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="dat" type="text" data-length="200">
                                <label for="input_text"> Data de Nascimento </label>
                            </div>
        
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
     
                    </div>
                </div>
                <span class=" black-text text- "><h6>CPF </h6></span>
                <?= $usu_cpf; ?></span>
                <div class ="row">
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal6"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal6" class="modal">
                        <div class="modal-content">
                            <h4>CPF</h4>
                        </div>
                        <form name = "form1" action = "Updates/updateCPF.php" method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>" data-length="200">
                                <input name="CPF" type="text" data-length="200">
                                <label for="input_number"> CPF </label>
                            </div>
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
                    </div>
                </div>
            
            <span class=" black-text text- "><h6>RG </h6></span>
            <?= $usu_rg; ?></span>
            <div class ="row">
            
                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn modal-trigger white right" href="#modal7"><span class=" black-text">Atualizar</span></a>
                <!-- Modal Structure -->
                <div id="modal7" class="modal">
                    <div class="modal-content">
                        <h4>RG</h4>
                    </div>
                    <form name = "form1" action = "Updates/updateRG.php"  method="POST">
                        <div class="input-field col s8">
                            <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>" data-length="200">
                            <input name="RG" type="text" data-length="200">
                            <label for="input_number"> RG </label>
                        </div>
                        <div class="modal-footer">
                            <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        


        <span class=" black-text text-"><h3>Referêncial </h3></span>
        <div class="row">
            <div class="card-panel indigo lighten-5">
                <span class=" black-text text- "><h6>Logradouro </h6></span>
                <?php 
                    $sth = $pdo->prepare('select *from tbl_endereco where end_usu_codigo = :codigo');
                    $sth->bindValue(':codigo', $_SESSION["scambo"]["id"]);
                    $sth->execute();
                    $resultado = $sth->fetch(PDO::FETCH_ASSOC);
                    extract($resultado);
                    echo $log_nome;

                    ?>   
             
                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn modal-trigger white right" href="#modal8"><span class=" black-text">Atualizar</span></a>
                <!-- Modal Structure -->
                <div id="modal8" class="modal">
                    <div class="modal-content">
                        <h4>Logradouro</h4>
                    </div>
                    <form name="form1" action="Updates/updateLog.php" method="POST">
                        <div class="input-field col s8">
                            <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                            <input name="log" type="text">
                            <label for="input_text">Logradouro</label>
                        </div>
        
                        <div class="modal-footer">
                            <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                        </div>
                    </form>
                </div>
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>Endereço </h6></span>
                    <?= $end_endereco; ?></span> 
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal9"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal9" class="modal">
                        <div class="modal-content">
                            <h4>Endereço</h4>
                        </div>
                        <form name = "form1" action = "Updates/updateEnd.php"  method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="ende" type="text" data-length="200">
                                <label for="input_text"> Endereço </label>
                            </div>
        
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>Numero  </h6></span>
                    <?= $end_numero; ?></span> 
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal10"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal10" class="modal">
                        <div class="modal-content">
                            <h4>Numero</h4>
                        </div>
                        <form name = "form1" action = "Updates/updateNum.php"  method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="num" type="text" data-length="200">
                                <label for="input_text"> Numero </label>
                            </div>
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>Bairro </h6></span>
                    <?= $end_bairro; ?></span> 
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal11"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal11" class="modal">
                        <div class="modal-content">
                            <h4>Bairro</h4>
                        </div>
                        <form name = "form1" action = "Updates/updateBai.php"  method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="bai" type="text" data-length="200">
                                <label for="input_text"> Bairro </label>
                            </div>
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class ="row">
                    <br/>
                    <br/>
                    <span class=" black-text text- "><h6>Complemento </h6></span>
                    <?= $end_complemento; ?></span> 
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal12"><span class=" black-text">Atualizar</span></a>
                    <!-- Modal Structure -->
                    <div id="modal12" class="modal">
                        <div class="modal-content">
                            <h4>Endereço</h4>
                        </div>
                        <form name = "form1" action = "Updates/updateCom.php"  method="POST">
                            <div class="input-field col s8">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>">
                                <input name="com" type="text" data-length="200">
                                <label for="input_text"> Endereço </label>
                            </div>
        
                            <div class="modal-footer">
                                <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class ="row">
                    <br/>
                    <span class=" black-text text- "><h6>Cidade </h6></span>
                    <?= $cid_nome; ?>
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger white right" href="#modal13"><span class=" black-text">Atualizar</span></a>
                     <!-- Modal Structure -->
                    <div id="modal13" class="modal">
                        <div class="modal-content">
                            <h4>Cidade</h4>
                            
                            <form name = "form1" action = "Updates/updateCidade.php"  method="POST">
                                <input name="usu_codigo" type="hidden" value="<?= $usu_codigo; ?>" data-length="200">
                                <div class="row">
                                    <div class="input-field col s8">
                                        <select name="cidade">
                                            <?php
                                            $sth = $pdo->prepare(" SELECT * FROM tbl_cidade");
                                            $sth->execute();

                                            foreach ($sth as $res) {
                                                extract($res);
                                                echo '<option value="' . $cid_codigo . '">' . $cid_nome . '</option>';
                                            }
                                            ?>
                                        </select>
 
                                    </div>
                                </div>
    
    
                                <div class="modal-footer">
                                    <input class="modal-close waves-effect waves-green btn-flat" type="submit" value="Confirmar"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <br/>
    <div class="row">
            <div class="card-panel indigo lighten-5">
                <span class=" black-text text- "><h6>Conta </h6></span>
            
                <a class="waves-effect waves-light btn modal-trigger white right" href="#modal15"><span class=" black-text">Excluir</span></a>
                <!-- Modal Structure -->
                <div id="modal15" class="modal">
                    <div class="modal-content">
                        <h5>Tem certeza que deseja excluir sua conta de usuário ? </h5>
                    </div>
                    <div class="modal-footer">
                    <a href = "delete.php?usu_codigo=<?= $_SESSION["scambo"]["id"]; ?>"  class="modal-close waves-effect waves-green btn-flat"> Sim </a>
                    <a href = "#"  class="modal-close waves-effect waves-green btn-flat"> Não </a>
               
                    </div>
                        
                
                       

                    </div>
                    <br/>

                </div>
                </div>
   
     <li class="divider black"></li>
  <footer class="footer">
      <div class="white">
      <div class="container">
      <div style="text-align: justify;">
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
<br/>
      <div class="footer-copyright">
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