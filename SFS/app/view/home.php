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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                    <a href="EstabelecimentoController.php?acao=verLista&id=1"><img class="d-block w-100" src="../../assets/images/gastronomia.jpg" alt="First slide"></a>
            </div>
            <div class="carousel-item">
                    <a href="EstabelecimentoController.php?acao=verLista&id=2"><img class="d-block w-100"  src="../../assets/images/hospedagem.png" alt="Second slide"></a>
            </div>
            <div class="carousel-item">
                    <a href="EstabelecimentoController.php?acao=verLista&id=3"><img class="d-block w-100" src="../../assets/images/servicos.png" alt="Third slide"></a>
            </div>
            <div class="carousel-item">
                    <a href="EstabelecimentoController.php?acao=verLista&id=4"><img class="d-block w-100" src="../../assets/images/arquitetura.png" alt="Third slide"></a>
            </div>
            <div class="carousel-item">
                <a href="EstabelecimentoController.php?acao=verLista&id=5"><img class="d-block w-100" src="../../assets/images/museus.png" alt="Third slide"></a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="rounded-top">
    <div class="row ">
        <div class="col-12 text-center" style="margin-top: 1em;">
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
                    <img class="card-img-top img_miniatura_index" src="../../assets/images/<?= $r->getImagemPerfil() ?>" alt="Card image cap">

                    <div class="card-body">
                        <h5 class="card-title"><?= $r->getNomeRota() ?></h5>
                        <p class="card-text"><?= $r->getDescricao() ?>
                        <form class="" method="post" action="RotaController.php">
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






