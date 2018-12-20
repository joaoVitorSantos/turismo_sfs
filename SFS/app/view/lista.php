<body>
    <div class="container">
    <!--<div id="lista">
        <ul>
            <?php //foreach ($res as $r): ?>
            <li><?php // $r->getNomeEstabelecimento()?></li>
            <?php //endforeach; ?>
        </ul>
    </div>-->
            <div class="row">
                <?php foreach ($res as $r): ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="card carde">
                            <img class="card-img-top" src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $r->getNomeEstabelecimento() ?></h5>
                                <p class="card-text"><?= $categoria ?>
                                <form class="" method="post" action="EstabelecimentoController.php">
                                    <input class="text-hide" value="ver" name="acao">
                                    <input class="text-hide" value="<?= $r->getIdEstabelecimento() ?>" name="id_estabelecimento">
                                    <button class="btn btn-outline-primary" type="submit">Ver</button>
                                </form>
                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
        </div>
