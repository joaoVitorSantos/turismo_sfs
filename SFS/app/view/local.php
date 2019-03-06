<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/18/2018
 * Time: 1:50 PM
 */
?>
<script>
    $(document).ready(function () {
    $('#btnIr').click(function () {
    var end = $(this).attr('name');
    window.open(end);
    });

    var avaliacao = 0;
    var id_usuario = $("#id_usuario").text();
    var id_local = $("#id_local").text();
    var avaliacao_propria = $("#avaliacao_propria").html();
    var avaliacao_geral = $("#avaliacao_geral").html();
    var avaliacao_geral_real = $("#avaliacao_geral_real").html();


    if (avaliacao_propria == 5){
    $("#1").attr('src','../../assets/images/estrelaC.jpg');
    $('#3').attr('src','../../assets/images/estrelaC.jpg');
    $('#4').attr('src','../../assets/images/estrelaC.jpg');
    $('#5').attr('src','../../assets/images/estrelaC.jpg');
    $('#2').attr('src','../../assets/images/estrelaC.jpg');
    }else if (avaliacao_propria == 4){
    $("#4").attr('src','../../assets/images/estrelaC.jpg');
    $('#1').attr('src','../../assets/images/estrelaC.jpg');
    $('#2').attr('src','../../assets/images/estrelaC.jpg');
    $('#3').attr('src','../../assets/images/estrelaC.jpg');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    }else if (avaliacao_propria == 3){
    $("#3").attr('src', '../../assets/images/estrelaC.jpg');
    $('#1').attr('src', '../../assets/images/estrelaC.jpg');
    $('#2').attr('src', '../../assets/images/estrelaC.jpg');
    $('#4').attr('src', '../../assets/images/estrelaN.jpg');
    $('#5').attr('src', '../../assets/images/estrelaN.jpg');
    }else if (avaliacao_propria == 2){
    $("#3").attr('src', '../../assets/images/estrelaN.jpg');
    $('#1').attr('src', '../../assets/images/estrelaC.jpg');
    $('#2').attr('src', '../../assets/images/estrelaC.jpg');
    $('#4').attr('src', '../../assets/images/estrelaN.jpg');
    $('#5').attr('src', '../../assets/images/estrelaN.jpg');
    }else if (avaliacao_propria == 1){
    $("#3").attr('src', '../../assets/images/estrelaN.jpg');
    $('#1').attr('src', '../../assets/images/estrelaC.jpg');
    $('#2').attr('src', '../../assets/images/estrelaN.jpg');
    $('#4').attr('src', '../../assets/images/estrelaN.jpg');
    $('#5').attr('src', '../../assets/images/estrelaN.jpg');
    }

    $('#1').click(function () {
    $(this).attr('src','../../assets/images/estrelaC.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    $('#2').attr('src','../../assets/images/estrelaN.jpg');

    $.post("LocalController.php",
    {
    acao: 'curtir',
    avaliacao: 1,
    id_usuario: id_usuario,
    id_local: id_local
    },
    function(data){
    if (data == 'nao'){alert('Faça Login ou Cadastre-se!');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    $('#1').attr('src','../../assets/images/estrelaN.jpg');
    $('#2').attr('src','../../assets/images/estrelaN.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    }
    else{alert('Avaliação Cadastrada!');
    //location.reload();
    $.post("LocalController.php",
    {
    acao: 'avalMed',
    id_local: id_local
    },
    function (data) {
    $('#avaliacao_geral_real').text(data);
    }
    )
    }
    });
    });

    $('#2').click(function () {
    $(this).attr('src','../../assets/images/estrelaC.jpg');
    $('#1').attr('src','../../assets/images/estrelaC.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');

    $.post("LocalController.php",
    {
    acao: 'curtir',
    avaliacao: 2,
    id_usuario: id_usuario,
    id_local: id_local
    },
    function(data){
    if (data == 'nao'){alert('Faça Login ou Cadastre-se!');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    $('#1').attr('src','../../assets/images/estrelaN.jpg');
    $('#2').attr('src','../../assets/images/estrelaN.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    }
    else{alert('Avaliação Cadastrada!');
    //location.reload();
    $.post("LocalController.php",
    {
    acao: 'avalMed',
    id_local: id_local
    },
    function (data) {
    $('#avaliacao_geral_real').text(data);
    }
    )
    }
    });
    });

    $('#3').click(function () {
    $(this).attr('src','../../assets/images/estrelaC.jpg');
    $('#1').attr('src','../../assets/images/estrelaC.jpg');
    $('#2').attr('src','../../assets/images/estrelaC.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');

    $.post("LocalController.php",
    {
    acao: 'curtir',
    avaliacao: 3,
    id_usuario: id_usuario,
    id_local: id_local
    },
    function(data){

    if (data == 'nao'){alert('Faça Login ou Cadastre-se!');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    $('#1').attr('src','../../assets/images/estrelaN.jpg');
    $('#2').attr('src','../../assets/images/estrelaN.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    }
    else{alert('Avaliação Cadastrada!');
    //location.reload();
    $.post("LocalController.php",
    {
    acao: 'avalMed',
    id_local: id_local
    },
    function (data) {
    $('#avaliacao_geral_real').text(data);
    }
    )
    }
    });
    });

    $('#4').click(function () {
    $(this).attr('src','../../assets/images/estrelaC.jpg');
    $('#1').attr('src','../../assets/images/estrelaC.jpg');
    $('#2').attr('src','../../assets/images/estrelaC.jpg');
    $('#3').attr('src','../../assets/images/estrelaC.jpg');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');

    $.post("LocalController.php",
    {
    acao: 'curtir',
    avaliacao: 4,
    id_usuario: id_usuario,
    id_local: id_local
    },
    function(data){
    if (data == 'nao'){alert('Faça Login ou Cadastre-se!');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    $('#1').attr('src','../../assets/images/estrelaN.jpg');
    $('#2').attr('src','../../assets/images/estrelaN.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    }
    else{alert('Avaliação Cadastrada!');
    //location.reload();

    $.post("LocalController.php",
    {
    acao: 'avalMed',
    id_local: id_local
    },
    function (data) {
    $('#avaliacao_geral_real').text(data);
    }
    )
    }
    });
    });

    $('#5').click(function () {
    $(this).attr('src','../../assets/images/estrelaC.jpg');
    $('#1').attr('src','../../assets/images/estrelaC.jpg');
    $('#2').attr('src','../../assets/images/estrelaC.jpg');
    $('#3').attr('src','../../assets/images/estrelaC.jpg');
    $('#4').attr('src','../../assets/images/estrelaC.jpg');

    $.post("LocalController.php",
    {
    acao: 'curtir',
    avaliacao: 5,
    id_usuario: id_usuario,
    id_local: id_local
    },
    function(data){
    if (data == 'nao'){alert('Faça Login ou Cadastre-se!');
    $('#5').attr('src','../../assets/images/estrelaN.jpg');
    $('#1').attr('src','../../assets/images/estrelaN.jpg');
    $('#2').attr('src','../../assets/images/estrelaN.jpg');
    $('#3').attr('src','../../assets/images/estrelaN.jpg');
    $('#4').attr('src','../../assets/images/estrelaN.jpg');
    }
    else{
    alert('Avaliação Cadastrada!');
    // location.reload();
    $.post("LocalController.php",
    {
    acao: 'avalMed',
    id_local: id_local
    },
    function (data) {
    $('#avaliacao_geral_real').text(data);
    }
    )
    }
    });
    });


    });
</script>
<p id="id_usuario" class="text-hide"><?= $_SESSION['id_usuario'] ?></p>
<p id="id_local" class="text-hide"><?= $res->getIdLocal(); ?></p>
<p id="avaliacao_propria" class="text-hide"><?= $avaliacaoPropria ?></p>
<p id="avaliacao_geral" class="text-hide"><?= $avaliacaoGeral?></p>
<body>

<div class="container">
    <div class="card bg-dark" style="margin-top: 2em">
        <img class="card-img" id="imagemRota" src="../../assets/images/<?= $res->getImagemPerfil() ?>" alt="">
        <div class="card-img-overlay" style="margin-top: -1.3em; margin-left: -1.3em; margin-right: -1.3em">
            <div class="card-title text-center text-light tituloCard rounded"><?php if ($_SESSION['lang'] == 'en'){traduzir($res->getNomeLocal());} else {echo $res->getNomeLocal();} ?></div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card cardeR">
            <div class="card-body">
                <h1 class="card-tittle" style="font-family: Cocogoose"><?php if ($_SESSION['lang'] == 'en'){traduzir('Descrição:');} else {echo 'Descrição:';}?></h1>
                <p class="card-text"><?php if ($_SESSION['lang'] == 'en'){traduzir($res->getDescricao());} else {echo $res->getDescricao();} ?></p>
            </div>
            <div class="card-footer">
                 <?php //$res->getTempoMedio() ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div style="height: 4em" class="col-md-4 float-right text-center fundo rounded">
            <div  style="display: inline">
                <img class="estrela" id="1" src="../../assets/images/estrelaN.jpg" alt="">
                <img class="estrela" id="2" src="../../assets/images/estrelaN.jpg" alt="">
                <img class="estrela" id="3" src="../../assets/images/estrelaN.jpg" alt="">
                <img class="estrela" id="4" src="../../assets/images/estrelaN.jpg" alt="">
                <img class="estrela" id="5" src="../../assets/images/estrelaN.jpg" alt="">

            </div>
            <br>
            <h7><?php if ($_SESSION['lang'] == 'en'){traduzir('Média Geral dos Usuários: ');} else {echo 'Média Geral dos Usuários: ';}?>
                <p id="avaliacao_geral_real" style="display: inline"><?= $avaliacaoGeralReal ?></p></h7>
        </div>


       <div class="col-md-7 float-left text-center fundo rounded">
            <h3 class="rotaM"><?php if ($_SESSION['lang'] == 'en'){traduzir('Local no Maps');} else {echo 'Local no Maps';}?></h3>
            <img class="img-fluid rounded" src="../../assets/images/<?= $imgMaps->getNomeImagem() ?>" alt="rota">
            <button id="btnIr" name="<?= $res->getLink() ?>" class="btn btn-success"><?php if ($_SESSION['lang'] == 'en'){traduzir('Ir!');} else {echo 'Ir!';}?></button>
        </div>
    </div>

    <div class="container contLocais rounded" style="margin-top: 2em">
        <div class="bgLightGray rounded-top">
            <div class="row ">
                <div class="col-12 text-center">
                    <h1 id="tituloL" class="rotaTitulo"><?php if ($_SESSION['lang'] == 'en'){traduzir('Imagens');} else {echo 'Imagens';}?>  <img id="iconDropL" class="icon" src="../../assets/open_iconic/svg/caret-bottom.svg" alt="icon name"></h1>
                </div>
            </div>
        </div>
        <div class="locais rounded-bottom ">
            <div class="row">
                <?php foreach ($imgs as $i): ?>
                    <div class="col-md-6">
                        <img src="../../assets/images/<?= $i->getNomeImagem() ?>" alt="foto" class="img-fluid shadow marginTop" style="height: 15em; width: 20em">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>


