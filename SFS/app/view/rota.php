<body>
<div class="container">
<div class="col-md-12">
    <div class="row rota">
        <div class="col-md-12 col-lg-8 text-left">
            <div class=""><img src="../../assets/images/<?= $res->getImagemPerfil() ?>" class="img-fluid rounded imagem"></div>
        </div>
        <div class="col-md-12 col-lg-4">
            <h1 class="text-muted"><?= $res->getNomeRota() ?></h1>
            <div class=" text-left text-muted">
                <?= $res->getDescricao() ?>
            </div>
        </div>
    </div>
    <div class="row rota">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <img src="../../assets/images/ROTA%203.jpg" alt="Maps" class="imagem img-fluid rounded">
        </div>
    </div>
</div>
</div>