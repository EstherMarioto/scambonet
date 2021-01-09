<!DOCTYPE html>
<?php
include 'conexao.php';
$end_usu_codigo = $_GET['end_usu_codigo'];
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastra-se</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Import MATERIALIZE.CSS-->
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css" media="screen,projection" />
    <link rel="icon" alt="logo do scamboNet" href="../img/log.png">
</head>

<body class="red accent-3">

    <div class="container">
        <div class="row">
            <div class="card-panel" style="margin-top: 10%;">
                <span class=" black-text text-">
                    <h3>Cadastrar</h3>
                </span>
                <form name="form" method="post" action="insert2.php" >
                    <input name="usu_codigo" type="hidden" value="<?= $end_usu_codigo; ?>">
     
                <div class="row">
                    <div class="input-field col s3">
                        <select name="uf">
                            <?php
                            $sth = $pdo->prepare(" SELECT * FROM tbl_uf");
                            $sth->execute();

                            foreach ($sth as $res) {
                                extract($res);
                                echo '<option value="' . $uf_codigo . '">' . $uf_nome . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-field col s2">
                    <input input class="btn cyan lighten-3 black-text  " type="submit" value="ok" name="submit">
                    </div>
                    </form>
                    <div class="input-field col s6 ">
                        <select name="cidade">
                            <?php
                            $sth = $pdo->prepare(" SELECT * FROM tbl_cidade");
                            $sth->bindValue(':codigo',  $usu_codigo);
                            $sth->execute();

                            foreach ($sth as $res) {
                                extract($res);
                                echo '<option value="' . $cid_codigo . '">' . $cid_nome . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    </div>

                        <div class="row">
                            <div class="input-field col s2">
                                <select name="log">
                                    <?php
                                    $sth = $pdo->prepare(" SELECT * FROM tbl_logradouro");
                                    $sth->execute();

                                    foreach ($sth as $res) {
                                        extract($res);
                                        echo '<option value="' . $log_codigo . '">' . $log_nome . '</option>';
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="input-field col s7">
                                <input name="endereco" type="text">
                                <label for="input_text"> Endereço </label>
                            </div>
                            <div class="input-field col s2">
                                <input name="n" type="text">
                                <label for="input_text"> N° </label>
                            </div>
                        </div>
        
                <div class="row">
                    <div class="input-field col s4">
                        <input name="bairro" type="text">
                        <label for="input_text"> Bairro </label>
                    </div>
                    <div class="input-field col s7">
                        <input name="logrador" type="text">
                        <label for="input_text"> Complemento </label>

                    </div>
                </div>
                

                
                
            
            <div class="row">

                <input input class="btn cyan lighten-3 black-text disabled " type="submit" value="enviar" name="submit">


                <a href="../index.php" input class="btn cyan lighten-3" type="submit">
                    <span class=" black-text  ">Sair </span>
                </a>
            </div>
      
        </div>
    </div>

</body>

<!--Import MATERIALIZE.JS-->
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<!--Import MATERIALIZE.JS-->
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>




<script type="text/javascript">
    $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
    });
</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, options);
    });
    $(document).ready(function() {
        $('.datepicker').datepicker();
    });
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>

</html>