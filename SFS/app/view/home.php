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

<div class="inicio bg-dark">
    <img class="img-fluid imagemPrincipal" src="../../assets/images/fotoprincipal.jpg" alt="">
    <h1 class="text-img text-white rounded titulo text-center">Click São Chico</h1>
</div>

<div class="container contRotas rounded">
    <div class="rounded-top">
    <div class="row ">
        <div class="col-12 text-center">
            <h1 id="tituloR" class="rotaTitulo">Rotas <img id="iconDrop" class="icon" src="../../assets/open_iconic/svg/caret-bottom.svg" alt="icon name"></h1>
        </div>
    </div>
    </div>

    <div class="rotas rounded-bottom">
        <div class="row">
            <?php foreach ($rotas as $r): ?>
                <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><?= $r->getNomeRota() ?></h5>
                        <p class="card-text"><?= $r->getDescricao() ?>
                        <form class="" method="post" action="Home.php">
                            <input class="text-hide" value="ver" name="acao">
                            <input class="text-hide" value="<?= $r->getIdRota() ?>" name="id_rota">
                            <button class="btn btn-outline-primary" type="submit">Ver</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Tempo Médio de duração: <?= $r->getTempoMedio() ?></small>
                    </div>
                </div>
                </div>
            <?php endforeach; ?>
            <?php foreach ($rotas as $r): ?>
                <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><?= $r->getNomeRota() ?></h5>
                        <p class="card-text"><?= $r->getDescricao() ?>
                        <form class="" method="post" action="Home.php">
                            <input class="text-hide" value="ver" name="acao">
                            <input class="text-hide" value="<?= $r->getIdRota() ?>" name="id_rota">
                            <button class="btn btn-outline-primary" type="submit">Ver</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Tempo Médio de duração: <?= $r->getTempoMedio() ?></small>
                    </div>
                </div>
                </div>
            <?php endforeach; ?>
        </div>
        </div>


    <hr>

    </div>
    <div class="container contLocais rounded">
        <div class="bgLightGray rounded-top">
            <div class="row ">
                <div class="col-12 text-center">
                    <h1 id="tituloL" class="rotaTitulo">Locais <img id="iconDropL" class="icon" src="../../assets/open_iconic/svg/caret-bottom.svg" alt="icon name"></h1>
                </div>
            </div>
        </div>


    <div class="locais rounded-bottom ">
        <div class="row">
            <?php foreach ($rotas as $r): ?>

            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top" src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><?= $r->getNomeRota() ?></h5>
                        <p class="card-text"><?= $r->getDescricao() ?>
                        <form class="" method="post" action="Home.php">
                            <input class="text-hide" value="ver" name="acao">
                            <input class="text-hide" value="<?= $r->getIdRota() ?>" name="id_rota">
                            <button class="btn btn-outline-primary" type="submit">Ver</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Tempo Médio de duração: <?= $r->getTempoMedio() ?></small>
                    </div>
                </div>

            </div>

            <?php endforeach; ?>

        </div>
    </div>
        <hr>
    </div>



<div class="container">
    <div class="row">
        <div class="col-12">
            <p class="text-left text-muted text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
</div>

