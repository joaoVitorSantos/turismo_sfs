<script>
    $(document).ready(function () {
       $('.btnExcluir').click(function () {

       });
    });
</script>

<body>
    <div class="container marginTop">
        <div class="row">
            <div class="col-md-6">
                <h1>Rotas</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rotas as $r): ?>
                        <tr>
                            <th scope="row"><?= $r->getIdRota() ?></th>
                            <td><?= $r->getNomeRota() ?></td>
                            <td>
                                <form action="Home.php" method="post">
                                    <input class="text-hide" type="text" name="acao" value="editarR">
                                    <input class="text-hide" type="text" name="id" value="<?= $r->getIdRota() ?>">
                                    <button type="submit" class="btn btn-outline-info">Editar</button>
                                </form>
                            </td>
                            <td><form action="Home.php" method="post">
                                    <input class="text-hide" type="text" name="acao" value="excluirR">
                                    <input class="text-hide" type="text" name="id" value="<?= $r->getIdRota() ?>">
                                    <button type="submit" class="btn btn-outline-danger btnExcluir">Excluir</button>
                                </form></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h1>Locais</h1>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($locais as $l): ?>
                    <tr>
                        <th scope="row"><?= $l->getIdLocal() ?></th>
                        <td><?= $l->getNomeLocal() ?></td>
                        <td>
                            <form action="Home.php" method="post">
                                <input class="text-hide" type="text" name="acao" value="editarL">
                                <input class="text-hide" type="text" name="id" value="<?= $l->getIdLocal() ?>">
                                <button type="submit" class="btn btn-outline-info">Editar</button>
                            </form>
                        </td>
                        <td><form action="Home.php" method="post">
                                <input class="text-hide" type="text" name="acao" value="excluirL">
                                <input class="text-hide" type="text" name="id" value="<?= $l->getIdLocal() ?>">
                                <button type="submit" class="btn btn-outline-danger btnExcluir">Excluir</button>
                            </form></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div style="margin-bottom: 10em"></div>