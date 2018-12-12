<script>
    $(document).ready(function () {


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
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <btn id="todosR" class="nav-link active">Todos</btn>
                </li>
                <li class="nav-item">
                    <btn id="gastronomiaR" class="nav-link navLink">Gastronomia</btn>
                </li>
                <li class="nav-item">
                    <btn id="historiaR" class="nav-link navLink">Historia</btn>
                </li>
            </ul></div>
        <div class="row">
            <?php foreach ($rotas as $r): ?>
                <div class="col-md-6 col-lg-4 rotaCard">
                <div class="card carde">
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
            <?php foreach ($locais as $lo): ?>

            <div class="col-md-6 col-lg-4">
                <div class="card carde">
                    <img class="card-img-top" src="../../assets/images/<?= $lo->getImagemPerfil() ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><?= $lo->getNomeLocal() ?></h5>
                        <p class="card-text"><?= $lo->getDescricao() ?>
                        <form class="" method="post" action="Home.php">
                            <input class="text-hide" value="verL" name="acao">
                            <input class="text-hide" value="<?= $lo->getIdLocal() ?>" name="id_local">
                            <button class="btn btn-outline-primary" type="submit">Ver</button>
                        </form>
                    </div>
                </div>

            </div>

            <?php endforeach; ?>

        </div>
    </div>

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

