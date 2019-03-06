<body>
    <div class="container">
        <div class="card bg-dark" style="margin-top: 2em">
            <div style="margin-top: -1.3em; margin-left: -1.3em; margin-right: -1.3em">
                <div class="card-title text-center text-light tituloCard rounded">
                    <?php if ($_SESSION['lang'] == 'en'){traduzir($categoria);} else {echo $categoria;}?>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 2em; margin-bottom: 2em">
            <?php foreach ($res as $r): ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="card carde" style="margin-top: 2em">
                            <img class="card-img-top" src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="Card image cap" style="height: 11em;">
                            <div class="card-body">
                                <h5 class="card-title"><?php if ($_SESSION['lang'] == 'en'){echo $r->getNomeEstabelecimento();} else {echo $r->getNomeEstabelecimento();}?></h5>
                                <p class="card-text"><?php if ($_SESSION['lang'] == 'en'){traduzir($categoria);} else {echo $categoria;}?>
                                <form class="" method="post" action="EstabelecimentoController.php">
                                    <input class="text-hide" value="ver" name="acao">
                                    <input class="text-hide" value="<?= $r->getIdEstabelecimento() ?>" name="id_estabelecimento">
                                    <button class="btn btn-outline-primary" type="submit"><?php if ($_SESSION['lang'] == 'en'){traduzir("VER");} else {echo "VER";}?></button>
                                </form>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted"><?php if ($_SESSION['lang'] == 'en'){traduzir("Categoria:");} else {echo "Categoria:";}?>
                                    <?php if ($_SESSION['lang'] == 'en'){traduzir($categoria);} else {echo $categoria;}?>
                                </small>
                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>
        </div>
