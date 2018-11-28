<script>

    $(document).ready(function () {
        var size = $(window).width();

        if (size <= 767){
            $('.imagemRota').removeClass('imagemI');
        }

        // if (size >= 768){
        //      $('.imagemRota').addClass('imagemI');
        // }

        $(window).resize(function () {
            var size = $(window).width();
            if (size <= 767){
                $('.imagemRota').removeClass('imagemI');
            }

            if (size >= 768){
                $('.imagemRota').addClass('imagemI');
            }

        })

    });


</script>


<body>

<?php include_once '../view/navbar.php'?>

<div class="container rounded">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-primary">Título</h1>
        </div>
    </div>
    <?php foreach ($rotas as $r): ?>
    <form method="post" action="Home.php">
    <div class="row rota">
        <div class="col-lg-8 col-md-12 text-left">
            <div class=""><img src="../../assets/images/<?= $r->getImagemPerfil() ?>" class="img-fluid rounded imagemI imagemRota"></div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="texto text-left text-muted">
                <?= $r->getDescricao() ?>
            </div>
            <a href="#" class=""><button type="submit" class="btn btn-primary btn-info"><?= $r->getNomeRota() ?></button><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
        </div>
        <input class="text-hide" name="id_rota" value="<?= $r->getIdRota() ?>">
        <input class="text-hide" name="acao" value="ver">
    </div>
    </form>
    <?php endforeach; ?>

</div>
