<script>
    $(document).ready(function () {
       $('#btnIr').click(function () {
           var end = $(this).attr('name');
           window.open(end);
       });
    });
</script>

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

    <div class="row">
        <div class="col-md-6 text-center fundo rounded">
            <h3 class="rotaM">Rota no Maps</h3>
            <img class="img-fluid rounded" src="../../assets/images/maps/<?= $imgMaps->getNomeImagem() ?>" alt="rota">
            <button id="btnIr" name="<?= $res->getLink() ?>" class="btn btn-success">Ir!</button>
        </div>
    </div>
</div>