<body>
<div class="container">
    <div class="card bg-dark" style="margin-top: 2em">
        <img class="card-img" id="imagemRota" src="../../assets/images/<?= $res->getImagemPerfil() ?>" alt="">
        <div class="card-img-overlay" style="margin-top: -1.3em; margin-left: -1.3em; margin-right: -1.3em">
            <div class="card-title text-center text-light tituloCard rounded"><?= $res->getNomeRota() ?></div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="card cardeR">
            <div class="card-body">
                <h1 class="card-tittle">Descricao</h1>
                <p class="card-text"><?= $res->getDescricao() ?></p>
            </div>
            <div class="card-footer">
                Tempo Médio: <?= $res->getTempoMedio() ?>
            </div>
        </div>
    </div>
</div>