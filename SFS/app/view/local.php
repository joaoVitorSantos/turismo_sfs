<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/18/2018
 * Time: 1:50 PM
 */
?>
<p id="id_usuario" class="text-hide"><?= $_SESSION['id_usuario'] ?></p>
<p id="id_local" class="text-hide"><?= $res->getIdLocal(); ?></p>
<p id="avaliacao_propria" class="text-hide"><?php //$avaliacaoPropria ?></p>
<p id="avaliacao_geral" class="text-hide"><?php //$avaliacaoGeral?></p>
<body>

<div class="container">
    <div class="card bg-dark" style="margin-top: 2em">
        <img class="card-img" id="imagemRota" src="../../assets/images/<?= $res->getImagemPerfil() ?>" alt="">
        <div class="card-img-overlay" style="margin-top: -1.3em; margin-left: -1.3em; margin-right: -1.3em">
            <div class="card-title text-center text-light tituloCard rounded"><?= $res->getNomeLocal() ?></div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card cardeR">
            <div class="card-body">
                <h1 class="card-tittle" style="font-family: Cocogoose">Descrição</h1>
                <p class="card-text"><?= $res->getDescricao() ?></p>
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
                <!--<button class="small btn btn-outline-primary" id="avaliar">Avaliar</button>-->
            </div>
            <br>
            <h7>Média Geral dos Usuários: <p id="avaliacao_geral_real" style="display: inline"><?= $avaliacaoGeralReal ?></p></h7>
        </div>


        <div class="col-md-7 float-left text-center fundo rounded">
            <h3 class="rotaM">Rota no Maps</h3>
            <img class="img-fluid rounded" src="../../assets/images/<?= $imgMaps->getNomeImagem() ?>" alt="rota">
            <button id="btnIr" name="<?= $res->getLink() ?>" class="btn btn-success">Ir!</button>
        </div>
    </div>

</div>


