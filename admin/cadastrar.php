<!DOCTYPE html>
<?php
include 'conexao.php';
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
                <form name="form" method="post" action="insert.php" enctype="multipart/form-data">

                    <p>
                        <div class="row">
                            <div class="input-field col s10">
                                <input name="nome" type="text">
                                <label for="input_text"> Nome Completo </label>
                            </div>
                        </div>
                    </p>
                    <div class="row">
                        <div class="input-field col s10">

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
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input id="input_text" name="datanascimento" type="text">
                                        <label for="input_number"> Data de Nascimento </label>
                                    </div>
                                </div>
                    </p>

                    <p>
                        <div class="row">
                            <form class="col s10">
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input id="input_text" name="CPF" type="text" data-length="12">
                                        <label for="input_number"> CPF </label>
                                    </div>
                                </div>
                        </div>
                    </p>

                    <p>
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input id="input_text" name="RG" type="text" data-length="12">
                                        <label for="input_number"> RG </label>
                                    </div>
                                </div>
                        </div>
                    </p>

                    <p>
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input id="input_text" name="telefone" type="tel">
                                        <label for="input_number"> (DDD) Telefone </label>
                                    </div>
                                </div>
                        </div>
                    </p>

                  
                    <div class="row">
                    <div class="input-field col s10">
                    <label for = ""> E-mail </label> 
                    <input type="text" name="email"/>
                    </div>
                </div> 

                <div class="row">
                    <div class="input-field col s10">
                        <input name="senha" type="password">
                        <label for="password"> Senha </label>
                    </div>
                </div>
            </p>
            <p>
                <div class="row">
                    <div class="input-field col s10">
                        <input name="password" type="password">
                        <label for="password"> Confirmação de Senha </label>
                    </div>
                </div>
            </p>

            <div class="row">

                <input input class="btn cyan lighten-3 black-text" type="submit" value="enviar" name="submit">


                <a href="../index.php" input class="btn cyan lighten-3" type="submit">
                    <span class=" black-text  ">Sair </span>
                </a>
            </div>
            </form>
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