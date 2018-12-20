<div class="container">

    <div class="row">
        <div class="col-md-12 text-center" >
            <h1 style="color: red; font-family: Cocogoose; margin: 1em 0 0 0">Você realmente deseja EXCLUIR o Local:</h1>
            <h1><?= $local->getNomeLocal() ?></h1> <h1 style="color: red; font-family: Cocogoose; margin: 0 0 1em 0">?</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-right">
            <form method="post" action="Home.php">
                <input class="text-hide" name="acao" value="viewAdmin">
                <input type="submit" class="btn btn-success" value="Nao, Voltar!">
            </form>
        </div>
        <div class="col-md-6 text-left">
            <form method="post" action="Home.php">
                <input class="text-hide" name="acao" value="deleteLocal">
                <input class="text-hide" name="id" value="<?= $local->getIdLocal() ?>">
                <input type="submit" class="btn btn-outline-danger" value="Sim">
            </form>
        </div>
    </div>

</div>