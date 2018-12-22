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
                <form action="Home.php" method="post" style="margin-bottom: 1em">
                    <input type="text" class="text-hide" name="acao" value="addRotaF">
                    <button type="submit" class="btn btn-success">Adicionar Rota</button>
                </form>
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
                <form action="Home.php" method="post" style="margin-bottom: 1em">
                    <input type="text" class="text-hide" name="acao" value="addLocalF">
                    <button type="submit" class="btn btn-success">Adicionar Local</button>
                </form>
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
            <div class="col-md-6">
                <h1>Estabelecimentos</h1>
                <form action="Home.php" method="post" style="margin-bottom: 1em">
                    <input type="text" class="text-hide" name="acao" value="addEstabelecimentoF">
                    <button type="submit" class="btn btn-success">Adicionar Estabelecimento</button>
                </form>
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
                    <?php foreach ($estabelecimentos as $e): ?>
                        <tr>
                            <th scope="row"><?= $e->getIdEstabelecimento() ?></th>
                            <td><?= $e->getNomeEstabelecimento() ?></td>
                            <td>
                                <form action="Home.php" method="post">
                                    <input class="text-hide" type="text" name="acao" value="editarE">
                                    <input class="text-hide" type="text" name="id" value="<?= $e->getIdEstabelecimento() ?>">
                                    <button type="submit" class="btn btn-outline-info">Editar</button>
                                </form>
                            </td>
                            <td><form action="Home.php" method="post">
                                    <input class="text-hide" type="text" name="acao" value="excluirE">
                                    <input class="text-hide" type="text" name="id" value="<?= $e->getIdEstabelecimento() ?>">
                                    <button type="submit" class="btn btn-outline-danger btnExcluir">Excluir</button>
                                </form></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<div style="margin-bottom: 20em"></div>